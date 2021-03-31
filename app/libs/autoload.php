<?php

namespace MVC\LIBS;

class Autoload {

  public static function autoload($className) {
    $className = APP_PATH . strtolower(str_replace("\\", "/", str_replace("MVC", "", $className))) . ".php";
    if(file_exists($className)) {
      include $className;
    }
  }

}

spl_autoload_register(__NAMESPACE__ . '\Autoload::autoload');








