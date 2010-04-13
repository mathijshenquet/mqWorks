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

µ($markdown)->parseAs('markdown')->echoln();