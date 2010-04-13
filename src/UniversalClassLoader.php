<?php
namespace mqWorks;

/*
 * This file is part of the symfony package.
 *
 * Copyright (c) 2004-2010 Fabien Potencier
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished
 * to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * @package    symfony
 * @subpackage foundation
 * @author     Fabien Potencier <fabien.potencier@symfony-project.org>
 */
class UniversalClassLoader
{
  protected static $namespaces = array();
  protected static $prefixes = array();

  public static function getNamespaces()
  {
    return self::$namespaces;
  }

  public static function getPrefixes()
  {
    return self::$prefixes;
  }

  /**
   * Registers an array of namespaces
   *
   * @param array $namespaces An array of namespaces (namespaces as keys and locations as values)
   */
  public static function registerNamespaces(array $namespaces)
  {
    self::$namespaces = array_merge(self::$namespaces, $namespaces);
  }

  /**
   * Registers a namespace.
   *
   * @param string $namespace The namespace
   * @param string $path      The location of the namespace
   */
  public static function registerNamespace($namespace, $path)
  {
    self::$namespaces[$namespace] = $path;
  }

  /**
   * Registers an array of classes using the PEAR naming convention.
   *
   * @param array $classes An array of classes (prefixes as keys and locations as values)
   */
  public static function registerPrefixes(array $classes)
  {
    self::$prefixes = array_merge(self::$prefixes, $classes);
  }

  /**
   * Registers a set of classes using the PEAR naming convention.
   *
   * @param string $prefix The classes prefix
   * @param string $path   The location of the classes
   */
  public static function registerPrefix($prefix, $path)
  {
    self::$prefixes[$prefix] = $path;
  }

  /**
   * Registers this instance as an autoloader.
   */
  public static function register()
  {
    spl_autoload_register(array(__CLASS__, 'loadClass'));
  }

  /**
   * Loads the given class or interface.
   *
   * @param string $class The name of the class
   */
  public static function loadClass($class)
  {  	
    if (false !== ($pos = strripos($class, '\\')))
    {
      // namespaced class name
      $namespace = substr($class, 0, $pos);
      foreach (self::$namespaces as $ns => $dir)
      {
        if (0 === strpos($namespace, $ns))
        {
          $namespace = substr($namespace, strlen($ns));
          $class = substr($class, $pos + 1);
          $file = $dir.DIRECTORY_SEPARATOR.str_replace('\\', DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR.str_replace('_', DIRECTORY_SEPARATOR, $class).'.php';
          require $file;
          
          return;
        }
      }
    }
    else
    {
      // PEAR-like class name
      foreach (self::$prefixes as $prefix => $dir)
      {
        if (0 === strpos($class, $prefix))
        {
          $file = $dir.DIRECTORY_SEPARATOR.str_replace('_', DIRECTORY_SEPARATOR, substr($class, strlen($prefix))).'.php';
          require $file;

          return;
        }
      }
    }
  }
}
