<?php
namespace mqWorks\Variable\Plugins;

class File{
	public static $autotype=true;
	private static $cache = array();
	
	public static function init(){
	}
	
	public static function convert($request){
		$hash = md5($request);
		
		if(!array_key_exists($hash, self::$cache)){
			self::$cache[$hash] = self::doConvert($request);
		}
		
		return self::$cache[$hash];
	}
	
	private static function doConvert($input){
		if(substr($input, 0, 1) === '@'){
			$input = substr($input, 1);
		}
		
		if(!file_exists($input)){
			return file_get_contents($input);
		}
		
		ob_start();
		include $input;
		$return = ob_get_clean();
		
		$type = pathinfo($input);
		$type = $type['extension'];
		
		if($type=='yml'){
			return Yaml::Convert($return);
		}else if($type=='twig'){
			return Twig::Convert($return);
		}
		
		return $return;
	}
	
	public static function match($input){
		if(!is_string($input) || strlen($input)<2 ){
			return false;
		}
		
		return substr($input, 0, 1) === '@'; //|| preg_match($regex, $input) == 1;
	}
}