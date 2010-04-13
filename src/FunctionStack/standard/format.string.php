<?php
return function(){
	$args = func_get_args();
	return vsprintf(array_shift($args), $args);
};