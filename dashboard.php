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
      echo "<h3> Bienvenido ".$nombreuser['name']."</h3><br><br>";

      //menu
      //llama a la funcion para saber el menu que mostrar dependiendo de los permisos.
      $menu=$usuario->menuDash($_SESSION['usuario']);

      //dependiendo de los permisos saca el menu correspondiente.
      if ($menu['menu']==1) {
        echo "<a href=''>OPERATIVA</a>";
      }elseif ($menu['menu']==2) {
        echo "<a href=''>OPERATIVA</a>";
        echo "<a href=''>NOMINAS</a>";
      }elseif ($menu['menu']==3) {
        echo "<a href=''>OPERATIVA</a>";
        echo "<a href=''>NOMINAS</a>";
        echo "<a href=''>DIAS LIBRES</a>";
      }else {
        //si el numero de permiso no es correcto, saca un aviso.
        ?>
        <script type="text/javascript">
          alert('Ups, algo salio mal. Hable con el responsable.');
        </script>
        <?php
      }
      ?>
   </body>
 </html>
<?php
}
 ?>
