<?php
return function($times, $callback){
	if(is_callable($callback)){
		for($i=0; $i<$times; $i++){
			if($callback($i)===false){
				break;	
			}
		}
	}else{
		// TODO Error Reporting
	}
};