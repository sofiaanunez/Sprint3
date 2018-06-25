<?php
$dsn="mysql:host=localhost;dbname=ecommerce;charset=utf8mb4;port:3306";
$user="root";
$pass="";

try {
	$db=new PDO ($dsn,$user,$pass);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch (Exception $e){
	echo "Hubo un error";
	exit;
}

echo "Exito";
$nombre = '';
$apellido = '';
$fecha = '';
$profesion= '';
$email= '';
$fecha='';
$pass='';
$pass2='';
$genero='';
$pais= '';
$provincia= '';
$ciudad= '';
$terminos = '';

//GRABAR DATOS POST
if ($_POST){
$nombre = trim($_POST['nombre']);
$apellido = trim($_POST['apellido']);
$profesion= trim($_POST['profesion']);
$fecha= $_POST['fecha'];
$email= strtolower(trim($_POST['email']));
$pass= trim($_POST['pass']);
$pass2= trim($_POST['pass2']);
if (isset($_POST ['genero'])) {$genero= $_POST['genero'];}
$pais= $_POST['pais'];
$provincia= $_POST['provincia'];
$ciudad= $_POST['ciudad'];
$terminos=$_POST['terminos'];
}
	function existeEmail($email){

		$sql="select email from usuarios where email = '".$email ."'";
		$stmt = $db->prepare($sql);
		$stmt->execute();
		$emailsArray= $stmt->fetch();

		if($emailsArray){
			return true;
		}
	}

function traerTodos($db){

	$sql="select * from usuarios";
	$stmt= $db->prepare($sql);
	$stmt->execute();
	$todosLosUsuariosArray=$stmt->fetchAll();

	return $todosLosUsuariosArray;
}


// if ($_POST){
// $nombre = trim($_POST['nombre']);
// $apellido = trim($_POST['apellido']);
// $profesion = trim($_POST['profesion']);
// $email = trim($_POST['email']);
// $fecha = $_POST['fecha'];
// $pass2 = password_hash($_POST['pass2'], PASSWORD_DEFAULT);
// $pais = $_POST['pais'];
// $provincia = $_POST['provincia'];
// $ciudad = $_POST['ciudad'];
// $genero= $_POST['genero'];
//
// $sql="insert into usuarios values(default, '" .$email ."', '" .$pass2
// ."', now(), '" .$nombre ."', '"  .$apellido ."', '" .$fecha ."', '" .$profesion
// ."', '" .$genero ."', '" .$pais ."', '" .$provincia ."', '" .$ciudad ."')";
//
// $grabar = $db->prepare($sql);
// $grabar->execute();
// }

function validarDatos($datos){
		if (!$_POST['terminos']) {
			$errores['terminos'] = "¡Debes aceptar los Términos y Condiciones!";}

		if (!$datos['fecha']){
			$errores['fecha'] = "¡Decinos cuándo es tu cumpleaños!";}

		if ($datos['pais'] == 'Seleccione un pais'){
			$errores['pais'] = "¡Decinos de qué pais sos!";}

		if ($datos['provincia'] == 'Seleccione una provincia'){
			$errores['provincia'] = "¡Decinos de qué provincia sos!";}

		if ($datos['ciudad'] == 'Seleccione una Ciudad'){
			$errores['ciudad'] = "¡Decinos de qué Ciudad sos!";}

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
if($_POST){
	$errores=validarDatos($_POST);
	if($errores){
		echo "ERROR";
	} else {
		echo "Todo OK";
	}
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="todo" method="post" enctype="multipart/form-data">

    <fieldset class="fondo">

      <h1 class="titulo">Datos personales</h1>
      <hr>
      <br>
      <input class="<?php if ((isset($errores['nombre']))) {echo 'errorInput';} else {echo 'campo';}?>" type="text" name="nombre"  placeholder="Nombre y Apellido" value="<?php echo $nombre;?>"><label class="requerido">*</label>
      <?php if($_POST) if(isset($errores['nombre'])) {echo $errores['nombre'];} ?>
      <br>
      <br>
			<input class="<?php if ((isset($errores['apellido']))) {echo 'errorInput';} else {echo 'campo';}?>" type="text" name="apellido"  placeholder="Apellido(s)" value="<?php echo $apellido;?>"><label class="requerido">*</label>
      <?php if($_POST) if(isset($errores['apellido'])) {echo $errores['apellido'];} ?>
			<br><br>

      <label>Fecha de Nacimiento</label>

      <br>
      <input type="date" class="<?php if ($_POST){if(isset($errores['fecha'])){echo 'errorDate';}}else{echo 'date';}?>" name='fecha' value="<?php echo $fecha; ?>">
      <?php if($_POST) if(isset($errores['fecha'])) {echo $errores['fecha'];} ?>
      </select>
        <br>
        <br>

          <input class="<?php if ((isset($errores['email']))) {echo 'errorInput';} else {echo 'campo';}?>" type="text" name="email" placeholder="Usuario@email.com" value = "<?php echo $email;?>"><label class="requerido">*</label>
            <?php if($_POST) if((isset($errores['email']))) {echo $errores['email'];} ?>
            <br>
            <br>

          <input class="<?php if (isset($errores['profesion']))  {echo 'errorInput';} else {echo 'campo';}?>" type="text" name="profesion" placeholder="Profesión" value = "<?php echo $profesion;?>"><label class="requerido">*</label>
            <?php if($_POST) if(isset($errores['profesion'])) {echo $errores['profesion'];} ?>
            <br>
            <br>

          <input class="<?php if (isset($errores['pass']) || (isset($errores['pass2']))) {echo 'errorInput';} else {echo 'campo';}?>" type="password"  name="pass" placeholder="Password"><label class="requerido">*</label>
            <?php if($_POST) if(isset($errores['pass'])) {echo $errores['pass'];} ?>
            <br>
            <br>

          <input class="<?php if (isset($errores['pass']) || (isset($errores['pass2']))) {echo 'errorInput';} else {echo 'campo';}?>" type="password"  name="pass2" placeholder="Repetir password" ><label class="requerido">*</label>
            <?php if($_POST){ if(isset($errores['pass2'])) {echo $errores['pass2'];}} ?>
            <br>
            <br>
        <label>Género</label>
        <br>
          <input type="radio" name="genero" value="Masculino" <?php if ($genero =="Masculino") {echo 'checked';}?> ><label class="radio">Masculino</label>
          <input type="radio" name="genero" value="Femenino" <?php if ($genero =="Femenino") {echo 'checked';}?>><label class="radio">Femenino</label>
          <input type="radio" name="genero" value="Otro" <?php if ($genero =="Otro") {echo 'checked';}?>><label class="radio">Otro</label>
          <br>
          <br>
          <select class="<?php if ((isset($errores['pais']))) {echo 'errorLocalidad';} else {echo 'localidad';}?>" name="pais" value ="<?php echo $pais;?>">
            <option><?php if ($pais == '') {echo "Seleccione un pais";} else {echo $pais;}?></option>
            <option>Argentina</option>
            <option>Brasil</option>
            <option>Chile</option>
            <option>Colombia</option>
            <option>Paraguay</option>
            <option>Uruguay</option>

          </select><label class="requerido">*</label>
          <?php if (isset($errores['pais'])) { echo $errores ['pais'];} ?>
          <br>
          <br>


          <select class="<?php if ((isset($errores['provincia']))) {echo 'errorLocalidad';} else {echo 'localidad';}?>" name="provincia" value ="<?php echo $provincia;?>">
            <option><?php if ($provincia == '') {echo "Seleccione una provincia";} else {echo $provincia;}?></option>
            <option>Buenos Aires</option>
            <option>Santa Fe</option>
            <option>Catamarca</option>
            <option>Corrientes</option>
            <option>Entre Rios</option>
            <option>Santiago del Estero</option>
            <option>Santa Cruz</option>
          </select><label class="requerido">*</label>
          <?php if (isset($errores['provincia'])) { echo $errores ['provincia'];} ?>
          <br>
          <br>

          <select class="<?php if ((isset($errores['ciudad']))) {echo 'errorLocalidad';} else {echo 'localidad';}?>" name="ciudad" value="<?php echo $ciudad;?>">
            <option><?php if ($ciudad == '') {echo "Seleccione una Ciudad";} else {echo $ciudad;}?></option>
            <option>Capital Federal</option>
            <option>Gran Buenos Aires</option>
            <option>Moron</option>
            <option>Haedo</option>
            <option>Gregorio de Laferrere</option>
            <option>San Justo</option>
            <option>Ciudad Evita</option>
          </select><label class="requerido">*</label>
          <?php if (isset($errores['ciudad'])) { echo $errores ['ciudad'];} ?>

        <br>
        <br>

          <p>Avatar (opcional)</p>
          <input type="file" name="avatar">
          <input type="hidden" name="max_file_size" value="30000">
          <?php if (isset($errores['avatar'])) { echo "<br><br> <p class='errorAvatar'>" .$errores ['avatar'] ."<p>";} ?>
          <br><br>
      <input id="check" type="checkbox"  name="terminos"><a href="#"><label class="tyc">Acepto Terminos y Condiciones</label></a>
<label class="requerido">* Campo requerido</label>
	<?php if (isset($errores['terminos'])) { echo $errores ['terminos'];} ?>

      </fieldset>


    <br>
    <br>
    <div class="botones">
      <button class="boton" type="submit" name="enviar">Enviar</button>
      <button class="boton" type="reset" name="" value="">Borrar</button>

    </div>

</form>
  </body>
</html>
