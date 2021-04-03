<?php

namespace MVC\MODELS;

class UserModel extends AbstractModel {

  public static $tableName = "users";

  public static $pk = "user_id";

  public static $tableFields = [
    "username",
    "password"
  ];

  public $user_id;
  public $username;
  public $password;

}
