<?php
include '../src/bootstrap.php';

�('
{
	"first_name": "Mathijs",
	"last_name": "Henquet"
}
')->parseAs('json')->echoln();