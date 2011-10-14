<?php

class bacteriaInfo {
	public $name; // string
	public $link; // detail page
	public $heritage; // for the breadcrumb
	public $numFeatures;
	public $numGenomes;
	public $numLiterature;
	public $googleImages;
	public $rank;
}

class heritageItem {
	public $name;
	public $link;
	
	function __construct($name,$link) {
		$this->name = $name;
		$this->link = $link;
	}
}

$bacteriaSeed = array(
	"Bacillus",
	"Bartonella",
	"Borrella",
	"Brucella",
	"Burkholderia",
	"Campylobacter",
	"Chlamydophila",
	"Clostridum",
	"Coxiella",
	"Ehrlichia",
	"Escherichia",
	"Francisella",
	"Helicobacter",
	"Listeria",
	"Mycobacterium",
	"Salmonella",
	"Shigella",
	"Staphylococcus",
	"Streptococcus",
	"Vibrio",
	"Yersinia");

$heritageSeed = array(
	"Bacteria",
	"Firmicutes",
	"Bacilli",
	"Bacillales",
	"Listeriaceae");

$bacteriaSet = array();

foreach ($bacteriaSeed as $b) {
	$tbac = new bacteriaInfo();
	$tbac->name = $b;
	$tbac->link = "#";
	$tbac->numFeatures = rand(10000, 70000);
	$tbac->numGenomes = rand(5,50);
	$tbac->numLiterature = rand(1000,1400);
	$tbac->rank = rand(1,5);	// rank for the "most viewed" option
	
	$heritageArray = array();
	
	$heritageItems = array_rand($heritageSeed,3);
	for($i = 0; $i < 3; $i++) {
		array_push($heritageArray,new heritageItem($heritageSeed[$heritageItems[$i]],'#'));
	}
	$tbac->heritage = $heritageArray;
	$bacteriaSet[$tbac->name] = $tbac;
	$tbac = null;
}

echo "var bacteriaResponse = " . json_encode($bacteriaSet) . ";";
