<?php 
namespace mqWorks\Variable\Plugins;

class Json{
	public static function convert($input){
		$input = str_replace(array("\t","\n","\r","\0","\x0B"), '', $input);
		
		return json_decode($input);
	}
}