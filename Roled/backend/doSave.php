<?php
require_once("../backend/functions.php");
initSession();

if(!isset($_SESSION['login'])){
  header("Location: ../index.php");
}

/* Realiza toda la lógica para guardar el svg del lienzo en una imagen y 
guarda su ruta relativa en bbdd */

if(!$_POST){
    //redirigir no sé a donde aún
}

$svgString = !empty($_POST['datosSvg'])?$_POST['datosSvg']:'';
$nombreSvg = $_POST['nombre'];
$login = $_SESSION['login'];
$ruta = "../../docsUsuarios/$login/$nombreSvg.jpg";

$conexionBBDD = new mysqli("localhost","root","","roled");

$conexionBBDD->begin_transaction();
try{
    if($svgString==""){
        throw new Exception("Error al procesar la imagen");
    }

    //Librería imagick
    $imagen = new Imagick();
    $imagen->readImageBlob($svgString);
    $imagen->setImageFormat("jpeg");
    $imagenJpeg = $image->getImageBlob();

    if(!file_put_contents($ruta,$imagenJpeg)){
        throw new Exception("Error al guardar la imagen");
    }

    if(!$resultado = $conexionBBDD->query("SELECT id_usuario FROM usuarios WHERE username='$login'")){
        throw new Exception("Error al guardar la imagen");
    }
    $id_usuario = $resultado->fetch_assoc()['id_usuario']; 

    if(!$resultado2->$conexionBBDD->query("INSERT INTO design (id_usuario, nombre) VALUES ($id_usuario,'$nombreSvg')")){
        throw new Exception("Error al guardar la imagen");
    }
    
    $conexionBBDD->commit();
}catch(Exception $e){
    $conexionBBDD->rollback();
}



    


?>