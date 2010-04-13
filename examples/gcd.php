<?php 
include '../src/bootstrap.php';

µ::loop(10, function(){
	$a = rand(0, 100);
	$b = rand(0, 100);
	
	µ($a, $b)->format("Greatest Common Devisor of %s and %s is ")->echo();
	µ($a, $b)->gcd()->echoln();
});