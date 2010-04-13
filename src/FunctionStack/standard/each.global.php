<?php 
return function($var, Closure $callback){
	if(is_array($var) || is_object($var)){
		foreach($var as $key=>$value){
			$callback(Q($value), Q($key));
		}
	}else if(is_int($var)){
		for($i=0;$i<$var;$i++){
			$callback(Q($i));
		}
	}
};