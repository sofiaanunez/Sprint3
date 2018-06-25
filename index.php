<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eCommerce</title>
    <link rel="stylesheet" href="estilo_index.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  </head>

  <body>

<?php require_once('header_index.php'); ?>

    <section class="hero">
      <div class="opacidad" style=""> </div>
  		<div class="background-image" style=""> </div>
      <h1>eCommerce</h1>
      <br>
  		<h3>Todo lo que buscas ¡En un solo lugar!</h3>
      <form>
        <input type="buscador" placeholder="¡Encontrá lo que necesitas!">
        <a href="#" class="btn">Buscar</a>
      </form>
  	</section>


    <section class="opciones">

      <h3>¿Qué estás buscando?</h4> <br>
      <hr><br>
      <div class="contenedor">
      <ul class="iconos">
        <li> <a href="#"><i class="fas fa-suitcase fa-3x"></i></li></a>
        <li> <a href="#"> <i class="fas fa-building fa-3x"></i></li></a>
        <li> <a href="#"> <i class="fas fa-birthday-cake fa-3x"></i></li></a>
        <li> <a href="#"><i class="fas fa-keyboard fa-3x"></i></li></a>
        <li> <a href="#"><i class="fas fa-car fa-3x"></i></li></a>
      </ul>
      <br>
      <ul class="rubros">
        <li> Servicios Profesionales </li>
        <li> Construcción y afines</li>
        <li> Fiestas y Animaciones</li>
        <li> Computación</li>
        <li> Rodados</li>
      </ul>
      </div>
      <br>
    </section>


    <div class="divisor"></div>


  <section class="opc-sec">
      <h3>¡Ofertas del día!</h3>

      <br><hr><br>
      <section class="flex">

      <div class="detalle">
        <article class="cont-sec">
          <a href="#"><img src="Images/Generales/oferta-obra.jpg" alt="10" width="200"></a>
        </article>

          <h4>Descuento en obras </h4>
            <br>
      </div>


      <div class="detalle">
        <article class="cont-sec">
          <a href="#"><img  src="Images/Generales/fiestas.jpg" alt="10" width="200"></a>
        </article>
          <h4>¡Ahorra en tus festejos!</h4>
            <br>
      </div>


      <div class="detalle">
        <article class="cont-sec">
          <a href="#"><img  src="Images/Generales/pc.jpg" alt="10" width="200"></a>
        </article>
          <h4>Arregla tu compu ¡YA!</h4>
            <br>
      </div>
      </section>
  </section>


    <div class="divisor"></div>


    <section class="opc-sec">
        <h3>¡Ofertas del día!</h3>
        <br><hr><br>
        <section class="flex">
        <div class="detalle">
          <article class="cont-sec">
            <a href="#"><img src="Images/Generales/oferta-obra.jpg" alt="10" width="200"></a>
          </article>
            <h4>Descuento en obras </h4>
              <br>
        </div>

        <div class="detalle">
          <article class="cont-sec">
            <a href="#"><img  src="Images/Generales/fiestas.jpg" alt="10" width="200"></a>
          </article>
            <h4>¡Ahorra en tus festejos!</h4>
              <br>
        </div>

        <div class="detalle">
          <article class="cont-sec">
            <a href="#"><img  src="Images/Generales/pc.jpg" alt="10" width="200"></a>
          </article>
            <h4>Arregla tu compu ¡YA!</h4>
              <br>
        </div>
      </section>
    </section>


      <div class="divisor"></div>


      <section class="opc-sec">
          <h3>¡Ofertas del día!</h3>
          <br><hr><br>
          <section class="flex">
          <div class="detalle">
            <article class="cont-sec">
              <a href="#"><img src="Images/Generales/oferta-obra.jpg" alt="10" width="200"></a>
            </article>

              <h4>Descuento en obras </h4>
                <br>
          </div>
          <div class="detalle">
            <article class="cont-sec">
              <a href="#"><img  src="Images/Generales/fiestas.jpg" alt="10" width="200"></a>
            </article>
              <h4>¡Ahorra en tus festejos!</h4>
                <br>
          </div>
          <div class="detalle">
            <article class="cont-sec">
              <a href="#"><img  src="Images/Generales/pc.jpg" alt="10" width="200"></a>
            </article>
              <h4>Arregla tu compu ¡YA!</h4>
                <br>
          </div>
        </section>
      </section>

        <div class="divisor"></div>

        <?php require_once('footer.php'); ?>
  </body>
</html>
