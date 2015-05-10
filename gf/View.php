<?php

  /**
   * Description of View
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  class View {

      private static $_instance = null;
      private $_viewPath = null;
      private $_viewDir = null;
      private $_extension = '.php';
      private $_data = array();
      private $_layoutParts = array();
      private $_layoutData = array();

      private function __construct() {
	  $this->_viewPath = \GF\App::getInstance()->getConfig()->app['viewsDirectory'];
	  if ($this->_viewPath == null) {
	      $this->_viewPath = realpath('../views/');
	  }
      }

      public function setViewDirectory($path) {
	  $path = trim($path);
	  if ($path) {
	      $path = realpath($path) . DIRECTORY_SEPARATOR;
	      if (is_dir($path) && is_readable($path)) {
		  $this->_viewDir = $path;
	      } else {
		  //todo
		  throw new Exception('view path', 500);
	      }
	  } else {
	      //todo
	      throw new Exception('view path', 500);
	  }
      }

      public function display($name, $data = array(), $returnAsString = false) {
	  if (is_array($data)) {
	      $this->_data = array_merge($this->_data, $data);
	  }
	  if (count($this->_layoutParts) > 0) {
	      foreach ($this->_layoutParts as $key => $v) {
		  $r = $this->_includeFile($v);
		  if ($r) {
		      $this->_layoutData[$key] = $r;
		  }
	      }
	  }
	  if ($returnAsString) {
	      return $this->_includeFile($name);
	  } else {
	      echo $this->_includeFile($name);
	  }
      }

      public function _includeFile($file) {
	  if ($this->_viewDir == null) {
	      $this->setViewDirectory($this->_viewPath);
	  }
	  $fl = $this->_viewDir . str_replace('.', DIRECTORY_SEPARATOR, $file) . $this->_extension;
	  if (file_exists($fl) && is_readable($fl)) {
	      ob_start();
	      include $fl;
	      return ob_get_clean();
	  } else {
	      throw new \Exception('View ' . $file . ' cannot be loaded', 500);
	  }
      }

      public function appendToLayout($key, $template) {
	  if ($key && $template) {
	      $this->_layoutParts[$key] = $template;
	  } else {
	      throw new Exception('Layout required valid key and template', 500);
	  }
      }

      public function getLayoutData($name) {
	  return $this->_layoutData[$name];
      }

      public function __set($name, $value) {
	  $this->_data[$name] = $value;
      }

      public function __get($name) {
	  return $this->_data[$name];
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