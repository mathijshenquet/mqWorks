<?php
namespace mqWorks\Variable\Plugins;

use \mqWorks\UniversalClassLoader as Loader;
use Twig_Loader_String;
use Twig_Environment;

class Twig{
	public static $autotype=false;
	
	private static $twig;
	
	public static function init(){
		Loader::registerPrefix('Twig_', __DIR__.'/Twig');
		
		$loader = new Twig_Loader_String();
		self::$twig = new Twig_Environment($loader, array(
			'cache' => __DIR__.'\\cache\\twig',
		));
	}
	
	public static function convert($input){
		return self::$twig->loadTemplate($input);
	}
}