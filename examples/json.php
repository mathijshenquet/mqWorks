<?php
include '../src/bootstrap.php';

µ('
{
	"first name": "Mathijs",
	"last name": "Henquet"
}
')->parseAs('json')->each(function($value, $key){
	µ::format('My %s is %s', $key, $value)->echoln();
});