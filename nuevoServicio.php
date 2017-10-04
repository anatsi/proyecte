<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Nuevo servicio</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/dashboard.css" />
</head>
<body>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet'>
</head>

<div class="codrops-top clearfix">
  <?php
  include 'sesiones.php';
  include 'users.php';
  $usuario= new User();
  $sesion= new Sesiones();
    //llamamos a la función para devolver el nombre de usuario.
    $nombreuser=$usuario->nombreUsuario($_SESSION['usuario']);
    //sacamos el nombre de usuario por su id
    echo "<a><strong>Bienvenido ".$nombreuser['name']."</strong></a>";
   ?>
  <span class="right"><a href="logout.php">Cerrar Sesion</a></span>
</div><!--/ Codrops top bar -->

<div class="site-container">
  <div class="site-pusher">

    <header class="header">

      <a href="#" class="header__icon" id="header__icon"></a>
      <a href="#" class="header__logo"><img src="logo.png" alt=""></a>

      <nav class="menu">
        <a href="#">Consultar</a>
        <a href="#">Nuevo Servicio</a>
      </nav>

    </header>

    <div class="site-content">
      <div class="container">
        <!-- Contenido de la pagina. -->
        <h1>Crear un nuevo servicio</h1>
        <form class="cf">
          <div class="half left cf">
            <input type="text" name="nombre" id="input-name" placeholder="Nombre servicio">
            <input type="number" name="recursos" id="input-recursos" placeholder="Recursos" min="0">
            <input type="date" name="inicio" id="input-inicio" placeholder="Fecha inicio">
            <select class="" name="cliente">
              <option value="" selected style="color:gray">Cliente</option>
              <option value="">FORD</option>
            </select>
            <input type="text" name="responsable" id="input-responsable" placeholder="Responsable">
            <input type="tel" name="tel" id="input-tel" placeholder="Telefono responsable">
            <input type="email" name="email" id="input-email" placeholder="Correo resposabe">
          </div>
          <div class="half right cf">
            <textarea name="supervisor" type="text" id="input-message" placeholder="Comentario para el supervisor"></textarea>
            <textarea name="rrhh" type="text" id="input-message" placeholder="Comentario para RRHH"></textarea>
            <textarea name="adminfin" type="text" id="input-message" placeholder="Comentario para el Admin. financiero"></textarea>
          </div>
          <input type="submit" value="Crear" id="input-submit">
        </form>

      </div> <!-- END container -->
    </div> <!-- END site-content -->
  </div> <!-- END site-pusher -->
</div> <!-- END site-container -->

<!-- Scripts para que el menu en versión movil funcione -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script  src="js/menu.js"></script>

</body>
</html>
