<?php
namespace mqWorks;

class FunctionStack{
	static private $functions;
	static private $sources		= array();
	
	static public function init(){
		self::$functions = new FunctionHolder();
	}
	
	static public function addSource($source){
		self::$sources[] = $source;
	}
	
	static public function call($function, $arguments, array $namespaces){
		$callable = false;
		
		//Check for allready defined functions in one of the namespaces
		foreach($namespaces as $ns){
			if(array_key_exists($function, self::$functions->$ns)){
				$callable = self::$functions->$ns->$function;
			}
		}
		
		//If non are found, look for files in sources
		if(!$callable){
			foreach(self::$sources as $source){
				foreach($namespaces as $ns){
					$file = sprintf($source, $function, $ns);
					if(file_exists($file)){							
						$f = self::$functions->$ns->$function = require $file;
						
						if(is_callable($f)){
							$callable = $f;
						}else{
							throw new \Exception('File '.$file.' does not contain the '.$function.' function');	
						}
					}
				}
			}
		}
		
		if(!$callable){
			throw new \Exception(sprintf('Function %s in namespace %s cant be found', $function, implode($namespaces,', ')));
		}
		return call_user_func_array($callable, $arguments);
	}
	
	static public function functionExists($function, $namespaces){
		foreach($namespaces as $ns){
			if(array_key_exists($function, self::$functions->$ns)){
				return true;
			}
		}
		return false;
	}
}

class FunctionHolder{
	function __get($name){
		$this->$name = new \stdClass();
		return $this->$name;
	}
}