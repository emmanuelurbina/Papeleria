<?php

class Connection
{

  private $driver = "mysql";
  private $host = '';
  private $user = '';
  private $password = '';
  private $dbName = '';
  private $charset = "utf8";
  protected function connect()
  {
    try {
      $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};charset={$this->charset}", $this->user, $this->password);

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (\PDOException $e) {
      //echo $e->getMessage();
    }
  }
}
