<?php

// клас який виконує реєстрацію
class Reg{
  protected $db;

  protected $email;
  protected $password;
  protected $surname;
  protected $name;
  protected $phone;
  protected $address;
  protected $ip;

  protected function checkData($email_check, $password_check, $surname_check, $name_check, $phone_check, $address_check, $ip_check){
    $email_count = 0;
    $password_count = 0;
    $surname_count = 0;
    $name_count = 0;
    $phone_count = 0;
    $address_count = 0;

    if(!empty($email_check)){
      $this->email    = preg_replace("/(*UCP)[^a-zA-Z0-9\._@]/u",  "", $email_check   , -1, $email_count);
    }
    if(!empty($password_check)){
      $this->password = preg_replace("/(*UCP)[^a-zA-Z0-9_]/u",     "", $password_check, -1, $password_count);
    }
    if(!empty($surname_check)){
      $this->surname = preg_replace("/(*UCP)[^А-Яа-яЁёЄєІіЇї]/u", "", $surname_check, -1, $surname_count);
    }
    if(!empty($name_check)){
      $this->name =   preg_replace("/(*UCP)[^А-Яа-яЁёЄєІіЇї]/u", "", $name_check, -1, $name_count);
    }
    if(!empty($phone_check)){
      $this->phone = preg_replace("/(*UCP)[^0-9+]/u",           "", $phone_check, -1, $phone_count);
    }
    if(!empty($address_check)){
      $this->address = preg_replace("/(*UCP)[^А-Яа-яЁёЄєІіЇї0-9\.\s]/u",          "", $address_check, -1, $address_count);
    }
    $this->ip = $ip_check;

    $count = $email_count + $password_count + $surname_count + $name_count + $phone_count + $address_count;

    if($count > 0){
      return false; // знайшло заборонені символи
    }
    else{
      return true;  // не знайшло заборонені символи
    }

  }
  protected function checkEmail(){
    $result = $this->db->DBQuery("SELECT email FROM `reg_user` where email  =  '$this->email'");
    if(empty($result)){
      return false; // немає в базі користувача з таким email
    }
    else{
      return $result[0]["email"];;  // є в базі користувач з таким email
    }
  }

  // методи, які виконують прохання користувача
  protected function passRecovery(){
    // відновлення паролю
    // від'єднання від БД
    $this->db->DBClose();
  }
  protected function authorization(){
    // авторизація
    // від'єднання від БД
    $this->db->DBClose();
  }
  protected function reg(){

    // перевірка E-mail чи є вже в Базі
    $check_email = $this->checkEmail();
    if(!($check_email)){
      $sql = "INSERT INTO reg_user (surname, name, email, password, phone, address, ip)
              VALUES(
                '".$this->surname."',
                '".$this->name."',
                '".$this->email."',
                '".$this->password."',
                '".$this->phone."',
                '".$this->address."',
                '".$this->ip."'
              )";
      $result = $this->db->DBQuery($sql);

      // перевірка результату запиту
      if($result == 0){
        // від'єднання від БД
        $this->db->DBClose();
        return "false";
      }
      else{
        // від'єднання від БД
        $this->db->DBClose();
        return "true";
      }
    }
    else{

      // від'єднання від БД
      $this->db->DBClose();
      return $check_email;
    }
  }

  // конструктор класу
  public function __construct($email_put, $password_put, $surname_put, $name_put, $phone_put, $address_put, $ip_put){

    if($this->checkData($email_put, $password_put, $surname_put, $name_put, $phone_put, $address_put, $ip_put)){

      // під'єднання до БД
      $this->db = new DB('localhost', 'admin', '201170', 'mvc');

      // які дані в нас є?
      if(!empty($this->email) && empty($this->password)){
        echo $this->passRecovery();
      }
      elseif(!empty($this->email) && !empty($this->password) && empty($this->name)){
        echo $this->authorization();
      }
      elseif(!empty($this->email)  &&  !empty($this->password)  &&  !empty($this->name) &&  !empty($this->phone)  &&  !empty($this->ip)){
        echo $this->reg();
      }
      else{
        // від'єднання від БД
        $this->db->DBClose();
        echo "false";
      }
    }
    else{
      echo "false";
    }
  }
}

?>
