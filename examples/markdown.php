<?php 
include '../src/bootstrap.php';

$markdown = '
Hallo
=====

* Markdown
* Is
* Cool
* en
* Awesome!

Of *niet* dan!
';

�($markdown)->parseAs('markdown')->echoln();