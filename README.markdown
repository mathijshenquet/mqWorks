# mqWorks
mqWorks is a library written to introduce object orientated programming on the standard datatypes. Allowing programmers to mimic javascript and ruby like programming effectivly extending string or int classes.

## Getting started
mqWorks is included by including the bootstrap file. Afterwards you can add your own function sources and use the mqWorks lib.
	
	<?php
	include 'path_to_mqWorks/mqWorks/bootstrap.php';

## Syntax
The mqWorks library adds a function and a class to the global namespace both named µ. The µ function wraps native php variables and allows you to execute methods. The µ class uses the same function stack as the µ function. 

The following two lines are the same: 

	<?php
	µ('Hello world')->echoln(); // Hello World<br />
	
	µ::echoln('Hello world'); // Hello World<br />
	?>
	
> You can type the µ sign using `altgr + m` or `ctrl + alt + m` if you dont like this you can alias the function and class. To q for example:
> 
>     function q(){
>         return µ(func_get_args());
>     }
>     class q extends µ()

### Wrapping
Wrapping is the process of wrapping a native php datatype with the mqWorks library and is done using the µ function.



## Adding custom functions

First thing to do is add a custom filepath:

	<?php
	// Add sources for functions:
	mqWorks/FunctionStack::addSource('custom/%function%.%namespace%.php');

As you can see above you can register additional resources by adding filepaths. %function% and %namespace% in the filepath are the funciton name and filetype respectivly. So if `toUpper` is called on a `string` like so:

	<?php
	µ('yAmL')->toUpper();
	
An internal looks for the `custom/toUpper.string.php` file and includes it. This file must return a closure and so probably looks like this:

	<?php
	return function($value){
		return strtoupper($value);
	}
	
You might notice that the function has a argument while the toUpper function call doesn't. Thats becouse the first argument passed to the function is the value on witch the argument is passed to. It really sounds more complicated then it is.

So executing our file above will return `YAML`.

The namespaces isn't just `gettype()` on the wrapped value.

 * number - All numbers int's, floats and hex are assigned the namespace number
 * static - Null values are assigned the static namespace.
 * global - The global namespace apply's to all not null namespaces.
 
> Note that more custom namespaces will be added 