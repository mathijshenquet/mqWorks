<?php

/* Hallo {{ name }}! */
class __TwigTemplate_dfe2fde8205377a52b669078aff7ed98 extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hallo ";
    echo (isset($context['name']) ? $context['name'] : null);
    echo "!";
  }

  public function getName()
  {
    return "Hallo {{ name }}!";
  }

}
