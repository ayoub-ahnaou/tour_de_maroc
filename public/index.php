<?php
use TourDeMaroc\App\Libraries\Core;
use TourDeMaroc\App\Libraries\Session;

require_once "../vendor/autoload.php";
require_once "../config/config.php";
require_once "../app/libraries/Controller.php";
require_once "../app/libraries/middlewares.php";

Session::getInstance();
$core = new Core();