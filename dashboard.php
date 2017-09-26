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

<body>
  <?php
  //incluye el archivo de usuario y crea el objeto.
  include 'users.php';
  $usuario=new User();

  //llama a la funcion para devolver el nombre del usuario.
//  $nombreuser=$usuario->nombreUsuario($_SESSION['usuario']);
  //saca el nombre del usuario por pantalla.
  // echo "<h3 id='bienve'> Bienvenido ".$nombreuser['name']."!</h3><br><br>";

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
        echo "<li><a href='http://www.acceso.tsiberia.es/info/supervisores/Plan_Trabajo_Supervisores_2017.pdf' id='menu'>PLAN TRABAJO</a></li></ul>";
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
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
</body>
</html>
<?php } ?>
