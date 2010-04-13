<?php

/* Hello {{ name }}! */
class __TwigTemplate_88546f63b7a447f70b6a43644b2d5dab extends Twig_Template
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
    return "Hello {{ name }}!";
  }

}
