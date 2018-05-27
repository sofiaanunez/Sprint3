<?php
require_once('funciones.php');
 ?>
 <header>
   <h2><a href="#">Website Logo</a></h2>
   <nav>
     <?php

     $log=estaLogeado();
     if (empty($log)) {?>
     <li><a href="formulario.php">¡Registrate!</a></li>
     <li> | </li>
     <li><a href="login.php">Login</a></li>
   <?php }else{?>
     <li><a href="logout.php">Cerrar Sesion</a></li>
     <li> | </li>
     <li><a href="#">¡Bienvenido, <?php echo " " .nombreUsuario($_SESSION['email']) ."!";  ?></a></li>
   <?php } ?>
   </nav>
 </header>


    <!-- <header>
      <h2><a href="#">Website Logo</a></h2>
      <nav>
        <li><a href="formulario.php">¡Registrate!</a></li>
        <li> | </li>
        <li><a href="login.php">Login</a></li>
      </nav>
    </header> -->
