<?php

  /**
   *  Required param
   *  @Attribute static table
   */

  abstract class Model {
    
    public static function find($mixed)
    {
      if (is_int($mixed)) {
        $query = "SELECT * FROM `".static::$table."` WHERE `".static::$table."`.`id` = ?";
        $params = [$mixed];
      } else if (is_array($mixed)) {
        $query = "SELECT * FROM `".static::$table."` WHERE `".implode("` = ? AND `", array_keys($mixed))."` = ?";
        $params = array_values($mixed);
      }
      
      $object = Database::find($query, $params);
      
      if ($object !== FALSE) {
       return new static($object); 
      }
    }
    
    public static function where(array $where) : array
    {
      $query = "SELECT * FROM `".static::$table."` WHERE `".implode("` = ? AND `", array_keys($where))."` = ?";
      $params = array_values($where);
      
      $objects = array();
      
      if (isset($query) && isset($params)) {
        $dataSet = Database::findAll($query, $params);
        
        foreach ($dataSet as $object) {
          array_push($objects, new static($object));
        }
        
      }
      return $objects;
    }
    
    public static function all() {
      
      $objects = array();
      
      $query = "SELECT * FROM `".static::$table."`";
      
      $dataSet = Database::findAll($query);
      
      foreach ($dataSet as $array) {
        array_push($objects, new static($array));
      }
      return $objects;
    }
    
    public function save() : void
    {
      $table = static::$table;
      $params = array();
      
      foreach ($this as $column => $value) {
        if (!is_null($this->$column)) {
          $params[$column] = $value;
        }
      }
      
      
      if (isset($this->id)) { 
        Database::update($table, $params, "WHERE id = ?", [$this->id]);
      } else {
        Database::insert($table, $params);
      }
      
    }
    
    public function delete() : void
    {
      try {
        Database::delete(static::$table, ["id" => $this->id]);
      } catch (Exception $e) {
        echo "error";
      }
    }
    
  }