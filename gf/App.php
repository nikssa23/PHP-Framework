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
      private $_config = null;
      private $router = null;
      private $_dbConnections = null;
      private $_session = null;

      /**
       * @var \GF\FrontController
       */
      private $_frontController = null;

      private function __construct() {
	  set_exception_handler(array($this, '_exceptionHandler'));
	  \GF\Loader::registerNamespace('GF', dirname(__FILE__) . DIRECTORY_SEPARATOR);
	  \GF\Loader::registerAutoload();
	  $this->_config = \GF\Config::getInstance();
	  // if config folder not set, use default
	  if ($this->_config->getConfigFolder() == null) {
	      $this->setConfigFolder('../config');
	  }
      }

      function getRouter() {
	  return $this->router;
      }

      function setRouter($router) {
	  $this->router = $router;
      }

      public function setConfigFolder($path) {
	  $this->_config->setConfigFolder($path);
      }

      public function getConfigFolder() {
	  return $this->_configFolder;
      }

      /**
       * @return \GF\Config
       */
      public function getConfig() {
	  return $this->_config;
      }

      public function run() {
	  // if config folder not set, use default
	  if ($this->_config->getConfigFolder() == null) {
	      $this->setConfigFolder('../config');
	  }
	  $this->_frontController = \GF\FrontController::getInstance();
	  if ($this->router instanceof \GF\Routers\IRouter) {
	      $this->_frontController->setRouter($this->router);
	  } else if ($this->router == 'JsonRPCRouter') {
	      $this->_frontController->setRouter(new \GF\Routers\DefaultRouter());
	  } else if ($this->router == 'CLIRouter') {
	      $this->_frontController->setRouter(new \GF\Routers\DefaultRouter());
	  } else {
	      $this->_frontController->setRouter(new \GF\Routers\DefaultRouter());
	  }

	  $_sess = $this->_config->app['session'];
	  if ($_sess['autostart']) {
	      if ($_sess['type'] == 'native') {
		  $_s = new \GF\Session\NativSession($_sess['name'], $_sess['lifetime'], $_sess['path'], $_sess['domain'], $_sess['secure']);
		  $this->setSession($_s);
	      } else if ($_sess['type'] == 'database') {
		  $_s = new \GF\Session\DBSession($_sess['dbConnection'], $_sess['name'], $_sess['dbTable'], $_sess['lifetime'], $_sess['path'], $_sess['domain'], $_sess['secure']);
		  $this->setSession($_s);
	      } else {
		  throw new Exception('Not valid Session', 500);
	      }
	  }

	  $this->_frontController->dispatch();
      }

      public function setSession(\GF\Session\ISession $session) {
	  $this->_session = $session;
      }

      /*
       * @return \GF\Session\ISession
       */

      public function getSession() {
	  return $this->_session;
      }

      public function getDBConnection($connection = 'default') {
	  if (!$connection) {
	      throw new \Exception('No connection found', 500);
	  }
	  if ($this->_dbConnections[$connection]) {
	      return $this->_dbConnections[$connection];
	  }
	  $_cnf = $this->getConfig()->database;
	  if (!$_cnf[$connection]) {
	      throw new \Exception('No valid connection indetificator is provided', 500);
	  }
	  $dbh = new \PDO($_cnf[$connection]['connection_uri'], $_cnf[$connection]['username'], $_cnf[$connection]['password'], $_cnf[$connection]['pdo_options']);
	  $this->_dbConnections[$connection] = $dbh;
	  return $dbh;
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

      public function __destruct() {
	  if ($this->_session != null) {
	      $this->_session->SaveSession();
	  }
      }

      private function _exceptionHandler(\Exception $ex) {
	  if ($this->_config && $this->_config->app['displayExceptions'] == true) {
	      echo '<pre>' . print_r($ex) . '</pre>';
	  } else {
	      $this->displayError($ex->getCode());
	  }
      }

      private function displayError($error) {
	  try {
	      $view = \GF\View::getInstance();
	      $view->display('errors.' . $error);
	  } catch (\Exception $exc) {
	      \GF\Common::headerStatus($error);
	      echo '<h1>' . $error . '</h1>';
	      exit;
	  }
      }

  }
  