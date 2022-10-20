<?php
/*Roberto Brown
8-893-2450*/
require_once('conexion.php');

class login extends ConexionBD{
  public function __construct(){
      parent::__construct();
  }

  public function verificar_Usuario($cedula,$pass){

    $instruccion="CALL sp_verificar_usuario('".$cedula."','".$pass."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }
}
?>
