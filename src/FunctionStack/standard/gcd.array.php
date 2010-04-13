<?php 
return function(array $var){
	$a = $var[0];
	$b = $var[1];
	
	while($a != $b){
		while($a>$b && $b > 0){
			$a -= $b;
		}
		
		while($b>$a && $a > 0){
			$b -= $a;
		}
	}
	
	return max($a, $b);
};