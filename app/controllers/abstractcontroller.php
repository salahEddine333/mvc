<?php

namespace  MVC\CONTROLLERS;

class AbstractController {

  private $controller;
  private $view;
  protected $modelHandler;
  private $templates;
  private $datas;

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
    $this->controller = $controller;
  }

  public function setView($view) {
    $this->view = $view;
  }

  public function setTemplates($templates) {
    $this->templates = $templates;
  }

  public function setParams($params) {
    $this->params = $params;
  }

  public function notfoundAction() {
    $this->view();
  }

  public function view() {
    $viewDir = VIEWS . DS . $this->controller;
    if(is_dir($viewDir)) {
      $viewFile = $viewDir . DS . $this->view . ".view.php";
      if(file_exists($viewFile)) {
        $templateObject = new \MVC\LIBS\Template($this->templates);
        $templateObject->setView($viewFile);
        $templateObject->setDatas($this->datas);
        $templateObject->renderApp();
      }
    }
  }
  
}