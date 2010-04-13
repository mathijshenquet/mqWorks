<?php

/* Hallo {{ full_name }}!

This is an example from the mqWorks framework. 

{{ first_name }}, how do you feel about your last name {{ last_name }} */
class __TwigTemplate_79911d0cf899ab42efee59f28878172a extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hallo ";
    echo (isset($context['full_name']) ? $context['full_name'] : null);
    echo "!

This is an example from the mqWorks framework. 

";
    // line 5
    echo (isset($context['first_name']) ? $context['first_name'] : null);
    echo ", how do you feel about your last name ";
    echo (isset($context['last_name']) ? $context['last_name'] : null);
  }

  public function getName()
  {
    return "Hallo {{ full_name }}!

This is an example from the mqWorks framework. 

{{ first_name }}, how do you feel about your last name {{ last_name }}";
  }

}
