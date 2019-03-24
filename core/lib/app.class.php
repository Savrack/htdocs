<?php

// працює з об'єктами Маршрутизатора
class App{
  protected static $router;
  protected static $db;

  // get-функції для отримання доступу до змінної
  public static function getRouter(){
    return self::$router;         // в любому місці програми ми можемо отримати  об'єкт (App::getRouter();)
  }

  public static function getDb(){
    return self::$db;
  }

  // оброблення запросів ($uri)
  public static function run($uri){
    self::$router = new Router($uri);
    self::$db     = new DB(Config::get('db.host'), Config::get('db.user'), Config::get('db.password'), Config::get('db.db_name'));

    Lang::load(self::$router->getLanguage());

    $controller_class = ucfirst(self::$router->getController()).'Controller';
    $controller_method = strtolower(self::$router->getAction());
    $controller_object = new $controller_class();

    if(method_exists($controller_object, $controller_method)){
          $view_path = $controller_object->$controller_method();
          $view_object = new View($controller_object->getData(), $view_path);
          $content = $view_object->render();

          $layout_path = VIEWS_PATH.DS.'default.php';                       // файл через який показують всю інфу
          $layout_view_object = new View(compact('content'), $layout_path); // створюємо контент для показу
          echo $layout_view_object->render();                               // генеруємо сторінку
    }
    else {
      echo "NOOOO";
    }





  }
}

?>
