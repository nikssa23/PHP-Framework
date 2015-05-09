<?php

  /**
   * Description of View
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  class View {

      private static $namespaces = null;
      private $viewPath = null;
      private $data = array();

      private function __construct() {
	  $this->viewPath = \GF\App::getInstance()->getConfig()->app['viewsDirectory'];
	  if ($this->viewPath == null) {
	      $this->viewPath = realpath('../views/');
	  }
      }

      public function __set($name, $value) {
	  $this->data[$name] = $value;
      }

      public function __get($name) {
	  return $this->data[$name];
      }

      /**
       * 
       * @return \GF\View
       */
      public static function getInstance() {
	  if (self::$_instance == null) {
	      self::$_instance = new \GF\View();
	  }

	  return self::$_instance;
      }

  }
  