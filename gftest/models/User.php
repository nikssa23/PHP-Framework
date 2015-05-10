<?php

  namespace Models;

  class User extends \GF\DefaultModel {

      /**
       * Description of User
       * @author Nikolay Velchev <n.velchev95@gmail.com>
       */
      public function register($username, $email, $pass) {
	 $this->db->prepare("INSERT INTO users (name, email, pass) VALUES (?,?,?)")->execute(array($username, $email, md5($pass)));
	  return $this->db->lastInsertId();
      }

  }
  