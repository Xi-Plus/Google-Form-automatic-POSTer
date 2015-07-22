<?php
include("curl.php");
include("config.php");
set_time_limit($set_time_limit);
echo "POST to ".$form_url."<hr>";
$count=0;
foreach($valuelist as $value){
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
