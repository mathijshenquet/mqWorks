<?php

/* Hallo {{ first_name . last_name }}!

This is an example from the mqWorks framework. 

{{ first_name }}, how do you feel about your last name {{ last_name }} */
class __TwigTemplate_11c7b0fcb756be46de07d79e5f1aacdd extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hallo ";
    echo $this->getAttribute((isset($context['first_name']) ? $context['first_name'] : null), "last_name", array());
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
    return "Hallo {{ first_name . last_name }}!

This is an example from the mqWorks framework. 

{{ first_name }}, how do you feel about your last name {{ last_name }}";
  }

}
