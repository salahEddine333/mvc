<?php

namespace  MVC\CONTROLLERS;

class AbstractController {

  private $_controller;
  private $_view;
  protected $modelHandler;

  public function __construct()
  {
    $this->getObjectFromExceptModel();
  }

  private function getObjectFromExceptModel() {
    if(isset(static::$modelClassName)) {
      $classModelName = "\MVC\MODELS\\" . static::$modelClassName;
       $this->modelHandler = new $classModelName();
    }
  }

  public function setController($controller) {
    $this->_controller = $controller;
  }

  public function setView($view) {
    $this->_view = $view;
  }

  public function notfoundAction() {
    $this->view();
  }

  public function view() {
    $view = VIEWS . DS . $this->_controller . DS . $this->_view . ".view.php";
    if(file_exists($view)) {
      include $view;
    }
  }
  
}