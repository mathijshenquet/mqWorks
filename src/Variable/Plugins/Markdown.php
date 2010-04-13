<?php 
namespace mqWorks\Variable\Plugins;

class Markdown{
	private static $instance;
	
	public static function init(){
		require __DIR__.'/Markdown/Markdown.php';
		self::$instance = new \Markdown\MarkdownExtra_Parser;
	}
	
	public static function convert($input){
		$hash = md5($input);
		
		$file = __DIR__.'/cache/markdown/'.$hash.'.cache';
		
		if(file_exists($file)){
			return file_get_contents($file);
		}else{
			$parsed = self::$instance->transform($input);
			
			file_put_contents($file, $parsed);
			
			return $parsed;
		}
	}
}