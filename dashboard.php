<?php
//incluimos el archivo de sesiones y de usuarios y creamos los objetos
  require_once 'sesiones.php';
  require_once 'users.php';
  $sesion=new Sesiones();
  $usuario=new User();

  //comprobamos si la sesion esta iniciada
  if (isset($_SESSION['usuario'])==false) {
    //si no esta iniciada, devuelve a el formulario de inicio.
    header('Location: index.php');
  }else {
    //si esta iniciada se muestra la pagina.
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Bienvenido.</title>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" href="css/dashboard.css">
  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>

</head>
  <?php
     //menu
   //llama a la funcion para saber el menu que mostrar dependiendo de los permisos.
   $menu=$usuario->menuDash($_SESSION['usuario']);
   ?>
  <header class="header" role="banner">
  <h1 class="logo">
    <a href="#"><img src="logo.png" id="logo"></a>
  </h1>
  <div class="nav-wrap">
    <nav class="main-nav" role="navigation">
      <?php
      //dependiendo de los permisos saca el menu correspondiente.
      if ($menu['menu']==1) {
        echo "<ul class='unstyled list-hover-slide'><li><a href='' id='menu'>OPERATIVA</a></li></ul>";
      }elseif ($menu['menu']==2) {
        echo "<ul class='unstyled list-hover-slide'><li><a href='' id='menu'>OPERATIVA</a></li>";
        echo "<li><a href='prueba.pdf' id='menu'>PLAN TRABAJO</a></li></ul>";
      }else {
        //si el numero de permiso no es correcto, saca un aviso.
        ?>
        <script type="text/javascript">
          alert('Ups, algo salio mal. Hable con el responsable.');
        </script>
        <?php
      }
      ?>
    </nav>
  </div>
</header>

<body>
  <?php
  //llama a la funcion para devolver el nombre del usuario.
    $nombreuser=$usuario->nombreUsuario($_SESSION['usuario']);
  //saca el nombre del usuario por pantalla.
   echo "<div id='bienve'><h3> Bienvenido ".$nombreuser['name']."!</h3>";
   echo "<a href='logout.php'>Cerrar sesión</a></div>";
   ?>

</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</html>
<?php } ?>
