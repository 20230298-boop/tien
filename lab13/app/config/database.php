<?php
class Database {
  public function connect(){
    return new PDO("mysql:host=localhost;dbname=lab13;charset=utf8","root","",
      [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]);
  }
}
