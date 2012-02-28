<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');


define('SITE_PATH',dirname(__FILE__));

require_once dirname(dirname(__FILE__)).'/bootstrap.php';


function configure()
{
  option('env', ENV_DEVELOPMENT);
  option('autorender', true);
}
error_reporting(E_ALL);
ini_set('display_errors', '1');

run();
