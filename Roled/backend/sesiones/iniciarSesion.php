<?php

include_once("../functions.php"); //Comprobar la ruta

$usuarioOk = false;
$conexionBBDD = conectarBBDD('localhost','root','','roled'); //Hay que cambiar cuando se haga despliegue el server

initSession();

if(isset($_POST['login'])){

    //Esto hay que validarlo
    $login = trim(strip_tags($_POST['usuario']));
    $pwd = trim(strip_tags($_POST['pwd']));

    //Comprobar si el usuario existe
    if(isUserExits($login, $conexionBBDD)>0){
        //Comprobar si la contraseña e correcta
        if(isCorrectPwd($login,$pwd,$conexionBBDD)){ 
            $usuarioOk = true;
            $_SESSION['login'] = $login;
            if($usuarioOk){
                //Lógica aún no pensada
            }
        }
    }

    if(!$usuarioOk){
        $_SESSION['error'] = "El nombre de usuario o la contraseña no son correctos";
        $_SESSION['modal'] = true; 
    }
           
}

header("Location: ../index.php");


?>