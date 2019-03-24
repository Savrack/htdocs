<?php

// контролер
class CartController extends Controller{

  public function __construct($data = array()){
    parent::__construct($data);

    $this->model = new CartModel();
  }

  // метод, який
  public function view_cart(){
  }
}




?>
