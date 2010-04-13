<?php 
return function(Closure $callable){
	$time_start = microtime(true);

	call_user_func($callable);
	
	$time_end = microtime(true);
	return $time_end - $time_start;
};