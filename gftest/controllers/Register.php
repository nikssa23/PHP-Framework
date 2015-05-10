<?php

  namespace Controllers;

  /**
   * Description of Index
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */
  class Register extends UserController {

      private $userModel;

      public function __construct() {
	  parent::__construct();
	  $this->userModel = new \Models\User();
	  $this->data['load_page'] = 'register';
	  $this->data['styles'][] = 'login';
	  $this->view->appendToLayout('content', 'user.register');
      }

      public function Index() {

	  $this->view->display('layouts.default', $this->data);
      }

      public function newprofile() {
	  if ($this->input->hasPost('username') && $this->input->hasPost('email') && $this->input->hasPost('pass')) {
	      $userId  = $this->userModel->register($this->input->post('username'), $this->input->post('email'), $this->input->post('pass'));
	      $login = new \Controllers\Login();
	      $login->doLogin($userId);
	      $this->data['success'][] = 'Successfull registration!';
	  } else {
	      $this->data['errors'][] = 'Missing parameter';
	  }

	  $this->view->display('layouts.default', $this->data);
      }

  }
  