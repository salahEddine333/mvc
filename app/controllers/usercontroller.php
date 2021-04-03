<?php

namespace MVC\CONTROLLERS;


class UserController extends AbstractController {

  public static $modelClassName = "UserModel";

  public function defaultAction() {
    $this->view();
  }

  public function addAction() {
    $this->view();
  }

  public function insertAction() {
    $model = $this->modelHandler;
    $model->username = "userTwo";
    $model->password = sha1("456");
    var_dump($model->insert());
  }

}