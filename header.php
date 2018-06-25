<?php
require_once('Clases/autoload.php');
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>

  <header class="main.header">

    <nav class="menu">
    <?php
      $log=Autenticador::estaLogeado();
      if (empty($log)) {?>
      <li><a href="index.php">Home</a></li>
      <li> | </li>
      <li><a href="login.php">Login</a></li>
      <li> | </li>
      <li><a href="formulario.php">Registrate</a></li>
    <?php }else{?>
      <li><a href="#">¡Bienvenido, <?php echo " " .nombreUsuario($_SESSION['email']) ."!";  ?></a></li>
      <li> | </li>
      <li><a href="index.php">Home</a></li>
      <li> | </li>
      <li><a href="logout.php">Cerrar Sesion</a></li>


    <?php } ?>
    </nav>

  </header>
  <body>

  </body>
</html>
