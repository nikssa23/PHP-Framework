<?php

  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

  namespace Controllers;

  /**
   * Description of Index
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */
  class Login extends UserController {

      public function __construct() {
	  parent::__construct();
	  $this->data['load_page'] = 'login';
      }

      public function Index() {
	  $this->data['styles'][] = 'login';
	  $this->view->appendToLayout('content', 'user.login');
	  $this->view->display('layouts.default', $this->data);
      }

      public function autenticate() {
      }

  }
  