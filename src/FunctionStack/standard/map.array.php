<?php 
return function($array, Closure $callback){
	foreach($array as $key=>$value){
		$new = $callback($value);
		
		$array[$key] = $new;
	}
	
	return $array;
};