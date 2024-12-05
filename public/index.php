<?php
require '../vendor/autoload.php';
session_start();
use Controllers\IndexController;
use Medoo\Medoo;
use Pecee\SimpleRouter\SimpleRouter;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

SimpleRouter::setDefaultNamespace('\Controllers');
require_once '../routes.php';
require_once '../utils/routes.php';

SimpleRouter::start();
