<?php

  /**
   * Description of SimpleDB
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF\DB;

  class SimpleDB {

      protected $connection = 'default';
      private $db = null;

      private $stmt = null;
      private $params = array();
      private $sql;
	
      public function __construct($connection = null) {
	  if ($connection instanceof \PDO) {
	      $this->db = \GF\App::getInstance()->getDBConnection($connection);
	      $this->connection = $connection;
	  }else{
	      $this->db = \GF\App::getInstance()->getDBConnection($this->connection);
	  }
      }
      
      /**
       * @param type $sql
       * @param type $params
       * @param type $pdoOptions
       * @return \GF\DB\SimpleDB
       */
      public function prepare ($sql,$params=array(),$pdoOptions=array()){
	  $this->stmt = $this->db->prepare($sql,$pdoOptions);
	  $this->params = $params;
	  $this->sql = $sql;
	  return $this;
      }
      
  }
  
  
  
  class test extends \GF\DB\SimpleDB{
      public function __construct($connection = null) {
	  parent::__construct();
      }
  }