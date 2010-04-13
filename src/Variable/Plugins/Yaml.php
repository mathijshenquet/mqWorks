<?php 
namespace mqWorks\Variable\Plugins;

use \Symfony\Components\Yaml\Yaml as sfYaml;
use \mqWorks\UniversalClassLoader as Loader;

class Yaml{
	private static $initialized = false;
	
	public static function init(){
		if(!$initialized){
			Loader::registerNamespace('Symfony\\Components\\Yaml', __DIR__.'/Yaml');
			$initialized = true;
		}
	}
	
	public static function convert($input){		
		$hash = md5($input);
		
		$file = __DIR__.'/cache/yaml/'.$hash.'.cache';
		
		if(file_exists($file)){
			return unserialize(file_get_contents($file));
		}else{
			if(is_array($input)){
				$parsed = sfYaml::dump($input);
			}else if(is_string($input)){
				$parsed = sfYaml::load($input);
			}
			
			file_put_contents($file, serialize($parsed));
			
			return $parsed;
		}
	}
}