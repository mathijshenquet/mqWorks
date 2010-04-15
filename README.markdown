# mqWorks
mqWorks is a library written to introduce object orientated programming on the standard datatypes. Allowing programmers to effectively extending native classes like string or int.

## Examples
> All examples should start with
>     <?php
>     include 'path_to_mqWorks/mqWorks/bootstrap.php';

#### Array example
Showing the simple list syntax that can be used with the µ function and demonstrates some build-in array functions.

	$list = µ(0,1,2,3,4,5,6,7,8,9);

	$list->filter(function($value){
		return $value % 2 == 0;
	})->echoln();
	
	$list->map(function($value){
		return pow($value, 2);
	})->echoln();

Returns

	[ 0, 2, 4, 6, 8 ]
	[ 0, 4, 16, 36, 64 ]

#### Markdown example
Example showing the build-in markdown plugin.

	$markdown = '
	Markdown example
	================
	
	* Markdown
	* Integrates
	* With
	* mqWorks!
	';
	
	µ($markdown)->parseAs('markdown')->echoln();
	
Returns the parsed markdown.

#### Json example
mqWorks also uses the php build in json parser.

	µ('
	{
		"first name": "Mathijs",
		"last name": "Henquet"
	}
	')->parseAs('json')->each(function($value, $key){
		µ::format('My %s is %s', $key, $value)->echoln();
	});
		
Returns

	My first name is Mathijs
	My last name is Henquet

#### Url resource example
With mqWorks you can easily use external or local files by wrapping a string prefixed by a @ sign.

	µ('@local/resource.txt')->echoln(); // Echos the contents of the file

	µ('@http:://some_external.com/resource')->echoln(); // Echos the contents of the url

	µ('@local/data.json')->parseAs('json')->dump(); // Dumps the contents of the json file as php array

#### Twig, File and Yaml example

	µ('@data/data.yml')->each(function($item){
		µ('@data/test.twig')
			->render(array(
				'full_name'=>$item['first_name'].' '.$item['last_name'], 
				'first_name'=>$item['first_name'], 
				'last_name'=>$item['last_name'])
			)->nl2br()->wrapElement('p')->echoln();
	});

## I want it!
mqWorks is included by including the bootstrap file. Afterwards you can add your own function sources and use the mqWorks lib.
	
	<?php
	include 'path_to_mqWorks/mqWorks/bootstrap.php';

Then go the the [getting started](http://wiki.github.com/mathijshenquet/mqWorks/getting-started "Getting started") page.