<?php
require_once("./functions.php");
//phpinfo();
initSession();

if(!isset($_SESSION['login'])){
  header("Location: ../index.php");
}

/* Realiza toda la lógica para guardar el svg del lienzo en una imagen y 
guarda su ruta relativa en bbdd */

if(!$_POST){
    //redirigir no sé a donde aún
}


$svg = !empty($_POST['datosSvg'])?$_POST['datosSvg']:'';
$nombre = $_POST['nombre'];
//var_dump($svg);
$login = $_SESSION['login'];
$ruta = "../../docsUsuarios/$login/$nombre.svg";

//var_dump($svg);
$conexionBBDD = new mysqli("localhost","root","","roled");

$conexionBBDD->begin_transaction();
try{
    if($svg==""){
        throw new Exception("Error al procesar la imagen");
    }

    if(!file_put_contents($ruta,$svg)){
        throw new Exception("Error al guardar la imagen");
    }  

    if (!$resultado = $conexionBBDD->query("INSERT INTO design (id_usuario, nombre) VALUES ('$login', '$nombre.svg')")) {
        throw new Exception("Error al guardar la imagen");
    }
    
    //echo "Guardado ok";
    $conexionBBDD->commit();
    header("Location: ../documents/draw.php?save=ok");
}catch(Exception $e){
    $conexionBBDD->rollback();
    header("Location: ../documents/draw.php?save=ko");
    //echo "Guardado mal";
}



    


?>