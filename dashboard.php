<?php
//incluimos el archiv de sesiones y creamos el objeto
  include 'sesiones.php';
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
     <link rel="stylesheet" href="css/dashboard.css">
     <link rel="shortcut icon" href="favicon.ico">
   </head>
   <body>
     <header>
        <img src="logo.png" alt="Logo" id="logo">
        <a href="logout.php" id="signout">Cerrar sesión</a>
     </header>
     <?php
     //incluye el archivo de usuario y crea el objeto.
     include 'users.php';
     $usuario=new User();

     //llama a la funcion para devolver el nombre del usuario.
     $nombreuser=$usuario->nombreUsuario($_SESSION['usuario']);
     //saca el nombre del usuario por pantalla.
      echo "<h3 id='bienve'> Bienvenido ".$nombreuser['name']."!</h3><br><br>";

      //menu
      //llama a la funcion para saber el menu que mostrar dependiendo de los permisos.
      $menu=$usuario->menuDash($_SESSION['usuario']);

      //dependiendo de los permisos saca el menu correspondiente.
      if ($menu['menu']==1) {
        echo "<a href='' id='menu'>OPERATIVA</a>";
      }elseif ($menu['menu']==2) {
        echo "<a href='' id='menu'>OPERATIVA</a>";
        echo "<a href='' id='menu'>NOMINAS</a>";
      }elseif ($menu['menu']==3) {
        echo "<a href='' id='menu'>OPERATIVA</a>";
        echo "<a href='' id='menu'>NOMINAS</a>";
        echo "<a href='' id='menu'>DIAS LIBRES</a>";
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
