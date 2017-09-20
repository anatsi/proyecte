<?php
//incluimos el archiv de sesiones y creamos el objeto
  include '/sesiones/sesiones.php';
  $sesion=new Sesiones();

  //comprobamos si la sesion esta iniciada
  if (isset($_SESSION['usuario'])==false) {
    //si no esta iniciada, devuelve a el formulario de inicio.
    header('Location: index.php');
  }else {
    //si esta iniciada se muestra la pagina.
 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Bienvendo.</title>
   </head>
   <body>
     <?php
     //incluye el archivo de usuario y crea el objeto.
     include '/modelo/users.php';
     $usuario=new User();

     //llama a la funcion para devolver el nombre del usuario.
     $nombreuser=$usuario->nombreUsuario($_SESSION['usuario']);
     //saca el nombre del usuario por pantalla.
      echo "<h2> Bienvenido ".$nombreuser['nombre']."</h2>";
      ?>
   </body>
 </html>
<?php
}
 ?>
