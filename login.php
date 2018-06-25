<?php
require_once('Clases/autoload.php');

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="estilo_login.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>

  </head>

  <?php require_once('header.php');  ?>

  <body>

  <form class="login" method="post">
    <fieldset>

      <h2>eCommerce</h2>


          <?php

          $email = '';
          $pass='';
          $errores = [];
          $usuario = new Usuario($email,$pass);
          if ($_POST) {
              $email = strtolower(trim($_POST['email']));
              $pass=$_POST['pass'];
              $errores = Validador::validarLoginUsuario($_POST, $conn);

              if (empty($errores)) {


                $usuario = $conn->existeEmail($email);

                Autenticador::loguearUsuario($usuario);

                 if (!Autenticador::estaLogeado() && isset($_COOKIE['id'])) {
                   Autenticador::loguearUsuario($_COOKIE['id']);
                }

                if (Autenticador::estaLogeado()) {
                  header('location:index.php');
                }else {
                  header('location:login.php');
                }

                if ($_POST['recordarme']) {
                  setCookie('id', $email, time() + 3600);
                }
              }

            } ?>

            <?php if($_POST) if(isset($errores['email'])) {echo $errores['email'];} ?>
           <input class="<?php if ((isset($errores['email']))) {echo 'errorInput';} else {echo 'email';}?>" type="text" name="email" value="<?= $email ?>" placeholder="Correo electrónico">

           <br>
           <div class="separador1"></div>


            <?php if($_POST) if(isset($errores['email'])) {echo $errores['email'];} ?>
           <input class="<?php if ((isset($errores['email']))) {echo 'errorInput';} else {echo 'pass';}?>" type="password" name="pass" placeholder="Password">


           <div class="separador"></div>

           <input type="submit" class="boton">

             <div class="preguntas">
             <p>
             <input type="checkbox" name="recordarme"> Recordarme </p>

             <div class="separador"></div>

             <a href="#">¿Olvidó su contraseña?</a>

             <br><br>

             <a href="formulario.php">¿No tienes una cuenta? <b>Regístrate</b></a>
           </div>


         </fieldset>
       </form>

       <?php require_once('footer.php') ?>
     </body>
   </html>
