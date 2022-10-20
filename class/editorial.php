<?php
/*Roberto Brown
8-893-2450*/
require_once('conexion.php');

class editorial extends ConexionBD{
  public function __construct(){
      parent::__construct();
  }


  public function listar_editoriales(){

    $instruccion="CALL sp_select_editorial()";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }
  public function insertar_Editorial($nombre,$telefono,$direccion,$ciudad,$provincia){

    $instruccion="CALL sp_insert_editorial('".$nombre."','".$telefono."','".$direccion."','".$ciudad."','".$provincia."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function actualizar_Editorial($selection,$id_editorial,$valor){

    $instruccion="CALL sp_update_editorial('".$selection."','".$id_editorial."','".$valor."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function eliminar_editorial($id_editorial){

    $instruccion="CALL sp_delete_editorial('".$id_editorial."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

}
