<?php

  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

  namespace Controllers;

  /**
   * Description of UserController
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */
  class UserController extends \GF\DefaultController {

      protected $data = null;

      public function __construct() {
	  parent::__construct();
	  $this->data['load_page'] = null;
	  $this->data['styles'] = array();
	  $this->data['scripts'] = array();
	  $this->data['errors'] = array();
	  $this->data['success'] = array();
	  $this->checkLogin();
      }

      private function checkLogin() {
	  if ($this->session->isLoged) {
	      $this->data['isLoged'] = true;
	      $this->data['userId'] = $this->session->userId;
	  } else {
	      $this->data['isLoged'] = false;
	  }
      }

  }
  