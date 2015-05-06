<?php

  /**
   * Description of Config
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  class Config {

      private static $_instance = null;
      private $_configFolder = null;
      private $_configArray = array();

      private function __construct() {
	  
      }

      private function setConfigFolder($configFolder) {
	  if (!$configFolder) {
	      throw new \Exception('Empty config folder path:');
	  }
	  $_configFolder = realpath($configFolder);
	  if ($_configFolder != FALSE && is_dir($_configFolder) && is_readable($_configFolder)) {
	      //clear old config data
	      $this->_configArray = array();
	      $this->_configFolder = $_configFolder . DIRECTORY_SEPARATOR;
	  } else {
	      throw new \Exception('Culdnt directory read error:' . $_configFolder);
	  }
      }

  }
  