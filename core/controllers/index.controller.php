<?php

// контролер
class IndexController extends Controller{

  public function __construct($data = array()){
    parent::__construct($data);

    $this->model = new IndexModel();
  }

  // метод, який
  public function view_index(){
  }
}




?>
