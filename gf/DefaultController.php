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
       * @var \GF\DB\SimpleDB
       */
      public $db;

      /**
       * @var \GF\InputData
       */
      public $input;

      public function __construct() {
	  $this->app = \GF\App::getInstance();
	  $this->view = \GF\View::getInstance();
	  $this->config = $this->app->getConfig();
	  $this->db = $this->app->getDBConnection();
	  $this->input = \GF\InputData::getInstance();
      }

      public function jsonResponse() {
	  //TODO IMPLEMENT
      }

  }
  