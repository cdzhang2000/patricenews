<?php
/*
	Plugin Name: Role Edit
	Plugin URI: 
	Description: Edits the default WordPress roles
	Author: NewCity
	Author URI: http://www.insidenewcity.com/
*/

$contributor = get_role('contributor');
$contributor->add_cap('upload_files');