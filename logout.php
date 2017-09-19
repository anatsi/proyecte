<?php
  //incluimos el archivo encargado de las sesiones y creamos el objeto.
  include '\sesiones\sesiones.php';
  $sesion= new Sesion();

  //llamamos a la funcion que se encarga de destruir la sesion.
  $sesion->logOut();
  header('Location: index.php');
 ?>
