<?php
// підключення файлу налаштувань
require_once(ROOT.DS.'core'.DS.'config'.DS.'config.php');

// функція автозагрузки класів
function __autoload($class_name){

  $lib_path = ROOT.DS.'core'.DS.'lib'.DS.strtolower($class_name).'.class.php';
  $controller_path = ROOT.DS.'core'.DS.'controllers'.DS.str_replace('controller', '', strtolower($class_name)).'.controller.php';
  $model_path = ROOT.DS.'core'.DS.'models'.DS.str_replace('model', '', strtolower($class_name)).'.model.php';

  // перевірка чи такий клас існує
  if(file_exists($lib_path)){
    require_once($lib_path);
  }
  elseif(file_exists($controller_path)){
    require_once($controller_path);
  }
  elseif(file_exists($model_path)){
    require_once($model_path);
  }
  else{
    throw new Exception('Failed to include class: '.$model_path);
  }

}

function __($key, $default_value = ''){
  return Lang::get($key, $default_value);
}
?>
