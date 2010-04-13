<?php 
return function($var, $mode){
	if($mode == 'html'){
		return htmlspecialchars($var);
	}else{
		throw new \Exception('Unkown mode for escaping');
	}
};