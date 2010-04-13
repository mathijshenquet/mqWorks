<?php

/* Hallo {{ name }}, \n Matiq is cool */
class __TwigTemplate_e3a13b1d402862c509c912191a191023 extends Twig_Template
{
  public function display(array $context)
  {
    // line 1
    echo "Hallo ";
    echo (isset($context['name']) ? $context['name'] : null);
    echo ", \\n Matiq is cool";
  }

  public function getName()
  {
    return "Hallo {{ name }}, \\n Matiq is cool";
  }

}
