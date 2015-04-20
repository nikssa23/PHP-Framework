<?php

  /**
   * Description of App
   *
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

include_once 'Loader.php';

  class App {

      private static $_instance = null;

      private function __construct() {
	  \GF\Loader::registerNamespace('GF', dirname(__FILE__) . DIRECTORY_SEPARATOR);
	  \GF\Loader::registerAutoload();
      }

      public function run() {
	  
      }

      /**
       * 
       * @return \GF\App
       */
      public static function getInstance() {
	  if (self::$_instance == null) {
	      self::$_instance = new \GF\App();
	  }

	  return self::$_instance;
      }

  }
  