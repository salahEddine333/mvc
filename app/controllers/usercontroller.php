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

  public function updateAction() {
    $model = $this->modelHandler;
    $model->username = "userTest";
    $model->password = sha1("789");
    $model->user_id = 2;
    var_dump($model->update());
  }

  public function deleteAction() {
    $model = $this->modelHandler;
    $model->user_id = 2;
    var_dump($model->delete());
  }

  public function getAction() {
    $model = $this->modelHandler;
    var_dump($model->getAll());
  }

}