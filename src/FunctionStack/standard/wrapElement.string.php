<?php 
return function($string, $wrap){
	return sprintf('<%s>%s</%s>', $wrap, $string, $wrap);
};