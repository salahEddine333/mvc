<?php

namespace MVC\LIBS;

class FrontController {

  private $controller = "index";
  private $action = "default";
  private $params = [];

  public function __construct()
  {
    $this->parseUrl();
  }

  private function parseUrl() {
    $url = explode("/", trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"), 3);

    if(isset($url[0]) && $url[0] != "") {
      $this->controller = $url[0];
    }

    if(isset($url[1]) && $url[1] != "") {
      $this->action = $url[1];
    }

    if(isset($url[2]) && $url[2] != "") {
      $this->params = explode("/", $url[2]);
    }

  }


  public function dispatch() {
    $controllerClassName = "\MVC\CONTROLLERS\\" . ucfirst($this->controller) . "Controller";
    // \MVC\CONTROLLERS\OfferController
    $methodName = $this->action . "Action";
    if(!class_exists($controllerClassName)) {
      $this->controller = "error";
      $controllerClassName = "\MVC\CONTROLLERS\\" . ucfirst($this->controller) . "Controller";
    // \MVC\CONTROLLERS\ErrorController
      $this->action = "notfound";
      $methodName = $this->action . "Action";
    }
    $objectControllerClassName = new $controllerClassName();
    if(!method_exists($objectControllerClassName, $methodName)) {
      $this->action = "notfound";
      $methodName = $this->action . "Action";
    }
    $objectControllerClassName->$methodName();
  }

}