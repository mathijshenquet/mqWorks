<?php 
namespace mqWorks;

class Variable implements \ArrayAccess, \Iterator{
	
	/**
	 * Used for holding the value of the variable
	 * 
	 * @var mixed
	 */
	private $value;
	
	/**
	 * contains the variable's type for caching
	 * 
	 * @var string
	 */
	private $type;
	
	/**
	 * contains string name of custom datatype just before it is converted
	 * 
	 * @var string
	 */
	private $custom_type;
	
	/**
	 * Used to check if the class is initialized
	 * 
	 * @var boolean
	 */
	private static $initialized=false;
	
	/**
	 * 
	 * @var unknown_type
	 */
	private static $plugins = array();
	
	/**
	 * Contains the position used to itterate the object as array
	 * 
	 * @var int
	 */
	private $position;
	
	/** 
	 * @param mixed $value
	 */
	public function __construct($value){
		if(is_array($value) && count($value)==1)
			$value = $value[0];
		
		if(!self::$initialized){
			throw new Exception(__CLASS__.': The class has not jet been initalized, initialize the class by calling '.__CLASS__.'::init(FunctionStack $functions)');
		}
		
		if($value instanceof self){
			return clone $value;
		}
			
		$this->value = $value;
		$this->autoType();
	}
	
	
	/**
	 * Used to staticly initialize the object, making it ready to create instances
	 * 
	 * @param FunctionStack $functions
	 */
	public static function init(array $plugins){		
		foreach($plugins as $plugin){
			self::registerPlugin($plugin);
		}
		
		self::$initialized = true;
	}
	
	
	/**
	 * Register a plugin for autotyping
	 * 
	 * @param string $plugin name of the plugin to register
	 */
	private static function registerPlugin($plugin){
		$datatype = 'mqWorks\\Variable\\Plugins\\'.$plugin;
			
		self::$plugins[strtolower($plugin)] = $datatype;
		
		if(method_exists($datatype, 'init')){
			$datatype::init();
		}
	}
	
	
	/**
	 * Access property's if the value is object
	 * 
	 * @param string $name
	 */
	public function __get($name){
		if(is_object($this->value)){
			$this->setValue($this->value->$name);
		}else if(is_array($this->value)){
			$this->setValue($this->value[$name]);
		}
		
		return $this;
	}
	
	
	/**
	 * Set property's if the value is object
	 * 
	 * @param string $name
	 */
	public function __set($name, $value){
		if(is_object($this->value)){
			$this->value->$name = $value;
		}else if(is_array($this->value)){
			$this->value[$name] = $value;
		}
	}
	
	
	
	/**
	 * Apply's autotyping
	 * 
	 * @return void
	 */
	private function autoType(){		
		foreach(self::$plugins as $name => $class){
			if(method_exists($class, 'match')){
				if($class::match($this->value)){
					$this->setValue($class::convert($this->value));
					$this->autoType();
					break;
				}
			}
		}
	}
	
	
	/**
	 * Sets the current type be inspeciting the value
	 * 
	 * @returns void
	 */
	private function setTypeByValue(){
		$value = $this->value;
		
		if(is_null($value)){
			$type = 'static';
		}else if(is_numeric($value)){
			$type = 'number';
		}else{
			$type = gettype($value);
		}
		
		$this->setType($type);
	}
	
	
	/**
	 * Getter for setting the type
	 * 
	 * @param string $type Type to set
	 */
	private function setType($type){
		$this->type = $type;
	}
	
	
	/**
	 * Retrive the type
	 * 
	 * @returns string The current type
	 */
	private function getType(){
		if($this->type == null){
			$this->setTypeByValue();
		}
		
		return $this->type;
	}
	
/**
	 * Getter for setting the type
	 * 
	 * @param string $type Type to set
	 */
	private function setValue($value){
		$this->value = $value;
	}
	
	
	/**
	 * Retrive the type
	 * 
	 * @returns string The current type
	 */
	private function getValue(){
		return $this->value;
	}
	
	
	/**
	 * Parse the current value as the given argument
	 * 
	 * @param string $to Name of the plugin used to parse the value
	 */
	public function parseAs($to){
		$this->registerPlugin($to);
		
		$class = self::$plugins[$to];
		$this->setValue($class::convert($this->value));
		$this->type = null;
		
		return $this;
	}
	
	public function __call($function, $arguments){
		if($this->getType() == 'object' && method_exists($this->getValue(), $function)){
			$return = call_user_func_array(array($this->getValue(), $function), $arguments);
		}else{
			if($this->getType() != 'static'){
				$arguments = array_merge(array($this->getValue()), $arguments);
			}
			
			$namespaces[] = 'static';
			$namespaces[] = 'global';
			$namespaces[] = $this->getType();

			$return = FunctionStack::call($function, $arguments, array_unique($namespaces));
		}
			
		if(!is_null($return)){
			$this->value = $return;
			$this->setType(null);
		}

		return $this;
	}
	
	public function __toString(){
		if($this->getType() == 'array'){
			if(FunctionStack::functionExists('toString', 'array')){
				return FunctionStack::call('toString', array($this->getValue()), array($array));
			}
		}
		
		return strval($this->value);
	}
	
	public function unbind(){
		return $this->value;
	}
	
	public function branch(){
		return clone $this;
	}
	
	public function offsetSet($offset, $value){
        $this->value[$offset] = $value;
    }
    
    public function offsetExists($offset) {
        return isset($this->value[$offset]);
    }
    
    public function offsetUnset($offset) {
        unset($this->value[$offset]);
    }
    
    public function offsetGet($offset) {
        return isset($this->value[$offset]) ? new Variable($this->value[$offset]) : null;
    }
    
	public function rewind() {
        $this->position = 0;
    }

    public function current() {
        return new Variable($this->value[$this->position]);
    }

    public function key() {
        return new Variable($this->position);
    }

    public function next() {
        ++$this->position;
    }

    public function valid() {
        return isset($this->value[$this->position]);
    }
}