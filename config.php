<?php
  require 'enviroment.php';

  global $config;
  $config = array();
  if (ENVIROMENT == 'development') {
    ini_set("display_errors", "On");
    define("BASEURL", "http://localhost/apergsweb/");
    $config['dbname'] = 'apergsdb';
    $config['host']   = 'localhost';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'eloperdido';
  } else {
    ini_set("display_errors", "Off");
    define("BASEURL", "https://danerscode.com/");
    $config['dbname'] = 'u132842290_aperg';
    $config['host']   = 'localhost';
    $config['dbuser'] = 'u132842290_apeu';
    $config['dbpass'] = '1El0perdid0!';
  }

 ?>
