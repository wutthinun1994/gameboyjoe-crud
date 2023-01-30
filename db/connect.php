<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "telephoneDB";
$dsn="mysql:host=$host;dbname=$db;charset=utf8"; //ตำแหน่งฐานข้อมูลของเราที่อ้างอิง

try{
    $pdo = new PDO($dsn,$username,$password); //ทดลองเชื่อมต่อไปยังdb

}catch(PDOException $e){
    echo $e->getMessage();

}

require_once "db/controller.php";
require_once "db/user.php";
$controller = new Controller($pdo);
$user = new User($pdo);

$user->insertUser("admin","12345");
?>