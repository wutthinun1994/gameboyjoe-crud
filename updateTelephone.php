<?php 
require_once "db/connect.php";
if(isset($_POST["submit"])){
    $tels_id= $_POST["tels_id"];
    $tel_id=$_POST["tel_id"];
    $division_id=$_POST["division_id"];
    $position=$_POST["position"];
    $rack=$_POST["rack"];
    $port=$_POST["port"];

    $result=$controller->update($division_id,$position,$rack,$port,$tel_id);
    if($result){
        header("Location:index.php");
    }
}


?>