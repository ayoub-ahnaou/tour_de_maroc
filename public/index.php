<?php
use TourDeMaroc\App\libraries\Core;

require_once "../vendor/autoload.php";
require_once "../config/config.php";
require_once "../app/libraries/Controller.php";
require_once "../app/libraries/middlewares.php";

// Start the session
session_start();
$core = new Core();