## mqWorks
mqWorks is a library written to introduce object orientated programming in the standard datatypes. Allowing programmers to mimic javascript like programming like:

	// adding a function
	Array.prototype.somefunction = function()
	{
	};
	
	//using it
	var test = new Array()
	Array.somefunction();

### Syntax
The mqWorks library adds only one function and a class to the global namespace both named µ. The µ function wraps native php variables and allows you to execute methods. The µ class uses the same function stack as the µ function. 

The following two lines are the same: 

	<?php
	µ('Hello world')->echoln(); // Hello World<br />
	
	µ::echoln('Hello world'); // Hello World<br />
	?>
	
> You can type the µ sign using `altgr + m` or µ `ctrl + alt + m` if you dont like this you can alias the function and class. To q for example:
> 
>     function q(){
>         return µ(func_get_args());
>     }
>     class q extends µ{}