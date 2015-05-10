<?php

  /**
   * Description of DefaultController
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  class DefaultController {

      /**
       * @var \GF\App
       */
      public $app;

      /**
       * @var \GF\View
       */
      public $view;

      /**
       * @var \GF\Config
       */
      public $config;

      /**
       * @var \GF\InputData
       */
      public $input;

      /**
       * @var \GF\Session\ISession
       */
      public $session;

      public function __construct() {
	  $this->app = \GF\App::getInstance();
	  $this->view = \GF\View::getInstance();
	  $this->config = $this->app->getConfig();
	  $this->input = \GF\InputData::getInstance();
	  $this->session = $this->app->getSession();
      }

      public function jsonResponse() {
	  //TODO IMPLEMENT
      }

  }
  