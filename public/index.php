<?php

namespace MVC;

use MVC\LIBS as L;

require_once realpath(dirname(__FILE__)) . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "app" . 
DIRECTORY_SEPARATOR . "configs" . DIRECTORY_SEPARATOR . "main.config.php";

$templates = require_once APP_PATH . DS . "configs" . DS . "tpl.config.php";

require_once realpath(dirname(__FILE__)) . DS . ".." . DS . "app" . 
DS . "libs" . DS . "autoload.php";

$frontcontrollerobj = new L\FrontController($templates);

$frontcontrollerobj->dispatch();












