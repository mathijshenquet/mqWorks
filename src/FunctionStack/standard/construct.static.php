<?php
return function($times, Closure $callback){
	$return = array();
	
	for($i=0; $i<$times; $i++){
		$return[] = $callback($i);
	}
	
	return $return;
};