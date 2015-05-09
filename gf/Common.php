<?php

  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

  namespace GF;

  /**
   * Description of Common
   * @author Nikolay Velchev <n.velchev95@gmail.com>
   */
  class Common {

      public static function normalize($data, $types) {
	  $types = explode('|', $types);
	  if (is_array($types)) {
	      foreach ($types as $v) {
		  if ($v == 'int') {
		      $data = (int) $data;
		  }
		  if ($v == 'float') {
		      $data = (float) $data;
		  }
		  if ($v == 'double') {
		      $data = (double) $data;
		  }
		  if ($v == 'bool') {
		      $data = (bool) $data;
		  }
		  if ($v == 'string') {
		      $data = (string) $data;
		  }
		  if ($v == 'trim') {
		      $data = trim($data);
		  }
		  if ($v == 'xss') {
		      $data = htmlentities($data);
		  }
	      }
	  }
	  return $data;
      }

  }
  