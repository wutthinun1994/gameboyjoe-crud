<?php

class Controller{
        private $db;
        
        function __construct($con){
            $this->db=$con;
        }

        function getDivisions(){
            try{
                $sql = "SELECT * FROM divisions";
                $result=$this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function getTelephones(){
            try{
                $sql = "SELECT * FROM telephones a INNER JOIN divisions b ON a.division_id = b.division_id ORDER BY a.tel_id";
                $result=$this->db->query($sql);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function insert($tel_id,$division_id,$position,$rack,$port){
            try{
                $sql="INSERT INTO
                telephones(tel_id,division_id,position,rack,port)
                VALUE (:tel_id,:division_id,:position,:rack,:port)
                ";
                $stmt=$this->db->prepare($sql);
                $stmt->bindParam(":tel_id",$tel_id);
                $stmt->bindParam(":division_id",$division_id);
                $stmt->bindParam(":position",$position);
                $stmt->bindParam(":rack",$rack);
                $stmt->bindParam(":port",$port);
                $stmt->execute();
                return true;

            }catch(PDOException $e){
                return false;
            }
        }

        function delete($id){
            try{
                $sql="DELETE FROM telephones WHERE tel_id=:id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindParam(":id",$id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function getTelephoneDetail($id){
            try{
                $sql="SELECT * FROM telephones a INNER JOIN divisions b 
                ON a.division_id = b.division_id
                WHERE tel_id = :id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindParam(":id",$id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        
        }
        function update($division_id,$position,$rack,$port,$tel_id){
            try{
                $sql="UPDATE telephones
                SET division_id=:division_id , position=:position 
                , rack=:rack , port=:port 
                WHERE tel_id = :tel_id";
                $stmt=$this->db->prepare($sql);
                $stmt->bindParam(":division_id",$division_id);
                $stmt->bindParam(":position",$position);
                $stmt->bindParam(":rack",$rack);
                $stmt->bindParam(":port",$port);
                $stmt->bindParam(":tel_id",$tel_id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }
            
        }
?>