<?php

include_once("../functions.php"); //Comprobar la ruta

$usuarioOk = false;
$conexionBBDD = new mysqli('localhost','root','','roled'); //Hay que cambiar cuando se haga despliegue el server

initSession();


if($_POST){

    
    $login = trim(strip_tags($_POST['user']));
    $pwd = trim(strip_tags($_POST['pwd']));

    //Comprobar si el usuario existe
    if(isUserExits($login, $conexionBBDD)>0){
        //Comprobar si la contraseña es correcta
        if(isCorrectPwd($login,$pwd,$conexionBBDD)){ 
            $usuarioOk = true;
            if($usuarioOk){
                $_SESSION['login'] = $login;
                echo "<script></script>";
                //echo "OK";
            }
        }
    }

    if(!$usuarioOk){
        $_SESSION['modal'] = true; 
        //echo "No ok";
    }
           
}

header("Location: ../../index.php");


?>