<?php

  namespace GF;

  /**
   * Description of DefaultModel
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */
  class DefaultModel {

      /**
       * @var \GF\DB\SimpleDB
       */
      public $db;

      public function __construct() {
	  $this->db = \GF\App::getInstance()->getDBConnection();
      }

  }
  