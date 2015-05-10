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
  class Index {

      public function Index2() {
	  $inpputData = new \GF\InputData::getInstance()->get(0);
	  $val = new \GF\Validation();
	  $val->setRule('minlenght', 'niki', 12,'gre6no e be gre6no e ');
	  var_dump($val->validate());
	  var_dump($val->getErrors());

	  $view = \GF\View::getInstance();
	  $view->appendToLayout('pice', 'index');
	  $view->display('ladyouts.default');
      }

  }
  