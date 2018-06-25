<?php
require_once('Clases/autoload.php');
 ?>
 <header>
   <h2><a href="#">Website Logo</a></h2>
   <nav>
     <?php

     $log=Autenticador::estaLogeado();
     if (empty($log)) {?>
     <li><a href="formulario.php">¡Registrate!</a></li>
     <li> | </li>
     <li><a href="login.php">Login</a></li>
   <?php }else{?>
     <li><a href="logout.php">Cerrar Sesion</a></li>
     <li> | </li>
     <li><a href="#">¡Bienvenido, <?php echo " " .Autenticador::nombreUsuario($_SESSION['id'],$conn) ."!";  ?></a></li>
   <?php };?>
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
