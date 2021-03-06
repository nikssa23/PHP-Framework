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
	  $this->view->appendToLayout('content', 'help.help');
	  $this->view->display('layouts.default', $this->data);
      }

  }
  