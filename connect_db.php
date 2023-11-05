<?php
//ไฟล์ที่ใช้ในการติดต่อกับdatabase
class ConnectDB{
   private $host ="localhost";
   private $username ="root";
   private $password ="";
   private $dbname ="smart_water_meter";

   private $connDB;
     //method connection database
     public function  getConnectionDB(){
        try{
            $this->connDB=new PDO(
            "mysql:host=".$this->host.";dbname=".$this->dbname,$this->username,$this->password);
            $this->connDB->exec("set name utf8");
        }catch(PDOException $ex){
        }
        return $this->connDB;
     }  
  

}


?>