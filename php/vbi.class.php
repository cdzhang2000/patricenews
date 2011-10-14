<?php
/**
 * VBI class
 * generates data about the Google Analytics reports of the vbi site
 *
 *  EXAMPLE OF OPTIONS:
 *	'ga_login'=>'login',
 *	'ga_password'=>'password',
 *	'ga_report_id'=>'1234567',
 *	'start_date'=>'2010-01-01',
 *	'end_date'=>date('Y-m-d'),
 *	'match_path'=>"/portal/portal/patric/Taxon\\?cType=taxon&cId=",
 *	'number_of_tags'=>5,
 * 	'limit'=>30
 * 
 * @author Phil Pelanne
 **/
class VBI {
	
	/**
	 * CLASS DATA
	 *
	 * @author Phil Pelanne
	 */
	
	/**
	 * Constants
	 * NIH_ROOT_URL - base URL of the NIH service that translates CIDs to their scientific names
	 * CACHEFILE - the where to store cached output
	 * CACHETIME - how long to cache values for
	 */
	const NIH_ROOT_URL = 'http://eutils.ncbi.nlm.nih.gov/entrez/eutils/esummary.fcgi?db=taxonomy&id=';
	const CACHEFILE = './cache/vbi_cache.dat';
	const CACHETIME = 3600;
	const DEBUG=false; //disables cache if true

	
	/**
	 * stores the Google Analytics object
	 * @var object
	 */
	private $gapi;

	/**
	 * the URL path that will be used to filter the Google Analytics results
	 * @var string
	 */
	private $match_path;
	
	/**
	 * the number of different rankings to be used
	 * @var integer
	 */
	private $number_of_tags = 5;
	
	/**
	 * the size of each ranking
	 * @var integer
	 */
	private $segment_num;
	
	/**
	 * the maximum pageviews
	 * @var string
	 */
	private $max;
	
	/**
	 * the minimum pageviews
	 * @var string
	 */
	private $min;
	
	
	
	
	
	/**
	 * PRIMARY PUBLIC FUNCTIONS
	 *
	 * @author Phil Pelanne
	 */
	
	/**
	 * function __construct
	 * Creates the Google Analytics object and runs the initial report if no cache or an old cache exists.
	 * Otherwise, does nothing - things will be served from the cache.
	 * 
	 * @param array $options list of init variables for Google Analytics 
	 * @return void
	 * @author Phil Pelanne
	 **/
	public function __construct($options){
		if ($this->cache_expired()){
			require ('gapi.class.php');
			$this->gapi = new gapi($options['ga_login'],$options['ga_password']);
			$this->create_report($options['ga_report_id'],$options['start_date'],$options['end_date'],$options['match_path'],$options['limit']);
			$this->number_of_tags = $options['number_of_tags'];
		}
	}
	
	/**
	 * function generate_cloud
	 * Given a Google Analytics resultset, builds an array that can be used to create a tag cloud.
	 * Array contains the scientific name, ID, number of page views, and computed rank.
	 * Array is randomized.  Will also serve from cache if possible.
	 *
	 * @param void
	 * @return array
	 * @author Phil Pelanne
	 **/
	public function generate_cloud(){
		$cloud = array();
		if ($this->cache_expired()){
			$cid_array = $this->generate_cid_array();
			$scientific_names = $this->get_scientific_names($cid_array);
			$results = $this->gapi->getResults();
			
			foreach($results as $result){
				$cid = str_replace(str_replace("\\",'',$this->match_path),'',$result);
				$cloud[]=array(
					'scientific_name'=>$scientific_names[$cid],
					'cid'=>$cid,
					'pageviews'=>$result->getPageviews(),
					'rank'=>$this->get_rank($result->getPageviews())
				);
			}
			
			$this->save_cache($cloud);
			
		}else{
			$cloud = $this->retrieve_cache();
		}
		shuffle($cloud);
		return $cloud;
	}
	
	/**
	 * function generate_cloud_json
	 * JSON-encodes the cloud array for use with javascript
	 *
	 * @param void
	 * @return string
	 * @author Phil Pelanne
	 **/
	public function generate_cloud_json(){
		return json_encode($this->generate_cloud());
	}
	





	/**
	 * REPORTING FUNCTIONS
	 *
	 * @author Phil Pelanne
	 */

	/**
	 * function generate_cid_array
	 * Given the GA resultset, strips off the match path, leaving the integer ID.  Packages the integers in an array 
	 *
	 * @param void
	 * @return array
	 * @author Phil Pelanne
	 **/	
	private function generate_cid_array (){
		$cid_array = array();
		foreach($this->gapi->getResults() as $result){
			$cid = (integer) str_replace(str_replace("\\",'',$this->match_path),'',$result);
			$cid_array[] = $cid;
		}
		return $cid_array;
	}
	
	/**
	 * function get_scientific_names
	 * Sends the list of bacteria IDs to the government website, parses resultant XML for the scientific names,
	 * then builds an associative array of IDs to scientific names.
	 *
	 * @param array $cid_array array of ID numbers
	 * @return array
	 * @author Phil Pelanne
	 **/
	private function get_scientific_names($cid_array){
	
		
		$url = vbi::NIH_ROOT_URL.implode(',',$cid_array);
		
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HEADER, 0);

