<?php
require_once "model/productModel.php";
class ProductController
{
  private $model;
  public function __construct()
  {
    $this->model = new ProductModel();
  }
  public function show()
  {
    $product = new ProductModel();
    if (isset($_REQUEST['id'])) :
      $product = $this->model->get_by_id($_REQUEST['id']);
    endif;
    $context = ['title' => 'Base PHP'];
    require_once "view/product/product_form.php";
  }

  public function save()
  {
    $product = new ProductModel();
    $product->id = $_REQUEST['id'];
    $product->sku = $_REQUEST['sku'];
    $product->name = $_REQUEST['name'];
    $product->description = $_REQUEST['description'];
    $product->price = $_REQUEST['price'];

    if ($product->id > 0) {
      $product->update();
    } else {
      $product->create();
    }

    header('Location: index.php?controller=product&action=show&message=ok');
  }
}
