<?php

// контролер
class ProfileController extends Controller{

  public function __construct($data = array()){
    parent::__construct($data);

    $this->model = new ProfileModel();
  }

  // метод, який
  public function view_profile(){
  }
}




?>
