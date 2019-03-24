<?php

// контролер
class GoodsController extends Controller{

  public function __construct($data = array()){
    parent::__construct($data);

    $this->model = new GoodsModel();
  }

  // метод, який
  public function view_goods(){
  }
}




?>
