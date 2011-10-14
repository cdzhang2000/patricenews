<?php

// This will be the url for the RSS feed once Wordpress is established. 
// $XMLSOURCE = "http://enews.patricbrc.org/FrontRSS/";

/* This points to a static XML file. */
$XMLSOURCE = "http://enews.pathogenportal.net/frontrss/";

echo "/*"; // start a comment block in JS so "echoes" don't break the JS execution.

header("Content-Type: text/plain");

/* this function truncates text at punctuation and word boundaries.*/
function crop($str, $len) {
    if ( strlen($str) <= $len ) {
        return $str . '';
    }

    // find the longest possible match
    $pos = 0;
    foreach ( array('. ', '? ', '! ') as $punct ) {
        $npos = strpos($str, $punct);
        if ( $npos > $pos && $npos < $len ) {
            $pos = $npos;
        }
    }

    if ( !$pos ) {
        // substr $len-3, because the ellipsis adds 3 chars
        return substr($str, 0, $len-3) . '...'; 
    }
    else {
        // $pos+1 to grab punctuation mark
        return substr($str, 0, $pos+1);
    }
}

/* This steps through the RSS feed and creates a data structure to convert to 
   JSON so Javascript doesn't have to parse XML too. */
function parseRSS($xml)
{
	$feed = new StdClass();
	$feed->link = $xml->channel->link . '';
	$numItems = count($xml->channel->item);

	$contents = array();
	
    for($i=0; $i<$numItems; $i++) {
		$story = $xml->channel->item[$i];
		$entryDate = $story->pubDate[0] . '';
		$eventDate = $story->eventDate[0] . '';
		
		$entry = new StdClass;
		$entry->link = $story->link . '';
		$entry->title = $story->title . '';
		$entry->subtitle = $story->subtitle . '';
		$entry->desc = crop(strip_tags($story->description),150);
		$entry->category = $story->category[0];
		echo("--".$entry->category."\n");
		$entry->posttype = $story->posttype . '';
		
		// This regular expression converts spaces to dashes, any non-alphabetical character 
		// to an empty string, and turns consecutive dashes into one dash. 
		$entry->categoryCode = preg_replace(array('/\s|\s+/','/[^a-z\-]/','/\-{2,}/'),array('-','','-'),strtolower($story->category));
		$entry->location = $story->eventLocation . '';
		$entry->date = $entryDate;
		$entry->eventDate = $eventDate;
		
		/* If stories have thumbnails attached to them, this extracts the thumbnail. */
		if($story->thumb) {
			$image = $story->thumb->img;
			if($image) {
				$attr = $image->attributes();
				$entry->image = $attr["src"] . '';
			}
		}
		
 		$contents[] = $entry;
    }
	
	$feed->entries = $contents;
	return $feed;
}

$ch = curl_init($XMLSOURCE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);

$data = curl_exec($ch);
curl_close($ch);

$doc = new SimpleXmlElement($data,LIBXML_NOCDATA);

if(isset($doc->channel))
{
    $feedData = parseRSS($doc);
} 

echo "*/"; // close that comment block.

// start generating the Javascript that will be executed by the browser.
echo "var rssData = " . json_encode($feedData) . ";";