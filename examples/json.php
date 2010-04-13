<?php
include '../src/bootstrap.php';

µ('
{
	"first_name": "Mathijs",
	"last_name": "Henquet"
}
')->parseAs('json')->echoln();