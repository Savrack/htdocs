<?php

// клас відповідає за багатомовність
class Lang{
  protected static $data;  // зберігає дані параметрів мови
  public static function load($lang_code){

    // шлях до файлу
    $lang_file_path = ROOT.DS.'core'.DS.'lang'.DS.strtolower($lang_code).'.php';

    // перевірка на існування
    if(file_exists($lang_file_path)){
      self::$data = include($lang_file_path);
    }
    else{
      echo "Lang file not found: $lang_file_path";
    }
  }

  // отримання рядка з файлу мовних параметрів
  public static function get($key, $default_value = ''){
    return isset(self::$data[strtolower($key)]) ? self::$data[strtolower($key)]:$default_value;
  }
}

?>
