<?php 
include '../src/bootstrap.php';

�::loop(10, function(){
	$a = rand(0, 100);
	$b = rand(0, 100);
	
	�($a, $b)->format("Greatest Common Devisor of %s and %s is ")->echo();
	�($a, $b)->gcd()->echoln();
});