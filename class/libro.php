<?php
/*Roberto Brown
8-893-2450*/
require_once('conexion.php');

class libro extends ConexionBD{
  public function __construct(){
      parent::__construct();
  }

  public function listar_libros(){

    $instruccion="CALL sp_select_libro()";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function listar_libros_nacionales(){

    $instruccion="CALL sp_select_libros_nacionales()";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function verificar_libro_año($año){

    $instruccion="CALL sp_verificar_libro_año('".$año."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function listar_libro_año($año){

    $instruccion="CALL sp_select_libro_año('".$año."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);

    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function listar_libro_estanteria(){

    $instruccion="CALL sp_select_libro_estanteria()";
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

  public function insertar_libro($titulo,$n_edicion,$copyright,$n_pag,$n_estanteria,$n_ejemplares,$precio,$id_editorial,$id_autor){

    $instruccion="CALL sp_insert_libro('".$titulo."','".$n_edicion."','".$copyright."','".$n_pag."','".$n_estanteria."','".$n_ejemplares."','".$precio."','".$id_editorial."','".$id_autor."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function actualizar_libro($selection,$isbn,$valor){

    $instruccion="CALL sp_update_libro('".$selection."','".$isbn."','".$valor."')";
    $consulta=$this->_db->query($instruccion);
    $resultado=$consulta->fetch_all(MYSQLI_ASSOC);
    if($resultado){
      return $resultado;
      $resultado->close();
      $this->_db->close();
    }
  }

  public function eliminar_libro($isbn){

    $instruccion="CALL sp_delete_libro('".$isbn."')";
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
