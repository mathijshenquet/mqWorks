<?php
return function($array, $string){
	return vsprintf($string, $array);
};