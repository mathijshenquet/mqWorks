<?php

/* /test.html */
class __TwigTemplate_619de0cd14e18f5666cd3fe48cc4392d extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hello ";
    echo (isset($context['name']) ? $context['name'] : null);
    echo "!";
  }

  public function getName()
  {
    return "/test.html";
  }

}
