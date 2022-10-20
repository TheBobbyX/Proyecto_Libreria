<?php
/*Roberto Brown
8-893-2450*/
require_once('conexion.php');

class autor extends ConexionBD{
  public function __construct(){
      parent::__construct();
  }

  public function listar_autores(){

    $instruccion="CALL sp_select_autor()";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function verificar_autor($id_autor){

    $instruccion="CALL sp_verificar_autor('".$id_autor."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function listar_libros_autor($id_autor){

    $instruccion="CALL sp_select_libros_por_autor('".$id_autor."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function listar_autores_nacionalidad(){

    $instruccion="CALL sp_select_autor_nacionalidad()";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function insertar_autor($nombre,$apellido,$nacionalidad){

    $instruccion="CALL sp_insert_autor('".$nombre."','".$apellido."','".$nacionalidad."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function actualizar_autor($selection,$id_autor,$valor){

    $instruccion="CALL sp_update_autor('".$selection."','".$id_autor."','".$valor."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function eliminar_autor($id_autor){

    $instruccion="CALL sp_delete_autor('".$id_autor."')";
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
