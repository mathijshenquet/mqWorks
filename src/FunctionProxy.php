<?php
namespace mqWorks;

class FunctionProxy{
	private static $functions;
	
	static function __callStatic($function, $arguments){
		$return = FunctionStack::call($function, $arguments, array('static', 'array', 'string', 'number', 'global'));
		
		return new Variable($return);
	}
}