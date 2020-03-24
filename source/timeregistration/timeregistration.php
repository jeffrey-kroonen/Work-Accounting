<?php

  class TimeRegistration extends Model {
    
    protected static $table = "time_registrations";
    public $id;
    public $user_id;
    public $client_id;
    public $type;
    public $title;
    public $description;
    public $start_datetime;
    public $end_datetime;
    
    public const TYPES = [
      "Development",
      "Marketing"
    ];
    
    public function __construct($init = null)
    {
      if (is_array($init)) {
        foreach ($init as $column => $value) {
          $this->$column = $value;
        }
      }
    }

    public function isDeleted() : void
    {
      if (isset($this->id)) {
        Database::update(static::$table, ["is_deleted" => 1], "WHERE `id` = ?", [$this->id]);
      }
    }

    public function undoDeletion() : void
    {
      if (isset($this->id)) {
        Database::update(static::$table, ["is_deleted" => 0], "WHERE `id` = ?", [$this->id]);
      }
    }
    
  }