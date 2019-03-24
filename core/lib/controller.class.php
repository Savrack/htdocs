<?php

// базовий контролер
class Controller{
  protected $data;    // зберігає всю інформацію, яка потрібна view(уявленню, 'представлению')
  protected $model;   // для доступу до об'єкту класа моделів
  protected $params;  // параметри отримані з URI

  // get-запросии для отримання доступу до змінних
  public function getData(){
    return $this->data;
  }
  public function getModel(){
    return $this->model;
  }
  public function getParams(){
    return $this->params;
  }

  public function __construct($date = array()){
    $this->data = $date;
    $this->params = App::getRouter()->getParams();  // отримуємо параметри з URI

  }

}

?>
