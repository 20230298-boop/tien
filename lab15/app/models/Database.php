<?php
class Database {
    public static function connect() {
        return new PDO("mysql:host=localhost;dbname=lab15;charset=utf8","root","");
    }
}
