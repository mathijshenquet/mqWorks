<?php 
return function($value, $other=null){
	$print = isset($other) ? $other : $value;
	
	if(is_array($value) || is_object($value)){
		echo �::toString($value);
	}else{
		echo strval($value);
	}
};