<?php
require_once("../backend/functions.php");
initSession();

if(!isset($_SESSION['login'])){
  header("Location: ../index.php");
}

if(isset($_GET['subida'])){
  echo "<script>window.addEventListener('DOMContentLoaded', function() {
    document.getElementById('save').showModal();
  });</script>";
}

$user= $_SESSION['login'];
$conexionBBDD = new mysqli ('localhost','root','','roled');
$rutaBase= "../src/img/avatarGen.png";
$fichero = "../src/json/roled.json";
$array = [];
/* Obtener los disenhos del usuario */
if($resultado = $conexionBBDD->query("SELECT * FROM design WHERE id_usuario='$user'")){
  if(($resultado->num_rows>0)){
    while($fila = $resultado->fetch_assoc()){
      $array[] = $fila;
    }
    //var_dump($array);
    convertirJson($array, $fichero);
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Mi Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/miPerfil.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../src/css/modales.css">
    <script src="../src/js/ajax.js" defer></script>
    <script src="../src/js/miPerfil.js" defer></script>
    <script src="../src/js/modales.js" defer></script>
</head>
<body>
    <header>
        <figure id="logo">
            <a href="" aria-label="enlace a index"><img src="../src/img/ROLED-trans.png" alt="logo"></a>
        </figure>
        <nav>
            <ul id='menuConSesion'>
                <li><a href='../index.php' aria-label='Enlace a index'>Inicio<span></span></a></li>
                <li><a href='./draw.php' aria-label='Enlace a dibujar'>Dibujar<span></span></a></li>
                <li><a href='./comunity.php' aria-label='Enlace a Explorar'>Explorar<span></span></a></li>
                <li><a href='./tienda.php' aria-label='Enlace a Tienda'>Tienda<span></span></a></li>
                <div class="dropdown">
                  <button class="dropbtn"><img id="avatar" src="<?php echo buscarRutaAvatar($user, $rutaBase,'../../'); ?>" alt=""></button>
                  <div class="dropdown-content">
                    <a href="#" aria-label="Enlace a Mi Perfil">Mi Perfil</a>
                    <a href="./design.php" aria-label="Enlace a mis diseños">Mis Diseños</a>
                    <a href="../backend/sesiones/cerrarSesion.php" aria-label="Cerrar sesión">Cerrar Sesión</a>
                  </div>
                </div>
            </ul>
        </nav>
    </header>
    <main>
        <h1><?php  echo $user ?></h1>
        <section class="content">
          <section class="izq">
            <div class="avatarImg">
              <h4 class="titulo">Cambiar foto de perfil</h4>
                <div class="img"></div>
                <label for="cargar" class="labelAvatar">
                    <i class="fa fa-camera"></i>
                </label>
                <form action="../backend/avatar.php" enctype="multipart/form-data" method="POST">
                  <input type="hidden" name="MAX_FILE_SIZE" value="1024000">
                  <input type="file" id="cargar" name="cargar">
                  <input class="boton" type="submit" value="Guardar">
                </form>
            </div>
          </section>
          <section id="ListaDisenhos">
              <h4 class="titulo">Mis Diseños</h4>
              <section class="disenhos">
                <!-- Lista de diseños dinámica por ajax -->
              </section>
              <button id="mas" class="boton">Ver más</button>
          </section>

        </section>
    </main>
    <footer>
        <section id="rrss">
          <figure>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,300,150">
              <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M16,3c-7.17,0 -13,5.83 -13,13v18c0,7.17 5.83,13 13,13h18c7.17,0 13,-5.83 13,-13v-18c0,-7.17 -5.83,-13 -13,-13zM37,11c1.1,0 2,0.9 2,2c0,1.1 -0.9,2 -2,2c-1.1,0 -2,-0.9 -2,-2c0,-1.1 0.9,-2 2,-2zM25,14c6.07,0 11,4.93 11,11c0,6.07 -4.93,11 -11,11c-6.07,0 -11,-4.93 -11,-11c0,-6.07 4.93,-11 11,-11zM25,16c-4.96,0 -9,4.04 -9,9c0,4.96 4.04,9 9,9c4.96,0 9,-4.04 9,-9c0,-4.96 -4.04,-9 -9,-9z"></path></g></g>
              </svg>
          </figure>
          <figure>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
              <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.33333,5.33333)"><path d="M36.335,46.238h-25.268c-5.733,0 -9.272,-4.294 -9.272,-10.027c0,0 0.633,-4.487 0,-15.099c-0.124,-2.072 0.59,-7.243 0.59,-7.243c0,-5.733 3.963,-10.121 9.697,-10.121c0,0 8.359,-0.665 10.947,-0.472c7.949,0.594 11.267,-0.406 12.952,-0.425c6.347,-0.071 9.319,4.883 9.319,10.616c0,0 0.283,10.805 0.283,12.646c0,4.011 -0.613,10.003 -0.613,10.003c0.613,4.955 -2.902,10.122 -8.635,10.122z" fill-opacity="0" fill="#ffffff"></path><path d="M37.053,21.946c0.106,-0.019 0.228,-0.008 0.335,-0.003c0.252,-0.459 -0.033,-1.342 -0.089,-1.845c-0.087,-0.769 -0.173,-1.539 -0.26,-2.308c-0.02,-0.179 -0.05,-0.377 -0.189,-0.491c-0.076,-0.063 -0.174,-0.09 -0.27,-0.116c-0.904,-0.245 -1.809,-0.491 -2.713,-0.736c-0.389,-0.106 -0.782,-0.212 -1.139,-0.399c-0.912,-0.477 -1.485,-1.413 -1.937,-2.338c-0.389,-0.796 -0.723,-1.618 -1,-2.459c-0.229,-0.697 -0.047,-1.343 -0.855,-1.389c-0.504,-0.029 -1.008,-0.051 -1.512,-0.067c-1.069,-0.034 -2.144,-0.009 -3.208,-0.032c-0.259,0.924 -0.143,1.942 -0.189,2.892c-0.054,1.127 -0.082,2.255 -0.085,3.383c-0.004,2.256 0.095,4.512 0.298,6.759c0.074,0.821 0.162,1.642 0.205,2.465c0.053,1.035 0.034,2.071 0.014,3.107c-0.018,0.963 -0.038,1.936 -0.283,2.867c-0.293,1.111 -0.911,2.135 -1.758,2.912c-0.349,0.32 -0.741,0.602 -1.182,0.774c-0.853,0.332 -1.816,0.228 -2.7,-0.011c-0.763,-0.206 -1.518,-0.518 -2.09,-1.062c-0.883,-0.839 -1.218,-2.164 -0.987,-3.36c0.231,-1.195 0.977,-2.254 1.933,-3.008c0.978,-0.77 2.326,-1.415 3.571,-1.572c0.086,-0.202 0.104,-0.243 0.105,-0.457c0.001,-0.172 0.063,-0.311 0.073,-0.478c0.024,-0.387 -0.002,-0.786 -0.002,-1.174c0,-0.498 0.084,-1.073 -0.016,-1.559c-0.033,-0.159 -0.069,-0.298 -0.128,-0.435c-0.021,-0.049 -0.024,-0.108 -0.049,-0.159c-0.031,-0.064 -0.096,-0.102 -0.082,-0.185c0.021,-0.004 0.029,-0.079 0.05,-0.083l-0.059,-0.071c0.016,0 0.043,0.071 0.059,0.071c-0.715,0 -1.417,-0.132 -2.126,-0.081c-0.725,0.053 -1.444,0.19 -2.139,0.406c-1.366,0.424 -2.64,1.149 -3.688,2.124c-1.765,1.642 -2.87,3.976 -3.022,6.382c-0.048,0.757 -0.004,1.515 0.079,2.268c0.077,0.696 0.105,1.447 0.449,2.066c1.024,1.842 2.288,3.358 4.038,4.568c0.455,0.315 0.932,0.606 1.449,0.804c0.814,0.311 1.701,0.379 2.573,0.372c1.256,-0.01 2.51,-0.17 3.729,-0.473c1.558,-0.387 2.945,-0.889 4.073,-2.074c1.026,-1.078 1.732,-2.436 2.179,-3.847c0.618,-1.951 0.779,-4.012 0.936,-6.053c0.054,-0.697 0.107,-1.395 0.161,-2.092c0.078,-1.009 0.153,-2.022 0.132,-3.035c-0.011,-0.516 -0.045,-1.031 -0.12,-1.542c-0.069,-0.478 -0.283,-0.987 -0.307,-1.454c0.084,0.023 0.176,0.057 0.252,0.104c0.156,0.097 0.308,0.224 0.468,0.313c2.202,1.219 4.513,1.811 7.023,1.811c-0.016,0 -0.326,0 -0.342,0" fill="#ffffff"></path></g></g>
              </svg>
          </figure>
          <figure>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
              <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M11,4c-3.866,0 -7,3.134 -7,7v28c0,3.866 3.134,7 7,7h28c3.866,0 7,-3.134 7,-7v-28c0,-3.866 -3.134,-7 -7,-7zM13.08594,13h7.9375l5.63672,8.00977l6.83984,-8.00977h2.5l-8.21094,9.61328l10.125,14.38672h-7.93555l-6.54102,-9.29297l-7.9375,9.29297h-2.5l9.30859,-10.89648zM16.91406,15l14.10742,20h3.06445l-14.10742,-20z"></path></g></g>
              </svg>
          </figure>
          <figure>
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,256,256">
              <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(5.12,5.12)"><path d="M25,3c-12.15,0 -22,9.85 -22,22c0,11.03 8.125,20.137 18.712,21.728v-15.897h-5.443v-5.783h5.443v-3.848c0,-6.371 3.104,-9.168 8.399,-9.168c2.536,0 3.877,0.188 4.512,0.274v5.048h-3.612c-2.248,0 -3.033,2.131 -3.033,4.533v3.161h6.588l-0.894,5.783h-5.694v15.944c10.738,-1.457 19.022,-10.638 19.022,-21.775c0,-12.15 -9.85,-22 -22,-22z"></path></g></g>
              </svg>
          </figure>
        </section>
        <section id="accesibilidad">
          <figure>
            <img src="../src/img/wcag1AA-blue.gif" alt="">
          </figure>
          <figure>
            <img src="../src/img/wcag1AA.gif" alt="">
          </figure>
        </section>
        <section id="contacto">
          <ul>
            <li>Contacto</li>
            <li><mailto>roled@roled.com</mailto></li>
            <li><address>Avda. Pontevedra, 44 Cambados</address></li>
            <li><tel>986524585</tel> - <tel>+34 652154587</tel></li>
          </ul>
        </section>
        <section id="terminos">
          <ul>
            <li><a href="">Aviso legal</a></li>
            <li><a href="">Térmimnos y condiciones de uso</a></li>
            <li><a href="">Política de cookies</a></li>
            <li><a href="">Política de privacidad</a></li>
          </ul>
        </section>
      </footer>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
<dialog id="save">
    <button id="cerrarSave">X</button>
    <?php
        if($_GET['subida'] == "ok"){
          echo "<p id='confSubida'>El avatar se ha subido correctamente</p>";
        }
        if($_GET['subida'] == "ko"){
          echo "<p id='confSubida'>Error al subir el avatar</p>";
        }
    ?>
  </dialog>
</body>
<template id="disenhos">
    <article>
        <figure>
            <img src="" alt="">
        </figure>
        <button>Proyectar</button>
    </article>
</template>
</html>