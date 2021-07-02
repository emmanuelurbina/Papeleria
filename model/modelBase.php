<?php
require_once 'core/crud.php';
class ModelBase extends Crud
{
  private $pdo;
  const TABLE = '';
  public function __construct()
  {
    parent::__construct(self::TABLE);
    $this->pdo = parent::connect();
  }
  public function create()
  {
    try {
      //code...
    } catch (\PDOException $e) {
      //throw $e;
      echo $e->getMessage();
    }
  }
  public function update()
  {
    try {
      //code...
    } catch (\PDOException $e) {
      //throw $e;
      echo $e->getMessage();
    }
  }
}
