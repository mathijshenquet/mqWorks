<?php

/* Hallo {{ name }},<br />Matiq is cool */
class __TwigTemplate_e83a1be2bdf5c613c546ac2e098cdb73 extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hallo ";
    echo (isset($context['name']) ? $context['name'] : null);
    echo ",<br />Matiq is cool";
  }

  public function getName()
  {
    return "Hallo {{ name }},<br />Matiq is cool";
  }

}
