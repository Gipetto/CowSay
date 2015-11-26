<?php

error_reporting(E_ALL | E_STRICT | E_WARNING);
ini_set('display_errors', 1);

define('PACKAGE_ROOT', dirname(dirname(__FILE__)));

require_once PACKAGE_ROOT . DIRECTORY_SEPARATOR . 'vendor/autoload.php';