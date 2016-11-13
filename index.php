<?php
include("config.php");
set_time_limit($config["set_time_limit"]);
include("cURL-HTTP-function/curl.php");
$csv=file_get_contents($config["csv_file_name"]);
$csv=explode("\r\n",$csv);
$line=$csv[0];
$namelist=str_getcsv($line);
unset($csv[0]);
echo "POST to ".$config["form_url"]."\n";
$count=0;
foreach($csv as $line){
	if (trim($line) == "") {
		continue;
	}
	$value=str_getcsv($line);
	$count++;
	echo "#".$count." ";
	$post=array();
	foreach($namelist as $i => $name){
		$post[$namelist[$i]]=$value[$i];
	}
	var_dump($post);
	$cont=cURL_HTTP_Request($config["form_url"],$post);
	echo "\n";
}
?>
