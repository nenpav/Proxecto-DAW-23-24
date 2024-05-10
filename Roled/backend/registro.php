<?php

    include_once("./functions.php");

    $conexionBBDD = conectarBBDD('localhost','root','','roled'); //Hay que cambiar cuando se haga despliegue el server


if(isset($_POST['registro'])){
    
    //hay que validar los datos de entrada
    $email = trim(strip_tags($_POST['email']));
    $login = trim(strip_tags($_POST['usuario']));
    $pwd = trim(strip_tags($_POST['pwd']));
    $pwd2 = trim(strip_tags($_POST['pwd2']));
    //No sé si la gestión de la fecha es correcta. probar
    $fechaNac = $_POST['fnac'];

    //La comprobación de si el usuario existe o no se va a hacer por JS
    //Validar si las dos contraseñas son iguales
       
    $conexionBBDD->query("INSERT INTO  usuarios (username,pwd,email,tipo, avatar, fecha_nac) values
                        ($username, $pwd, $email, 'NORMAL', NULL, $fechaNac)");
    
    //Comprobar si hay errores
           
}

//Ver como hacemos la redirección
header("Location: ../index.php");

    

?>