		$xml = curl_exec($ch);
		curl_close($ch);		
		
		//$xml = file_get_contents($url);
		$xmlget = simplexml_load_string($xml);
		$mapping_array = array();
		foreach ($xmlget->DocSum as $item){
			$children = $item->children();
			$scientific_name = (string) $children[3];
			$cid = (string) $children[5];
			$mapping_array["$cid"]=$scientific_name;
		}
		return $mapping_array;
	}

	
	/**
	 * function create_report
	 * Runs the Google Analytics report for the number of page views, given a URL path to filter with
	 *
	 * @param int $report_id - the google report id
	 * @param date $start_date - start date of dataset
	 * @param date $end_date - end date of dataset
	 * @param string $match_path - the path to filter dataset on
	 * @param int $limit - limit the number of results
	 * @return void
	 * @author Phil Pelanne
	 **/
	private function create_report($report_id,$start_date,$end_date,$match_path,$limit=30){
		$this->gapi->requestReportData($report_id,array('pagePath'),array('pageViews'),array('-pageViews'),'pagePath=~^'.$match_path.'.*',$start_date,$end_date,1,$limit);
		$this->match_path = $match_path;
	}
	
	
	
	
	
	
	
	
	/**
	 * COMPUTATIONAL FUNCTIONS
	 *
	 * @author Phil Pelanne
	 */
	
	/**
	 * function get_number_per_segment
	 * Computes the number of pageviews that each ranking represents (based on how many pieces the range is chopped into)
	 *
	 * @param int $number_of_tags - the number of rankings we want
	 * @return float
	 * @author Phil Pelanne
	 **/
	public function get_number_per_segment($number_of_tags){
		if (!$this->max) $this->max = $this->get_max();
		if (!$this->min) $this->min = $this->get_min();
		return ($this->max-$this->min)/$number_of_tags;
	}
	
	/**
	 * function get_rank
	 * Given a pageview number, determines what rank to give it based on the min, max, and the number of segments n that the range is divided into
	 * 1 is least viewed, n is most viewed. 
	 *
	 * @param int $pageviews
	 * @return int
	 * @author Phil Pelanne
	 **/
	private function get_rank($pageviews){
	 if (!$this->max) $this->max = $this->get_max();
	    if (!$this->min) $this->min = $this->get_min();
	    if (!$this->segment_num) $this->segment_num = $this->get_number_per_segment($this->number_of_tags);
	 	$rank = ($pageviews-$this->min)/$this->segment_num;
		if (!$rank)$rank=1;//sometimes GA is returning 0
	
		if ($rank < .2)$final_rank=1;
		elseif ($rank <.6)$final_rank=2;
		elseif ($rank <1)$final_rank=3;
		elseif ($rank <2)$final_rank=4;
		else $final_rank=5;
		
		return $final_rank;
	}
	
	/**
	 * function get_max
	 * Determines the largest number of pageviews in the Google resultset
	 *
	 * @param void
	 * @return int
	 * @author Phil Pelanne
	 **/
	private function get_max (){
		$max=0;
		foreach($this->gapi->getResults() as $result){
			if ($result->getPageviews() > $max)$max=$result->getPageviews();//is this the max so far?
		}
		return $max;
	}
	
	/**
	 * function get_min
	 * Determines the smallest number of pageviews in the Google resultset
	 *
	 * @param void
	 * @return int
	 * @author Phil Pelanne
	 **/
	private function get_min (){
		//figure out the largest number
		
		$min = $this->get_max();
		
		foreach($this->gapi->getResults() as $result){
			$pageviews = $result->getPageviews();
			if (is_numeric($pageviews) && $pageviews < $min) $min=$pageviews;//is this the max so far?
		}
		return $min;
	}

	/**
	 * CACHE MANAGEMENT
	 *
	 * @author Phil Pelanne
	 */
	
	/**
	 * function cache_expired
	 * Determines if the cache has expired or not (considers no cache file to be expired)
	 *
	 * @param void
	 * @return boolean
	 * @author Phil Pelanne
	 **/
	private function cache_expired (){
		if (vbi::DEBUG===true)	return true;
		if (file_exists(vbi::CACHEFILE) && ((time()-filemtime(vbi::CACHEFILE))<=vbi::CACHETIME)) return false;
		else return true;
	}

	/**
	 * function save_cache
	 * Serializes, then saves the data to the cache file.
	 *
	 * @param mixed $data - data to serialize and save
	 * @return boolean
	 * @author Phil Pelanne
	 **/
	private function save_cache ($data){
		return file_put_contents(vbi::CACHEFILE,serialize($data));
	}
	
	/**
	 * function retrieve_cache
	 * Retrieves, unserializes, and returns the cached data
	 *
	 * @param void
	 * @return mixed
	 * @author Phil Pelanne
	 **/
	private function retrieve_cache (){
		return unserialize(file_get_contents(vbi::CACHEFILE));
	}
	
	
} //END CLASS VBI