<?php
//incluimos todas las clases necesarias e iniciamos sus objetos.
require_once '../sesiones.php';
require_once '../users.php';
require_once '../cliente.php';
require_once 'servicio.php';

$usuario=new User();
$sesion=new Sesiones();
$cliente=new Cliente();
$servicio=new Servicio();

if (isset($_SESSION['usuario'])==false) {
  header('Location: ../index.php');
}else {
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Nuevo servicio</title>
    <!--<link rel="stylesheet" href="../css/menu.css">-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <!--<link rel="stylesheet" href="../css/formulario2.css">-->
    <link rel="stylesheet" href="../css/formulario.css">
    <link rel="shortcut icon" href="../imagenes/favicon.ico">
		<link rel="stylesheet" type="text/css" href="../css/dashboard.css" />
</head>
<body>
  <head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
</head>

<div class="codrops-top clearfix">
  <?php
    //llamamos a la función para devolver el nombre de usuario.
    $nombreuser=$usuario->nombreUsuario($_SESSION['usuario']);
    //sacamos el nombre de usuario por su id
    echo "<a><strong>Bienvenido ".$nombreuser['name']."</strong></a>";
   ?>
  <span class="right"><a href="../logout.php">Cerrar Sesion</a></span>
</div><!--/ Codrops top bar -->

<div class="site-container">
  <div class="site-pusher">

    <header class="header">

      <a href="#" class="header__icon" id="header__icon"></a>
      <a href="../dashboard.php" class="header__logo"><img src="../imagenes/logo.png" alt=""></a>

      <nav class="menu">
        <a href="index.php">Inicio</a>
        <a href="consultarServicio.php">Consultar</a>
      </nav>

    </header>

    <div class="site-content">
      <div class="container">
        <!-- Contenido de la pagina. -->
        <form>
          <div class="formthird">
              <p><label><i class="fa fa-question-circle"></i>Nombre servicio</label><input type="text" /></p>
              <p><label><i class="fa fa-question-circle"></i>Modelos</label><input type="text" /></p>
              <p><label><i class="fa fa-question-circle"></i>Fecha inicio</label><input type="date" /></p>
              <p><label><i class="fa fa-question-circle"></i>Cliente</label>
                <select>
                  <option>----Cliente---</option>

                </select></p>
              <p><label><i class="fa fa-question-circle"></i>Responsable</label><input type="text" /></p>
              <p><label><i class="fa fa-question-circle"></i>Telefono responsable</label><input type="text" /></p>
              <p><label><i class="fa fa-question-circle"></i>Correo responsable</label><input type="text" /></p>
          </div>
          <div class="formthird">
              <p><label><i class="fa fa-question-circle"></i>Personal total</label><input type="number" min='0'/></p>
              <p><label><i class="fa fa-question-circle"></i>Turno mañana</label><input type="number" min='0'/></p>
              <p><label><i class="fa fa-question-circle"></i>Turno tarde</label><input type="number" min='0'/></p>
              <p><label><i class="fa fa-question-circle"></i>Turno noche</label><input type="number" min='0'/></p>
              <p><label><i class="fa fa-question-circle"></i>Turno central</label><input type="number" min='0'/></p>

              <p><label><i class="fa fa-question-circle"></i>Otros turnos</label><input class="threeinputs" type="time"/><input class="threeinputs2" type="time"/><input class="threeinputs1" type="number" min='0'/></p>
              <p><label><i class="fa fa-question-circle"></i>Otros turnos</label><input class="threeinputs" type="time"/><input class="threeinputs2" type="time"/><input class="threeinputs1" type="number" min='0'/></p>
              <p><label><i class="fa fa-question-circle"></i>Otros turnos</label><input class="threeinputs" type="time"/><input class="threeinputs2" type="time"/><input class="threeinputs1" type="number" min='0'/></p>
              <p><label><i class="fa fa-question-circle"></i>Otros turnos</label><input class="threeinputs" type="time"/><input class="threeinputs2" type="time"/><input class="threeinputs1" type="number" min='0'/></p>
              <p><label><i class="fa fa-question-circle"></i>Otros turnos</label><input class="threeinputs" type="time"/><input class="threeinputs2" type="time"/><input class="threeinputs1" type="number" min='0'/></p>
          </div>
          <div class="formthird">
              <p><label><i class="fa fa-question-circle"></i>Comentario supervisor</label><textarea></textarea></p>
              <p><label><i class="fa fa-question-circle"></i>Comentario RRHH</label><textarea></textarea></p>
              <p><label><i class="fa fa-question-circle"></i>Comentario Admin. Financiero</label><textarea></textarea></p>
          </div>
          <div class="submitbuttons">
              <input class="submitone" type="submit" />
          </div>
        </form>

      </div> <!-- END container -->
    </div> <!-- END site-content -->
  </div> <!-- END site-pusher -->
</div> <!-- END site-container -->

<!-- Scripts para que el menu en versión movil funcione -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script  src="../js/menu.js"></script>

</body>
</html>
<?php
//comprbamos que realmente haya rellenado algunos campos
  if (isset($_POST['nombre'])) {
    //si los ha rellenado, llamamos a la función de insertar el servicio y le pasamos los datos.
    $nuevoServicio=$servicio->nuevoServicio($_POST['nombre'], $_POST['recursos'], $_POST['inicio'], $_POST['cliente'], $_POST['responsable'], $_POST['tel'], $_POST['email'], $_POST['supervisor'], $_POST['rrhh'], $_POST['adminfin']);
    //comprobamos que se haya registrado.
    if ($nuevoServicio==null) {
      //si no se ha registrado le saca un mensaje avisandole
      ?>
        <script type="text/javascript">
          alert("Error al registrar el servicio.");
        </script>
      <?php
    }else {
      //si se ha regstrado le saca un mensaje diciendolo
      ?>
        <script type="text/javascript">
          alert("Nuevo servicio registrado.");
        </script>
      <?php
    }
  }
 ?>
 <?php } ?>
