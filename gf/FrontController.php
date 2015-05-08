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
	  $a->parse();
	  $controller = $a->getController();
	  if ($controller == null) {
	      $controller = $this->getDefaultController();
	  }
	  $method = $a->getMethod();

	  if ($method == null) {
	      $method = $this->getDefaultMethod();
	  }
      }

      public function getDefaultController() {
	  $controller = \GF\App::getInstance()->getConfig()->app['default_controller'];
	  if ($controller) {
	      return $controller;
	  }
	  return 'Index';
      }

      public function getDefaultMethod() {
	  $method = \GF\App::getInstance()->getConfig()->app['default_method'];
	  if ($method) {
	      return $method;
	  }
	  return 'Index';
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
  