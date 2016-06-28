<?php
function maketime($timestamp){
	//$minutes=($timestamp%60)*60;
	//$hour=($timestamp/60)-($timestamp%60);
	$hour=0;
	for(;$timestamp>=60;$hour++) $timestamp=$timestamp-60;
	return array('hour'=>$hour,'minutes'=>$timestamp);
}

function convertTimestamp ($timestamp) {
	$hour= (int)strftime("%H",$timestamp);
	$minutes= (int)strftime("%M",$timestamp);
	$time=($hour*60)+$minutes;
	return $time;
}

function convertDatastamp ($timestamp) {
	$arr = array();
	$arr['hour'] = strftime("%H", $timestamp);
	$arr['minutes'] = strftime("%M",$timestamp);
	$arr['day'] = strftime ("%d", $timestamp);
	$arr['month'] = strftime("%m",$timestamp);
	$arr['year'] = strftime ("%Y",$timestamp);
	return $arr;
}

?>