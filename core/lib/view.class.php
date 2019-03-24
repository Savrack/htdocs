<?php

// клас уявлення, отримує дані віддає html-код
class View{
  protected $data;  // зберігає дані отримані від контролера
  protected $path;  // зберігає шляхи до теперішнього файлу уявлення

  // знаходимо шлях до файлу
  protected static function getDefaultViewPath(){
    $router = App::getRouter();
    if(!$router){
      return false;
    }

    // назва шаблону уявлення такеж як і методу контролера
    $controller_dir = $router->getController();
    $template_name = $router->getAction().'.php';

    return VIEWS_PATH.DS.$controller_dir.DS.$template_name;
  }

  public function render(){
    $data = $this->data;        // доступна в самому шаблоні

    ob_start();                 // включаємо буферизацію
    include($this->path);       // підключаємо шаблон
    $content = ob_get_clean();
    return $content;
  }

  public function __construct($data = array(), $path = null){

    // якщо шлях не вказаний ми самі його знаходимо
    if(!$path){
      $path = self::getDefaultViewPath();
    }

    // якщо файл не знайдений
    if(!file_exists($path)){
      echo "Файл не знайдений: $path";
    }

    $this->path = $path;
    $this->data = $data;
  }


}

?>
