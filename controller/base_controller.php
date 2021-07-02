<?php
require_once "model/modelBase.php";

class BaseController
{
  private $model;
  public function __construct()
  {
    $this->model = new ModelBase();
  }
  public function index()
  {
    $context = ['title' => 'Base PHP'];
    require_once "view/index.php";
  }

}
