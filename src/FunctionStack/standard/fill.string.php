<?php
return function($value, $args){
	$mapping = array();
	foreach($args as $k => $v)
    {
        $mapping['%' . (is_int($k) ? $k+1 : $k) . '%'] = $v;
    }
	
	return strtr($value, $mapping);
};