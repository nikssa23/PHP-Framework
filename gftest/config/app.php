<?php

  $cnf['default_controller'] = 'Index';
  $cnf['default_method'] = 'Index2';
  $cnf['namespaces']['Controllers'] = 'D:\wamp\www\GF\gftest\controllers\\';

  $cnf['session']['autostart'] = true;
  $cnf['session']['type'] = 'database'; // native, database
  $cnf['session']['name'] = '__sess';
  $cnf['session']['lifetime'] = 3600;
  $cnf['session']['path'] = '/';
  $cnf['session']['domain'] = '';
  $cnf['session']['secure'] = false;
  /*
   * ONLY FOR DB SESSIONS
   */
  $cnf['session']['dbConnection'] = 'default';
  $cnf['session']['dbTable'] = 'sessions';
  

  return $cnf;
  