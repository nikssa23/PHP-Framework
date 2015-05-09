<?php

  error_reporting(E_ALL ^ E_NOTICE);
  include '../../gf/App.php';
  $app = \GF\App::getInstance();
//  $db = new \GF\DB\SimpleDB();
//  $a = $db->prepare("SELECT * FROM users")->execute()->fetchAllAssoc();
//  print_r($a);
//  echo $app->getConfig()->app;
  $app->run();
  $app->getSession()->counter+=1;
  echo $app->getSession()->counter;
  