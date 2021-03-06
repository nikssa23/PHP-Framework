<?php

  /**
   * Description of Validation
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */

  namespace GF;

  class Validation {

      private $_rules = array();
      private $_errors = array();

      public function setRule($rule, $value, $params = null, $name = null) {
	  $this->_rules[] = array('val' => $value, 'rule' => $rule, 'par' => $params, 'name' => $name);
	  return $this;
      }

      public function validate() {
	  $this->_errors = array();
	  if (count($this->_rules > 0)) {
	      foreach ($this->_rules as $v) {
		  if (!$this->$v['rule']($v['val'], $v['par'])) {
		      if ($v['name']) {
			  $this->_errors[] = $v['name'];
		      } else {
			  $this->_errors[] = $v['rule'];
		      }
		  }
	      }
	  }
	  return (bool) !(count($this->_errors));
      }

      public function getErrors() {
	  return $this->_errors;
      }

      public function __call($a, $b) {
	  throw new \Exception('Invalid validation rule', 500);
      }

      public static function matches($val1, $val2) {
	  return $val1 == $val2;
      }

      public static function minlenght($val1, $val2) {
	  return (mb_strlen($val1) >= $val2);
      }

      public function required($val) {
	  if (is_array($var)) {
	      return !empty($val);
	  } else {
	      return $val != '';
	  }
      }

      public static function custom($val1, $val2) {
	  if ($val2 instanceof \Closure) {
	      return (boolean) call_user_func($val2, $val1);
	  } else {
	      throw new Exception('Invalid clsured function');
	  }
      }

  }
  