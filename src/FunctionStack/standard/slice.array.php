<?php
$f->slice = function($var, $start, $end=null){
	if(isset($end)){
		return array_slice($var, $start, $end);
	}else{
		return array_slice($var, $start);
	}
};