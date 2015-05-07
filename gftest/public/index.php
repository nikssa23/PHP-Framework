<?php

  error_reporting(E_ALL ^ E_NOTICE);
  include '../../gf/App.php';
  $app = \GF\App::getInstance();
  echo $app->getConfig()->app;
  $app->run();
  