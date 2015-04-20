<?php

  /**
   * Description of App
   *
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  class App {

      private static $_instance = null;

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
  