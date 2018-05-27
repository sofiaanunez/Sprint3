<?php
session_start();
if($_POST){
  $email='';
  $email=trim($_POST['email']);
}

if (isset($_COOKIES['id'])) {
  $usuario = existeMail($_COOKIES['id']);
  loguearUsuario($usuario);
}

function traerTodos(){
  $usuariosJSON = file_get_contents('datos.json');
  $arrayJSON = explode(PHP_EOL, $usuariosJSON);
  array_pop($arrayJSON);
  $usuariosPHP = [];
  foreach ($arrayJSON as $usuarioJSON) {
    $usuariosPHP[] = json_decode($usuarioJSON, true);
  }
  return $usuariosPHP;
}
function validar($data){
  $email= trim($data['email']);
  $pass= trim($data['pass']);
  $pass2= trim($data['pass2']);

  $errores=[];

  if ($nombre == '') {
    $errores['nombre'] = 'Complete el campo de su nombre';
  }
  if ($email == '') {
    $errores['email'] = 'Complete el campo de su correo electrónico';
  }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $errores['email'] = 'Completá el campo de su cooreo electrónico con un formato valido';
  }
  if ($pass == '') {
    $errores['pass'] = 'Complete el campo de su contraseña';
  }
  if ($pass2 == '') {
    $errores['pass2'] = 'Complete el campo de su contraseña repetida';
  }
  return $errores;
}

function estaLogeado(){
  return isset($_SESSION['id']);
}

  function existeMail($mail){
    $usuarios = traerTodos();
    foreach ($usuarios as $usuario) {
      if ($mail == $usuario['email']) {
        return $usuario['email'];
      }
    }
    return false;
  }
  function validarLoginUsuario($data){
  $email = trim($data['email']);
  $pass = trim($data['pass']);
  $errores = [];
  if ($email == '' || $pass == '') {
        $errores['email'] = 'Por favor, complete los campos';
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Complete su email con un formato válido';
    }elseif (!existeMail($email)) {
      $errores['email'] = 'Credenciales invalidas';
    }
    return $errores;
  }

  function loguearUsuario($usuario){
    $_SESSION['id'] = $usuario['email'];
  }

  function nombreUsuario($mail){
    $usuarios = traerTodos();
    foreach ($usuarios as $usuario) {
      if ($mail == $usuario['email']) {
      return $usuario['nombre'];
      $nombreUser =$usuario['nombre'];
      }
    }
    return $nombreUser;
  }

  ?>
