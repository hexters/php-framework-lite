<?php 

  class Database {
      
    /* PROTECTED AREA */
    public static $db = null;
    public function __construct() {
      $config = new Config();
      self::$db = new PDO($config->driver . ':host=' . $config->host . ';dbname=' . $config->database, $config->user, $config->password);
    }

    public static function connect() {
      if(self::$db){
        self::$db = new Database();
      }

      return self::instance();
    }

    public function insert ($table, $data = []) {
      $fields = '';
      $values = '';
      foreach($data as $field => $value) {
        $fields .= $field . ',';
        $values .= ':' . $field . ',';
      }
      $statement = self::$db->prepare('INSERT INTO ' . $table . '(' . rtrim($fields, ',') . ')VALUE(' . rtrim($values, ',') . ')');
      return $statement->execute($data);
    }

  }
  