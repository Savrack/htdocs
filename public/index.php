<?php

//оголошення базових констант
define('DS', DIRECTORY_SEPARATOR);                    // втановлення константи DS = '/' чи '\' в залежності від Операційної Системи
define('ROOT', dirname(dirname(__FILE__)));           // втановлення константи ROOT = корневій папці
define('VIEWS_PATH', ROOT.DS.'core'.DS.'views');      // втановлення константи для доступу до папки views

require_once(ROOT.DS.'core'.DS.'lib'.DS.'init.php');  // підключення автозагрузок класів і конфігурацій(config.php)


// перевірка яким чином звернулися до сторінки
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $surname    = ltrim($_POST["reg_surname"]);
  $name       = ltrim($_POST["reg_name"]);
  $email      = ltrim($_POST["reg_email"]);
  $password   = ltrim($_POST["reg_pass"]);
  $phone      = ltrim($_POST["reg_phone"]);
  $address    = ltrim($_POST["reg_address"]);
  $ip = $_SERVER["REMOTE_ADDR"];


  $result = new Reg($email, $password, $surname, $name, $phone, $address, $ip);
}
else{
  App::run($_SERVER['REQUEST_URI']);
}

?>
