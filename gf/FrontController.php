<?php

  /**
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  Class FrontController {

      private static $_instance = null;

      public function __construct() {
	  
      }

      public function dispatch() {
	  $a = new \GF\Routers\DefaultRouter();
	  echo $a->parse();
      }

      /**
       * @return \GF\FrontController
       */
      public static function getInstance() {
	  if (self::$_instance == NULL) {
	      self::$_instance = new \GF\FrontController();
	  }
	  return self::$_instance;
      }

  }
  