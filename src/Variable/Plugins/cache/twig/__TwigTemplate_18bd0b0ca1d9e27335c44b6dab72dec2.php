<?php

/* Hallo {{ name }}, mijn naam is Matiq */
class __TwigTemplate_18bd0b0ca1d9e27335c44b6dab72dec2 extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hallo ";
    echo (isset($context['name']) ? $context['name'] : null);
    echo ", mijn naam is Matiq";
  }

  public function getName()
  {
    return "Hallo {{ name }}, mijn naam is Matiq";
  }

}
