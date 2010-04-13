<?php 
include '../src/bootstrap.php';

$list = µ(0,1,2,3,4,5,6,7,8,9);

$list->filter(function($value){
	return $value % 2 == 0;
})->echoln();

$list->map(function($value){
	return pow($value, $value);
})->echoln();