<?php

  namespace Controllers;

  /**
   * Description of Help
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */
  class Help extends UserController {

      public function __construct() {
	  parent::__construct();
	  $this->data['load_page'] = 'help';
      }

      public function index() {
	  
      }

  }
  