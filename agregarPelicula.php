<?php
$dsn="mysql:dbname=movies_db; host=localhost; port=3306";
$usuario='root';
$pass='root';

$idSerie= 0;

try {
	$bd=new PDO ($dsn, $usuario, $pass);
	$bd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
}
catch (Exception $e){
	echo "Hubo un error";
	exit;
}
echo "Exito";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar Pelicula</title>

</head>

<body>
	<form method="post">
		<div>
			<label>Titulo</label>
			<input type="text" name="title" >
		</div>
		<div>
			<label>Rating</label>
			<input type="text" name="rating" >
		</div>
		<div>
			<label>Premios</label>
			<input type="text" name="awards" >
		</div>
		<div>
			<label>Duracion</label>
			<input type="text" name="leght" >
		</div>
		<div>
			<label>Fecha de Estreno</label> <br>
			<i>Año: </i>
			<select name="year">
				<?php for ($i=2018; $i >= 1920; $i--) { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
			<i>Mes: </i>
			<select name="month">
				<?php for ($i=1; $i < 13; $i++) { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
			<i>Día: </i>
			<select name="day">
				<?php for ($i=1; $i < 32; $i++) { ?>
					<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
				<?php } ?>
			</select>
		</div>
		<button type="submit">Guardar película</button>
    <?php
    if ($_POST){
      $title= $_POST['title'];
      $rating= $_POST['rating'];
      $awards= $_POST['awards'];
      $duracion= $_POST['leght'];
      $fecha= $_POST['year'] . "-" . $_POST['month'] . "-" .$_POST['day'];


				$titulosBD = $bd->prepare ("select * from movies where title =:title");
				$titulosBD-> bindValue (':title', $title, PDO::PARAM_STR);
				$titulosBD->execute ();
				$resultadoTitulo = $titulosBD -> fetch (PDO::FETCH_ASSOC);

				if($resultadoTitulo){
					$sql= "update movies set rating=:rating, awards=:awards
						, release_date=:fecha, length=:duracion
						 	where id=:id";
      		$consulta = $bd->prepare($sql);
					$consulta-> bindValue (':rating', $rating, PDO::PARAM_INT);
					$consulta-> bindValue (':awards', $awards, PDO::PARAM_INT);
					$consulta-> bindValue (':fecha', $fecha, PDO::PARAM_STR);
					$consulta-> bindValue (':duracion', $duracion, PDO::PARAM_INT);
					$consulta-> bindValue (':id', $resultadoTitulo['id'], PDO::PARAM_INT);
				} else{
					$sql= "insert into movies values (null, now(), now(), :title, :rating
						, :awards, :fecha, :duracion, null)";
      		$consulta = $bd->prepare($sql);
					$consulta-> bindValue (':title', $title, PDO::PARAM_STR);
					$consulta-> bindValue (':rating', $rating, PDO::PARAM_INT);
					$consulta-> bindValue (':awards', $awards, PDO::PARAM_INT);
					$consulta-> bindValue (':fecha', $fecha, PDO::PARAM_STR);
					$consulta-> bindValue (':duracion', $duracion, PDO::PARAM_INT);
				}



      $consulta->execute();
      echo "Pelicula guardada";
    }
   ?>
	</form>
</body>

</html>
