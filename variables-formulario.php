<?php

//VARIABLES
  $nombre = '';
  $fecha = '';
  $profesion= '';
  $email= '';
  $dia='';
  $mes='';
  $anio='';
  $pass='';
  $pass2='';
  $genero='';
  $pais= '';
  $provincia= '';
  $ciudad= '';
  $direccion= '';
  $altura = '';
  $piso= '';
  $dpto= '';
  $cp= '';
  $obsv= '';
  $errores=[];

//GRABAR DATOS POST
if ($_POST){
  $nombre = trim($_POST['nombre']);
  $profesion= trim($_POST['profesion']);
  $dia= trim($_POST['dia']);
  $mes= trim($_POST['mes']);
  $anio= trim($_POST['anio']);
  $email= trim($_POST['email']);
  $pass= trim($_POST['pass']);
  $pass2= trim($_POST['pass2']);
  if (isset($_POST ['genero'])) {$genero= $_POST['genero'];}
  $pais= $_POST['pais'];
  $provincia= $_POST['provincia'];
  $ciudad= $_POST['ciudad'];
  $direccion= trim($_POST['direccion']);
  $altura= trim($_POST['altura']);
  $piso= trim($_POST['piso']);
  $dpto= trim($_POST['dpto']);
  $cp= trim($_POST['cp']);
  $obsv= trim($_POST['obsv']);
  }

function crearID(){
    $cont = file_get_contents('datos.json');
    $usersJSON=explode(PHP_EOL, $cont);
    array_pop($usersJSON);
    $ultimo=array_pop($usersJSON);
    $users=json_decode($ultimo, true);
    if ($users){
      return ++$users['id'];
    }else{
      return 1;
    }
  }


function existeEmail($email){
    $todosPHP = traerTodos();
    foreach ($todosPHP as $usuario) {
        if ($email == $usuario['email']) {
            return $usuario;
        }
    }
    return false;
}

function passwordVacio() {
  if ($_POST ['pass'] == '' || $_POST ['pass2'] == '') {
    return true;
  }
  }

function passwordInvalido (){
  if ($_POST ['pass2'] !== $_POST ['pass']){
    return true;
  }
}

function validarDatos($data){

  if (trim($data['nombre']) == ''){
    $errores['nombre'] = "¡Decinos cómo te llamas!";}
  if (trim($data['profesion']) == ''){
    $errores['profesion'] = "¡Decinos de qué trabajas!";}

  if (trim($data['email']) == ''){
    $errores['email'] = "¡Decinos cuál es tu email!";}
    elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'Tu mail no tiene un formato válido';}
  if (existeEmail($data['email'])) {
    $errores['email'] = '¡El mail ya existe!';}

  if(passwordVacio() == true){
    $errores['pass'] = "¡Ingresa una contraseña valida!";}
  if(passwordInvalido() == true){
    $errores['pass2'] = "¡Las contraseñas no coinciden!";}
  if ($data['dia'] == 'Día' || $data['mes'] == 'Mes' || $data['anio'] == 'Año'){
    $errores['fecha'] = "¡Decinos cuándo es tu cumpleaños!";}
  if ($data['pais'] == 'Seleccione un pais'){
    $errores['pais'] = "¡Decinos de qué pais sos!";}
  if ($data['provincia'] == 'Seleccione una provincia'){
    $errores['provincia'] = "¡Decinos de qué provincia sos!";}
  if ($data['ciudad'] == 'Seleccione una Ciudad'){
    $errores['ciudad'] = "¡Decinos de qué Ciudad sos!";}
  if (trim($data['direccion'])== ''){
    $errores['direccion'] = "¿En que calle vivis?";}
    if (trim($data['altura']) == ''){
      $errores['altura'] = "¿A qué altura?";}

  if($_FILES['avatar'] ['name'] !== '') {
    $nombreImg = $_FILES['avatar']['name'];
    $extension=pathinfo($nombreImg, PATHINFO_EXTENSION);
      if($_FILES['avatar']['error'] !== UPLOAD_ERR_OK){
        $errores['avatar'] = "La imagen no se pudo cargar";
      } elseif (!($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png')){
        $errores['avatar'] = "La imagen no tiene un formato correcto";
      }
  }
  return $errores;
}

function grabarUsuario($data){
  if (validarDatos ($data) == false){
  $nombre = trim($data['nombre']);
  $profesion = trim($data['profesion']);
  $email = trim($data['email']);
  $fecha = $data['dia'] ."-" .$data['mes'] ."-" .$data['anio'];
  $pass2 = $data['pass2'];
  $pais = $data['pais'];
  $provincia = $data['provincia'];
  $ciudad = $data['ciudad'];
  $direccion = trim($data['direccion']) ." " . trim($data['altura']) ." Piso:" .trim($data['piso']) ." Depto:" .trim($data['dpto']) ." CP:" .trim($data['cp']);
  $obsv = trim($data['obsv']);
  $genero= $_POST['genero'];

  $datosUsuario = [];
  $datosUsuario ['nombre'] = $nombre;
  $datosUsuario ['email'] = $email;
  $datosUsuario ['pass2'] = password_hash($pass2, PASSWORD_DEFAULT);
  $datosUsuario ['fecha'] = $fecha;
  $datosUsuario ['genero'] = $genero;
  $datosUsuario ['profesion'] = $profesion;
  $datosUsuario ['pais'] = $pais;
  $datosUsuario ['provincia'] = $provincia;
  $datosUsuario ['ciudad'] = $ciudad;
  $datosUsuario ['direccion'] = $direccion;
  $datosUsuario ['obsv'] = $obsv;
  $datosUsuario ['id'] = crearID();
  $datosUsuario=json_encode($datosUsuario);

  file_put_contents ('datos.json',$datosUsuario .PHP_EOL,FILE_APPEND);
  }
    if($_FILES['avatar']['error'] === UPLOAD_ERR_OK){
      $nombreImg=$_FILES['avatar']['name'];
      $extension=pathinfo($nombreImg, PATHINFO_EXTENSION);
    if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png'){
      $imagen=$_FILES['avatar']['tmp_name'];
      $ubicacion=dirname(__FILE__);
      $ubicacion=$ubicacion . '/avatar/';
      move_uploaded_file($imagen, $ubicacion .$_POST['nombre'] .".".$extension);
    }}
    }

?>
