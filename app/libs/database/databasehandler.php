<?php

namespace MVC\LIBS\DATABASE;

class DatabaseHandler {

  public static $handler;

  private static function initDB() {
    try {
      $dsn = "mysql://hostname=" . HOSTNAME . ";dbname=" . DBNAME;
      self::$handler = new \PDO($dsn, USER_NAME, USER_PASS, [
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION
      ]);
    } catch(\PDOException $e) {
      return $e->getMessage();
    }
  }

  public static function factory() {
    self::initDB();
    if(self::$handler === null) {
      self::$handler == new self();
    }
    return self::$handler;
  }

}