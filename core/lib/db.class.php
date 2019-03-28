<?php
class DB{
  protected $connection;

  public function DBQuery($sql){

    // перевірка чи є з'єднання з Бд
    if(!$this->connection){
      return false;
    }

    // запит до БД
    $result = $this->connection->query($sql);

    // перевірка чи запит вдався
    if(mysqli_error($this->connection)){
      throw new Exception(mysqli_error($this->connection));
    }

    // вертаємо значення $result якщо воно true або false
    if(is_bool($result)){
      return $result;
    }

    // вертаємо значення $result якщо воно не є true або false
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
      $data[] = $row;
    }
    return $data;
  }
  public function DBClose(){
    $this->connection->close();
  }

  // створюємо конструктор класу
  public function __construct($host, $user, $password, $db_name){
    $this->connection = new mysqli($host, $user, $password, $db_name);

    if(mysqli_connect_error()){
      throw new Exception('could not connect to DB');
    }

    // задаємо кодировку БД
    $this->connection->set_charset("utf8");
  }
}
?>
