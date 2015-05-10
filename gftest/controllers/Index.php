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
  class Index extends UserController {

      public function __construct() {
	  parent::__construct();
	  $this->data['load_page'] = 'home';
      }

      public function Index() {


	      $this->view->appendToLayout('helpText', 'home.welcomeText');
	      $this->view->appendToLayout('answeredWuestions', 'home.answeredWuestions');
	      $this->view->appendToLayout('newQuestions', 'home.newQuestions');
	      $this->view->display('layouts.home', $this->data);

      }

  }
  