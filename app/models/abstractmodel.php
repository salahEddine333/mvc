<?php

namespace MVC\MODELS;
use MVC\LIBS\DATABASE;

class AbstractModel {

  protected static $dbHandler;

  public function __construct()
  {
    self::$dbHandler = DATABASE\DatabaseHandler::factory();
  }

  private function mapTableFields() {
    $strRequest = "";
    if(isset(static::$tableFields)) {
      foreach(static::$tableFields as $field) {
        $strRequest.= "$field = ?, ";
      }
    }
    return trim($strRequest, ", ");
  }

  public function insert() {
    try {
      $strRequest = "INSERT INTO " . static::$tableName . " SET " . $this->mapTableFields();
      $excuteArray = [];
      foreach(static::$tableFields as $field) {
        array_push($excuteArray, $this->$field);
      }
      $stmt = self::$dbHandler->prepare($strRequest);
      if($stmt->execute($excuteArray)) {
        return self::$dbHandler->lastInsertId();
      }
    } catch(\PDOException $e) {
      return $e->getMessage();
    }
  }
  
}
