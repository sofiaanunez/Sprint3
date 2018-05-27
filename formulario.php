<?php
require_once('variables-formulario.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Formulario</title>
      <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link rel="stylesheet" href="style_form.css">
  </head>
  <?php require_once('header.php'); ?>
  <body>
    <div class="cubo"><h3>
      <strong>¡Registrate!</strong>
    </h3>
    <br>


    <form class="todo" method="post" enctype="multipart/form-data">

    <fieldset class="fondo">

      <!-- AVISOS 1 -->
      <?php
      if($_POST){
        $errores = validarDatos($_POST);

        if(empty($errores)) {
          grabarUsuario($_POST);
          header('location:registro-ok.php');
          exit;
        }
      }
       ?>

      <h1 class="titulo">Datos personales</h1>
      <hr>
      <br>
      <input class="<?php if ((isset($errores['nombre']))) {echo 'errorInput';} else {echo 'nombre';}?>" type="text" name="nombre"  placeholder="Nombre y Apellido" value="<?php echo $nombre;?>"><label class="requerido">*</label>
      <?php if($_POST) if(isset($errores['nombre'])) {echo $errores['nombre'];} ?>
      <br>
      <br>
      <label>Fecha de Nacimiento</label>

      <br>
        <select class="<?php if ($_POST['dia'] == 'Día') {echo 'errorFecha';} else {echo 'fecha';}?>" name="dia" value="<?php echo $dia;?>">
          <option><?php if ($dia == '') {echo "Día";} else {echo $dia;}?></option>
          <?php for ($i=1; $i < 32; $i++) {?>
            <option><?php echo $i;}?></option>
        </select>

      <select class="<?php if ($_POST['mes'] == 'Mes') {echo 'errorFecha';} else {echo 'fecha';}?>" name="mes" value="<?php echo $mes;?>">
        <option><?php if ($mes == '') {echo "Mes";} else {echo $mes;}?></option>
        <?php for ($i=1; $i < 13; $i++) {?>
          <option><?php echo $i;}?></option>
      </select>

      <select class="<?php if ($_POST['anio'] == 'Año') {echo 'errorFecha';} else {echo 'fecha';}?>" name="anio" value = "<?php echo $anio;?>">
        <option><?php if ($anio == '') {echo "Año";} else {echo $anio;}?></option>
        <?php for ($i=1900; $i < 2019; $i++) {?>
          <option><?php echo $i;}?></option>
      </select>
      <?php if($_POST) if(isset($errores['fecha'])) {echo $errores['fecha'];} ?>
        <br>
        <br>

          <input class="<?php if ((isset($errores['email']))) {echo 'errorInput';} else {echo 'email';}?>" type="text" name="email" placeholder="Usuario@email.com" value = "<?php echo $email;?>"><label class="requerido">*</label>
            <?php if($_POST) if((isset($errores['email']))) {echo $errores['email'];} ?>
            <br>
            <br>

          <input class="<?php if ($errores['profesion'] != '') {echo 'errorInput';} else {echo 'profesion';}?>" type="text" name="profesion" placeholder="Profesión" value = "<?php echo $profesion;?>"><label class="requerido">*</label>
            <?php if($_POST) if(isset($errores['profesion'])) {echo $errores['profesion'];} ?>
            <br>
            <br>

          <input class="<?php if ($errores['pass'] != '' || $errores['pass2'] != '') {echo 'errorInput';} else {echo 'contraseña';}?>" type="password"  name="pass" placeholder="Password"><label class="requerido">*</label>
            <?php if($_POST) if(isset($errores['pass'])) {echo $errores['pass'];} ?>
            <br>
            <br>

          <input class="<?php if ($errores['pass'] != '' || $errores['pass2'] != '') {echo 'errorInput';} else {echo 'contraseña';}?>" type="password"  name="pass2" placeholder="Repetir password" ><label class="requerido">*</label>
            <?php if($_POST){ if(isset($errores['pass2'])) {echo $errores['pass2'];}} ?>
            <br>
            <br>
            <p>Avatar (opcional)</p>
            <input type="file" name="avatar">
            <input type="hidden" name="max_file_size" value="30000">
            <?php if (isset($errores['avatar'])) { echo "<br><br> <p class='errorAvatar'>" .$errores ['avatar'] ."<p>";} ?>
            <br><br>

        <label>Género</label>
        <br>
          <input type="radio" name="genero" value="Masculino" <?php if ($genero =="Masculino") {echo 'checked';}?> ><label class="radio">Masculino</label>
          <input type="radio" name="genero" value="Femenino" <?php if ($genero =="Femenino") {echo 'checked';}?>><label class="radio">Femenino</label>
          <input type="radio" name="genero" value="Otro" <?php if ($genero =="Otro") {echo 'checked';}?>><label class="radio">Otro</label>
          <br>
          <br>
<label class="requerido">* Campo requerido</label>
      </fieldset>
      <br>

        <br>

    <fieldset class="caja2">
      <!-- AVISOS 2 -->


      <h1 class="titulo">Datos del Domicilio</h1>
      <hr>
      <br>
        <select class="<?php if ((isset($errores['pais']))) {echo 'errorLocalidad';} else {echo 'pais';}?>" name="pais" value ="<?php echo $pais;?>">
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
      <p>
        <select class="<?php if ((isset($errores['provincia']))) {echo 'errorLocalidad';} else {echo 'provincia';}?>" name="provincia" value ="<?php echo $provincia;?>">
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
        <select class="<?php if ((isset($errores['ciudad']))) {echo 'errorLocalidad';} else {echo 'ciudad';}?>" name="ciudad" value="<?php echo $ciudad;?>">
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
        <input class="<?php if (isset($errores['direccion'])) {echo 'errorDireccion';} else {echo 'dir';}?>" type="text" name="direccion"  placeholder="Calle" value="<?php echo $direccion;?>"><label class="requerido">*</label>
        <input class="<?php if (isset($errores['altura'])) {echo 'errorNro';} else {echo 'nro';}?>" type="text" name="altura"  placeholder="Altura" value="<?php echo $altura;?>"><label class="requerido">*</label>
          <?php if($_POST){ if(isset($errores['direccion'])) {echo $errores['direccion'];}} ?>
          <?php if($_POST){ if(isset($errores['altura'])) {echo $errores['altura'];}} ?>
        <br>
        <br>
        <input class="piso" type="text" name="piso" placeholder="Piso" value = "<?php echo $piso;?>">
        <input class="dpto" type="text" name="dpto" placeholder="Depto." value = "<?php echo $dpto;?>">
        <input class="cp" type="text" name="cp" placeholder="CP" value = "<?php echo $cp;?>">
        <br>
        <br>
        <input class="vrs" type="text" name="obsv" placeholder="Observaciones" value = "<?php echo $obsv;?>">
        <br>
        <br>
        <label class="requerido">* Campo requerido</label>
    </fieldset>
    <br>


    <input id="check" type="checkbox"  name="terminos"><a href="#"><label class="tyc">Acepto Terminos y Condiciones</label></a>

    <br>
    <br>
    <div class="botones">
      <button class="boton" type="submit" name="enviar">Enviar</button>
      <button class="boton" type="reset" name="" value="">Borrar</button>

    </div>

</form>
      <div class="separador"></div>
</div>


<?php require_once('footer.php'); ?>


  </body>
</html>
