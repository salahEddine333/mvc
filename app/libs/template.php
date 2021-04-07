<?php

namespace MVC\LIBS;

class Template {
  private $templates;
  private $view;
  private $datas = [];

  public function __construct($templates)
  {
    $this->templates = $templates;
  }

  public function setView($viewFile) {
    $this->view = $viewFile;
  }

  public function setDatas($datas) {
    $this->datas = $datas;
  }

  private function renderHeadStart() {
    if(is_array($this->templates) && array_key_exists("head_start", $this->templates)) {
      require $this->templates["head_start"];
    }
    return false;
  }

  private function renderHeadEnd() {
    if(is_array($this->templates) && array_key_exists("head_end", $this->templates)) {
      require $this->templates["head_end"];
    }
    return false;
  }

  private function renderNav() {
    if(is_array($this->templates) && array_key_exists("nav", $this->templates)) {
      require $this->templates["nav"];
    }
    return false;
  }

  private function renderParentDivViewStart() {
    if(is_array($this->templates) && array_key_exists("parent_container_start", $this->templates)) {
      require $this->templates["parent_container_start"];
    }
    return false;
  }

  private function renderParentDivViewEnd() {
    if(is_array($this->templates) && array_key_exists("parent_container_end", $this->templates)) {
      require $this->templates["parent_container_end"];
    }
    return false;
  }

  private function renderFooter() {
    if(is_array($this->templates) && array_key_exists("footer", $this->templates)) {
      require $this->templates["footer"];
    }
    return false;
  }

  private function renderHeadRessources() {
    if(is_array($this->templates) && array_key_exists("head_ressources", $this->templates)) {
      $output = '';
      foreach($this->templates["head_ressources"] as $cssKey => $path) {
        $output.= "<link rel='stylesheet' href='$path'/>\n";
      }
      return $output;
    }
    return false;
  }

  private function renderFooterRessources() {
    if(is_array($this->templates) && array_key_exists("footer_ressources", $this->templates)) {
      $output = '';
      foreach($this->templates["footer_ressources"] as $jsKey => $path) {
        $output.= "<script src='$path'></script>\n";
      }
      return $output;
    }
    return false;
  }

  private function renderView() {
    if(!is_null($this->view)) {
      if(!empty($this->datas)) {
        extract($this->datas);
      }
      require $this->view;
    }
    return false;
  }

  public function renderApp() {
    $this->renderHeadStart();
    echo $this->renderHeadRessources();
    $this->renderHeadEnd();
    $this->renderNav();
    $this->renderParentDivViewStart();
    $this->renderView();
    $this->renderParentDivViewEnd();
    echo $this->renderFooterRessources();
    $this->renderFooter();
  }

}
