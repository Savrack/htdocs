<?php

// Базовий клас конфігурацій. Зберігає налаштування і змінює їх
class Config{
  protected static $settings = array(); // асоциативний масив налаштувань

  // функція вертає налаштування
  public static function get($key){
    return isset(self::$settings[$key]) ? self::$settings[$key] : null;
  }

  // функція встановлює налаштування
  public static function set($key, $value){
    self::$settings[$key] = $value;
  }

}

?>
