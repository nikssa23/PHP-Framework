<?php

  /**
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  Class FrontController {

      private static $_instance = null;
      private $ns = null;
      private $controller = null;
      private $method = null;
      private $router = null;

      public function __construct() {
	  
      }

      function getRouter() {
	  return $this->router;
      }

      function setRouter(\GF\Routers\IRouter $router) {
	  $this->router = $router;
      }

      public function dispatch() {
	  if ($this->router == null) {
	      throw new Exception('Not valid router found', 500);
	  }
	  $_uri = $this->router->getURI();
	  $_rc = null;
	  $routes = \GF\App::getInstance()->getConfig()->routes;
	  if (is_array($routes) && count($routes) > 0) {
	      foreach ($routes as $k => $v) {
		  if (strpos($_uri, $k) === 0 && ($_uri == $k || strpos($_uri, $k . '/') === 0) && $v['namespace']) {
		      $this->ns = $v['namespace'];
		      $_uri = substr($_uri, strlen($k) + 1);
		      $_rc = $v;
		      break;
		  }
	      }
	  } else {
	      throw new Exception('Default route missing', 500);
	  }
	  if ($this->ns == null && $routes['*']['namespace']) {
	      $this->ns = $routes['*']['namespace'];
	      $_rc = $routes['*'];
	  } else if ($this->ns == null && !$routes['*']['namespace']) {
	      throw new Exception('Default route missing', 500);
	  }
	  $input = \GF\InputData::getInstance();
	  $_params = explode('/', $_uri);
	  if ($_params[0]) {
	      $this->controller = strtolower($_params[0]);
	      if ($_params[1]) {
		  $this->method = strtolower($_params[1]);
		  unset($_params[0], $_params[1]);
		  $input->seGget(array_values($_params));
	      } else {
		  $this->method = $this->getDefaultMethod();
	      }
	  } else {
	      $this->controller = $this->getDefaultController();
	      $this->method = $this->getDefaultMethod();
	  }

	  if (is_array($_rc) && $_rc['controllers']) {
	      if ($_rc['controllers'][$this->controller]['methods'][$this->method]) {
		  $this->method = strtolower($_rc['controllers'][$this->controller]['methods'][$this->method]);
	      }
	      if (isset($_rc['controllers'][$this->controller]['to'])) {
		  $this->controller = strtolower($_rc['controllers'][$this->controller]['to']);
	      }
	  }

	  $input->setPost($this->router->getPost());
//	  echo $this->ns . '<br />';
//	  echo $this->controller . '<br />';
	  $f = $this->ns . '\\' . ucfirst($this->controller);
	  $newController = new $f();
	  $newController->{$this->method}();
      }

      public function getDefaultController() {
	  $controller = \GF\App::getInstance()->getConfig()->app['default_controller'];
	  if ($controller) {
	      return strtolower($controller);
	  }
	  return 'index';
      }

      public function getDefaultMethod() {
	  $method = \GF\App::getInstance()->getConfig()->app['default_method'];
	  if ($method) {
	      return strtolower($method);
	  }
	  return 'index';
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
  