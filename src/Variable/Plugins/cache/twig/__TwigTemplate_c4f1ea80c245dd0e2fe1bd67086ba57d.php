<?php

/* Hallo {{ name }},<br />Matiq is cool!<br /> */
class __TwigTemplate_c4f1ea80c245dd0e2fe1bd67086ba57d extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hallo ";
    echo (isset($context['name']) ? $context['name'] : null);
    echo ",<br />Matiq is cool!<br />";
  }

  public function getName()
  {
    return "Hallo {{ name }},<br />Matiq is cool!<br />";
  }

}
