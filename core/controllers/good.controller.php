<?php

// контролер
class GoodController extends Controller{

  public function __construct($data = array()){
    parent::__construct($data);

    $this->model = new GoodModel();
  }

  // метод, який
  public function view_good(){
  }
}




?>
