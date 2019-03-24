<?php

define('DS', DIRECTORY_SEPARATOR);          // втановлення константи DS = '/' чи '\' в залежності від Операційної Системи
define('ROOT', dirname(dirname(__FILE__))); // втановлення константи ROOT = корневій папці
define('VIEWS_PATH', ROOT.DS.'core'.DS.'views');      // втановлення константи для доступу до папки views

require_once(ROOT.DS.'core'.DS.'lib'.DS.'init.php');  // підключення автозагрузок класів і конфігурацій(config.php)
App::run($_SERVER['REQUEST_URI']);

?>
