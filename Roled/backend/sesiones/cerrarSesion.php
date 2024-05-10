<?php
//Comprobar si funciona

    if(isset($_POST['salir'])){
        require_once "./funciones.php" ;
        initSession();
        if(isset($_SESSION['login'])){
            endSession();
        }
    }
    header("Location: ../index.php");

?>