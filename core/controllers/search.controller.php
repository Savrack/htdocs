<?php

// контролер
class SearchController extends Controller{

  public function __construct($data = array()){
    parent::__construct($data);

    $this->model = new SearchModel();
  }

  // метод, який
  public function view_search(){
  }
}




?>
