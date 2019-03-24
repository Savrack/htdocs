<?php

// клас відповідає за парсинг запросів (синтаксичний аналіз запросів)
class Router{
  protected $uri;           // зберігається URL - запрос
  protected $language;      // зберігається мова
  protected $controller;    // зберігається назва контролеру, який опрацьомує сторінку
  protected $action;        // зберігається назва екшену
  protected $params;        // зберігається параметри (масив)

  // використовуємо get-запроси для отримання доступу до інформації змінної
  public function getUri(){
    return $this->uri;
  }
  public function getLanguage(){
    return $this->language;
  }
  public function getController(){
    return $this->controller;
  }
  public function getAction(){
    return $this->action;
  }
  public function getParams(){
    return $this->params;
  }



  // обробка інформації
  public function __construct($uri){
    $this->uri = urldecode(trim($uri, '/'));

    // отримуємо налаштування (за замовчуванням)
    $this->language   = Config::get('default_language');    // Мова за замовчуванням
    $this->controller = Config::get('default_controller');  // Контролер за замовчуванням
    $this->action     = Config::get('default_action');      // Екшен за замовчуванням

    $uri_path = explode('?', $this->uri);
    $path_parts = explode('/', $uri_path[0]);

    // розбір масиву $path_parts на елементи
    if(count($path_parts) >= 1){

      // language в першому елементі
      if(in_array(strtolower(current($path_parts)), Config::get('languages'))){
        $this->language = strtolower(current($path_parts));
        array_shift($path_parts);

        // отримуємо контролер - наступний елемент масиву
        if(in_array(strtolower(current($path_parts)), Config::get('controllers'))){
          $this->controller = strtolower(current($path_parts));
          array_shift($path_parts);

          // отримуємо екшен - наступний після контролера
          if(in_array(strtolower(current($path_parts)), Config::get('actions'))){
            $this->action = strtolower(current($path_parts));
            array_shift($path_parts);

            // все інше це параметри
            $this->params = $path_parts;
          }
        }
      }
    }
  }
}

?>
