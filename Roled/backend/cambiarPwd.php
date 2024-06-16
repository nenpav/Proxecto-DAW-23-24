<?php
    include_once("./functions.php");
    initSession();
    $conexionBBDD = new mysqli('localhost','root','','roled');

    if($_POST){
    
        $login = $_SESSION['login'];
        $pwd = trim(strip_tags($_POST['pwd']));
        $pwd2 = trim(strip_tags($_POST['pwd2']));

        $conexionBBDD->begin_transaction();
        try{
            $hash = formatoHash($pwd);
            if(!$conexionBBDD->query("UPDATE usuarios set pwdHash = '$hash' WHERE username='$login'")){
                throw new Exception("Error al actualizar la contraseña");
                
            }
            $conexionBBDD->commit();
            header("Location: ../documents/miPerfil.php?change=ok");
        }catch(Exception $e){
            $conexionBBDD->rollback();
            header("Location: ../documents/miPerfil.php?change=ko");
        }
    }else{
        header("Location: ../documents/miPerfil.php");
    }
