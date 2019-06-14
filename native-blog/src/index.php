<?php

//using absolute, cause bootstrap can be anywhere
define("ABS_APP_PATH", __DIR__);

require_once(ABS_APP_PATH. '/Db.php');

if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    $controller = 'page';
    $action = 'home';
}

require_once('views/layout.php');