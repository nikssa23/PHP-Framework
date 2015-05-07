<?php
include '../../gf/App.php';
$app = \GF\App::getInstance();
$config = \GF\Config::getInstance();
$config->setConfigFolder('../config');
$app->run();