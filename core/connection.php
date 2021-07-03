<?php
class Connection
{

  private $driver;
  private $host;
  private $user;
  private $password;
  private $dbName;
  private $charset = "utf8";
  protected function connect()
  {
    $this->driver = getenv('APP_DRIVER');
    $this->host = getenv('APP_HOST');
    $this->user = getenv('APP_USER');
    $this->password = getenv('APP_PASSWORD');
    $this->dbName = getenv('DB_NAME');
    try {
      $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};charset={$this->charset}", $this->user, $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }
  }
}
