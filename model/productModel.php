<?php
require_once 'core/crud.php';
class ProductModel extends Crud
{
  public $id;
  public $supplier;
  public $sku;
  public $name;
  public $description;
  public $price;
  public $status;
  private $pdo;
  const TABLE = 'products';
  public function __construct()
  {
    parent::__construct(self::TABLE);
    $this->pdo = parent::connect();
  }
  public function create()
  {
    try {
      //code...
      $stm = $this->pdo->prepare("INSERT INTO  " . self::TABLE . " (sku,name,description,price) VALUES (?,?,?,?)");
      $stm->execute(array(
        $this->sku,
        $this->name,
        $this->description,
        $this->price
      ));
    } catch (\PDOException $e) {
      //throw $e;
      echo $e->getMessage();
    }
  }
  public function update()
  {
    try {
      //code...
      $stm = $this->pdo->prepare("UPDATE  " . self::TABLE . " SET name=?,description=?,price=? WHERE id=?");
      $stm->execute(array(
        $this->name,
        $this->description,
        $this->price,
        $this->id
      ));
    } catch (\PDOException $e) {
      //throw $e;
      echo $e->getMessage();
    }
  }
}
