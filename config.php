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
    define("BASEURL", "https://delphustest.azurewebsites.net/");
    $config['dbname'] = 'apergsdb';
    $config['host']   = 'localhost';
    $config['dbuser'] = 'azure';
    $config['dbpass'] = 'password!';
  }

 ?>
