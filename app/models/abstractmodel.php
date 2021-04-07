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

  public function update() {
    try {
      $key = static::$pk;
      $str_request = "UPDATE " . static::$tableName . " SET " . $this->mapTableFields() . " WHERE $key = " . $this->{$key};
      $stmt = self::$dbHandler->prepare($str_request);
      $excuteArray = [];
      foreach(static::$tableFields as $field) {
        array_push($excuteArray, $this->$field);
      }
      return $stmt->execute($excuteArray);
    } catch(\PDOException $e) {

      return $e->getMessage();

    }
  }

  public function delete() {
    try {
      $str_request = "DELETE FROM " . static::$tableName . " WHERE ";
      $str_request.=  static::$pk . " = ?";
      $execution = [
        $this->{static::$pk}
      ];
      $stmt = self::$dbHandler->prepare($str_request);
      return $stmt->execute($execution);
    } catch(\PDOException $ex) {

      return $ex->getMessage();

    }
  }

  public function getAll() {
    $pk = isset(static::$pk) ? static::$pk . ", ": "";
    $str_request = "SELECT " . $pk;
    foreach(static::$tableFields as $column) {
      $str_request.= "$column, ";
    }
    $str_request = trim($str_request, ", ") . " FROM " . static::$tableName;
    $stmt = self::$dbHandler->prepare($str_request);
    if($stmt->execute()) {
      return $stmt->fetchAll(\PDO::FETCH_CLASS, get_called_class());
    }
  }
  
}
