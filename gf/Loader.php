<?php

  /**
   * Description of Loader
   *
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  final class Loader {
      private static $namespaces = array();
      
      private function __construct() {
	  
      }
      
      public static function registerAutoload(){
	  spl_autoload_register(array("\GF\Loader",'autoload'));
      }
      
      public static function autoload($class){
	  self::loadClass($class);
      }
      
      public static function registerNamespace($namespace,$path){
	  $namespace = trim($namespace);
	  if(strlen($namespace) > 0){
	      if(!$path){
		  throw new \Exception('Invalid patch');
	      }
	      $_patch = realpath($path);
	      if($_patch && is_dir($_patch) && is_readable($_patch)){
		  self::$namespaces[$namespace] = $_patch . DIRECTORY_SEPARATOR;
	      }else{
		  throw new \Exception('Namespace directory read error: '.$path);
	      }
	  }else{
	      throw new \Exception('Invalid namespace: '. $namespace);
	  }
      }
  }
  