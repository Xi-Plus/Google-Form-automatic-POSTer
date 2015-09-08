<?php
set_time_limit($set_time_limit);
include("curl.php");
include("config.php");
$csv=file_get_contents($csv_file_name);
$csv=explode("\r\n",$csv);
$line=$csv[0];
$namelist=str_getcsv($line);
unset($csv[0]);
echo "POST to ".$form_url."<hr>";
$count=0;
foreach($csv as $line){
	$value=str_getcsv($line);
	$count++;
	echo "#".$count." ";
	$post=array();
	foreach($namelist as $i => $name){
		$post[$namelist[$i]]=$value[$i];
	}
	var_dump($post);
	echo "<br>";
	$cont=httpRequest($form_url,$post,true);
	echo $cont->html;
	echo "<hr>";
}
?>
