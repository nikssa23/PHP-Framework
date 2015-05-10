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
  class Forum extends UserController {

      public function __construct() {
	  parent::__construct();
	  $this->data['load_page'] = 'forum';
      }

      public function Index() {
	  $this->view->display('layouts.default', $this->data);
      }

  }
  