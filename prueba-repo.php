<?php
class Repositorio {

  private $db;
  private $dsn;
  private $user;
  private $pass;

  public function __construct(){
    //conexion al db
    $this->dsn="mysql:host=localhost;dbname=ecommerce;charset=utf8mb4;port:3306";
    $this->user="root";
    $this->pass="";

    try {
      $db=new PDO ($this->dsn,$this->user,$this->pass);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    catch (Exception $e){
      echo "Hubo un error";
      exit;
    }
  }

  public function existeEmail($email){

      $sql="select email from usuarios where email = '".$email ."'";
      $base= $this->db;
      $stmt=$base->prepare($sql);
      $stmt->execute();
      $emailsArray= $stmt->fetchAll();

      foreach ($emailsArray as $email) {
        $existe = $email['email'];
      }
      if($existe){
        return true;
      }
    }
  }

 ?>
