<?php
//llamamos a la clase de db encarada de la conexion a la base de datos.
require_once 'db.php';
/**
 * Clase servicios encargada de las consultas hacia esta tabla de la db.
 */
class Servicio extends db
{
  //la clase consruct llama al construct de db, encargado a la conexion a la db.
  function __construct()
  {
    parent::__construct();
  }

    //funcion para insertar un nuevo servicio en la base de datos.
  function nuevoServicio($nombre, $recursos, $inicio, $cliente, $responsable, $tel, $correo, $csup, $crrhh, $caf){
    //realizamos la consuta y la guardamos en $sql
    $sql="INSERT INTO servicios(id, nombre, recursos, f_inicio, f_fin, id_cliente, responsable, telefono, correo, com_supervisor, com_rrhh, com_admin_fin)
     VALUES (NULL, '".$nombre."', ".$recursos.", '".$inicio."',' ', ".$cliente.", '".$responsable."', ".$tel.", '".$correo."', '".$csup."', '".$crrhh."', '".$caf."')";
    //Realizamos la consulta utilizando la funcion creada en db.php
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      return true;
    }else{
      return null;
    }
  }
}


 ?>
