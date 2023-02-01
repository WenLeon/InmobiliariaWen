<?php 

class Conection{
    protected $servername="localhost";
    protected  $username="root";
    protected $password="";
    protected $bd= "inmobiliaria";
    
   function conection(){
     try{
         //Creamos un objeto PDO para que se conecte a la bd
         $conn = new PDO("mysql:host=$this->servername;dbname=$this->bd;charset=utf8", $this->username, $this->password);
         $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
         return $conn;
         
         //Capturamos error
     }catch(PDOException $e){
         echo "Conexión fallida".$e->getMessage();
     }
   }  
}