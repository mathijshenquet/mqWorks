<?php

/* Hallo {{ name }},<br /><br />Matiq is cool!<br /> */
class __TwigTemplate_92d99a2ba4c96fb53590859aaa258bf7 extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hallo ";
    echo (isset($context['name']) ? $context['name'] : null);
    echo ",<br /><br />Matiq is cool!<br />";
  }

  public function getName()
  {
    return "Hallo {{ name }},<br /><br />Matiq is cool!<br />";
  }

}
