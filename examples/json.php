<?php
include '../src/bootstrap.php';

�('
{
	"first name": "Mathijs",
	"last name": "Henquet"
}
')->parseAs('json')->each(function($value, $key){
	�::format('My %s is %s', $key, $value)->echoln();
});