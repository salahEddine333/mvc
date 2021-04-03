<?php

namespace  MVC\CONTROLLERS;

class AbstractController {

  private $_controller;
  private $_view;

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