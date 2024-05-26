<?php
require_once("../backend/functions.php");
initSession();
if(!isset($_SESSION['login'])){
    header("Location: ../index.php");
}
$username= $_SESSION['login'];
$ruta = "../../docsUsuarios/".$username."/avatar";
$conexionBBDD = new mysqli ('localhost','root','','roled');

function guardarAvatar($ruta,$username){
    if($_POST){
        if (isset($_FILES['cargar']) && $_FILES['cargar']['error'] == UPLOAD_ERR_OK) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $tiposMime = finfo_file($finfo, $_FILES['cargar']['tmp_name']);
            
            $tipos = array(
                'jpg' => 'image/jpeg',
                'png' => 'image/png',
                'gif' => 'image/gif'
            );
            $ext = array_search($tiposMime, $tipos);
            
            if ($ext !== false) {
                $nombre = "/avatar".$username.".".$ext;
                $subir_archivo = $ruta.$nombre;
                echo "<div>";
                
                if (move_uploaded_file($_FILES['cargar']['tmp_name'], $subir_archivo)) {
                    header("Location: ../documents/miPerfil.php?subida=ok"); 
                } else {
                    return false;
                }
            
            } else {
                header("Location: ../documents/miPerfil.php?subida=ko"); 
            }
            
            finfo_close($finfo);
        } else {
            header("Location: ../documents/miPerfil.php?subida=ko"); 
        }
    }
}

$conexionBBDD->begin_transaction();
    
    try{
        //Crear la carpeta de avatar dentro de la carpeta de usuario
        if(file_exists($ruta) && !mkdir($ruta,0777,true)){
            throw new Exception();
        }
        //Guardar la imagen
        //guardarAvatar($ruta,$username);



        $conexionBBDD->commit();
        echo "Guardado bien";
    }catch(Exception $e){
        echo "guardado mal";
        $conexionBBDD->rollback();
    }

    ?>