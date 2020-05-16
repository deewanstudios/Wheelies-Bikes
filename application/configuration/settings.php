<?php

// settings.php

/**
 * Configuration for: Database
 * This is the place where you define your database credentials, database type
 * etc.
 */

/*
Local with default credentials
 */

/*
Local host connection with user credentials
 */

define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'wheeliesbikes');
define('DB_USER', 'terrence_mathis');
define('DB_PASS', 'Wheelies2017#!');

// Testing_server host connection with user credentials

/* define  (  'DB_TYPE'  ,  'mysql'  );
define  (  'DB_HOST'  ,  'localhost'  );
define  (  'DB_NAME'  ,  'deewan84_wheeliesbikes'  );
define  (  'DB_USER'  ,  'deewan84_terrenc'  );
define  (  'DB_PASS'  ,  'Wheelies2017#!'  ); */

// Live server host connection with user credentials

/* define('DB_TYPE', 'mysql');
define('DB_HOST', '10.169.0.244');
define('DB_NAME', 'wheelies1_bikes_production');
define('DB_USER', 'wheelies1_admin');
define('DB_PASS', 'PiZGZ0y$XizR'); */

// * timezone and date settings
$timezone_identifier = "Europe/London";
date_default_timezone_set($timezone_identifier);

// error settings (from php.ini)

ini_set("display_errors", true);
ini_set("error_reporting", E_ALL);

// these will need to be turned off when you publish your site

ini_set('xdebug.var_display_max_depth', '10');
ini_set('xdebug.var_display_max_children', '256');
ini_set('xdebug.var_display_max_data', '2048');

// Other Files Required to set up the application
require_once 'paths.php';
