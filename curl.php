<?php
function httpRequest( $url , $post = null , $usepost = true){
	if( is_array($post) )
	{
		ksort( $post );
		$post = http_build_query( $post );
	}
	
	$ch = curl_init();
	curl_setopt( $ch , CURLOPT_URL , $url );
	curl_setopt( $ch , CURLOPT_ENCODING, "UTF-8" );
	curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,0);
	
	curl_setopt($ch, CURLINFO_HEADER_OUT, true); 
	if($usepost)
	{
		curl_setopt( $ch , CURLOPT_POST, true );
		curl_setopt( $ch , CURLOPT_POSTFIELDS , $post );
	}
	curl_setopt( $ch , CURLOPT_RETURNTRANSFER , true );
	
	$data = curl_exec($ch);
	$return=new stdClass;
	$return->html=$data;
	$return->header=curl_getinfo($ch);
	curl_close($ch);
	if(!$data)
	{
		return false;
	}
	return $return;
}
?>