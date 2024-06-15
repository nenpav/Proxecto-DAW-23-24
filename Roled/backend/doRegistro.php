<?php

    include_once("./functions.php");
    $conexionBBDD = new mysqli('localhost','root','','roled'); //Hay que cambiar cuando se haga despliegue el server

if($_POST){
   
    //No se validan los vacíos ya que se validan antes de enviar el formulario por JavaScript
    $email = trim(strip_tags($_POST['email']));
    $login = trim(strip_tags($_POST['user']));
    $pwd = trim(strip_tags($_POST['pwd']));
    $pwd2 = trim(strip_tags($_POST['pwd2']));
    $fechaNac = $_POST['fnac'];

    if(isUserExits($login)){
        header("Location: ../documents/registro.php?registro=userRepeat");
    }

    $conexionBBDD->begin_transaction();

    try{
        if(!crearCarpetaUser($login)){
            throw new Exception();
        }
        
        $hash = formatoHash($pwd);

        $conexionBBDD->query("INSERT INTO  usuarios (username,pwdHash,email,tipo, avatar, fecha_nac) values
        ('$login', '$hash', '$email', 'U', NULL, '$fechaNac')");

        $conexionBBDD->commit();
        header("Location: ../index.php?registro=ok"); 
    }catch(Exception $e){
        $conexionBBDD->rollback();
        eliminarCarpetaUser($login);
        header("Location: ../documents/registro.php?registro=fail"); 
    }

}else{
    header("Location: ../index.php");
}



?>