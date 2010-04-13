<?php 
include '../src/bootstrap.php';

�('@data/data.yml')->each(function($item){
	�('@data/test.twig')
		->render(array(
			'full_name'=>$item['first_name'].' '.$item['last_name'], 
			'first_name'=>$item['first_name'], 
			'last_name'=>$item['last_name'])
		)->nl2br()->wrapElement('p')->echoln();
});