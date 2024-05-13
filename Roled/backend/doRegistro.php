<?php

    include_once("./functions.php");
    $conexionBBDD = new mysqli('localhost','root','','roled'); //Hay que cambiar cuando se haga despliegue el server

if($_POST){
   
    $email = trim(strip_tags($_POST['email']));
    $login = trim(strip_tags($_POST['user']));
    $pwd = trim(strip_tags($_POST['pwd']));
    $pwd2 = trim(strip_tags($_POST['pwd2']));
    $fechaNac = $_POST['fnac'];

    if(isUserExits($login,$conexionBBDD)){
        header("Location: ../index.php?registro=userRepeat");
    }

    if($conexionBBDD->query("INSERT INTO  usuarios (username,pwd,email,tipo, avatar, fecha_nac) values
        ('$login', '$pwd', '$email', 'U', NULL, '$fechaNac')")){

        header("Location: ../index.php?registro=ok"); 
    }else{
        header("Location: ../index.php?registro=fail"); 
    }
    
}



    

?>