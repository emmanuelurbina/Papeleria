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
  public function get_by_sku($sku)
  {
    /** RETORNA EL ELEMENTO QUE HAGA MATCH CON @sku */
    try {
      //code...
      $stm = $this->pdo->prepare("SELECT * FROM " . self::TABLE . " WHERE sku=? ");
      $stm->execute(array($sku));
      return $stm->fetch(PDO::FETCH_OBJ);
    } catch (\PDOException $e) {
      echo $e->getMessage();
    }
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
