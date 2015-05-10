<?php

  namespace GF;

  /**
   * Description of InputData
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */
  class InputData {

      private static $_instance = null;
      private $_get = array();
      private $_post = array();
      private $_cookie = array();

      public function __construct() {
	  $this->_cookie = $_COOKIE;
      }

      public function seGget($get) {
	  if (is_array($get)) {
	      $this->_get = $get;
	  }
      }

      public function setPost($post) {
	  if (is_array($post)) {
	      $this->_post = $post;
	  }
      }

      public function setCookie($cookie) {
	  if (is_array($cookie)) {
	      $this->_cookie = $cookie;
	  }
      }

      public function hasGet($id) {
	  return array_key_exists($id, $this->_get);
      }

      public function hasPost($name) {
	  return array_key_exists($name, $this->_post);
      }

      public function hasCookie($cookie) {
	  return array_key_exists($cookie, $this->_cookie);
      }

      public function get($id, $normalize = null, $default = null) {
	  if ($this->hasGet($id)) {
	      if ($normalize != null) {
		  return \GF\Common::normalize($this->_get[$id], $normalize);
	      }
	      return $this->_get[$id];
	  }
	  return $default;
      }

      public function post($name, $normalize = null, $default = null) {
	  if ($this->hasGet($name)) {
	      if ($normalize != null) {
		  return \GF\Common::normalize($this->_post[$name], $normalize);
	      }
	      return $this->_post[$name];
	  }
	  return $default;
      }

      public function cookie($name, $normalize = null, $default = null) {
	  if ($this->hasCookie($name)) {
	      if ($normalize != null) {
		  return \GF\Common::normalize($this->_cookie[$name], $normalize);
	      }
	      return $this->_cookie[$name];
	  }
	  return $default;
      }

      /**
       * 
       * @return \GF\InputData
       */
      public static function getInstance() {
	  if (self::$_instance == null) {
	      self::$_instance = new \GF\InputData();
	  }

	  return self::$_instance;
      }

  }
  