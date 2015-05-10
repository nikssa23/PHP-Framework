<?php

  namespace Controllers;

  /**
   * Description of Index
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */
  class Register extends UserController {

      public function __construct() {
	  parent::__construct();
	  $this->data['load_page'] = 'register';
      }

      public function Index() {
	  $this->data['styles'][] = 'login';
	  $this->view->appendToLayout('content', 'user.register');
	  $this->view->display('layouts.default', $this->data);
      }

  }
  