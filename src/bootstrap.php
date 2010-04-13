<?php
use mqWorks\Variable;
use mqWorks\FunctionStack;
use mqWorks\FunctionProxy;
use mqWorks\UniversalClassLoader as Loader;

require __DIR__.'/UniversalClassLoader.php';
require 'FunctionStack.php';
require 'FunctionProxy.php';
require 'Variable.php';

Loader::registerNamespace('mqWorks', __DIR__);
Loader::register();

FunctionStack::init();
FunctionStack::addSource(__DIR__.'/FunctionStack/standard/%s.%s.php');

Variable::init(array('File', 'Yaml', 'Twig', 'Markdown', 'Json'));

function µ(){
	return new Variable(func_get_args());
}

class µ extends FunctionProxy{
}

function q(){
	return new Variable(func_get_args());
}

class q extends FunctionProxy{
}