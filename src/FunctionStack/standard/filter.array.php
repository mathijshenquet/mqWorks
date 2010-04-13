<?php 
return function($array, Closure $callback){
	foreach($array as $key=>$value){
		if($callback($value) !== true){
			unset($array[$key]);
		}
	}
	
	return $array;
};