<?php
require_once("../backend/functions.php");
initSession();
if(!isset($_SESSION['login'])){
    header("Location: ../index.php");
}
$username= $_SESSION['login'];
$ruta = "../../docsUsuarios/".$username."/avatar";
$conexionBBDD = new mysqli ('localhost','root','','roled');
//var_dump($_FILES);

if($_POST){
    $conexionBBDD->begin_transaction();
    try{
        //Crear la carpeta de avatar dentro de la carpeta de usuario
        if(!file_exists($ruta)){
            mkdir($ruta,0777,true);
        }
        //Guardar la imagen
        
        if (isset($_FILES['cargar'])) {
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            echo "Hola";
                $tiposMime = finfo_file($finfo, $_FILES['cargar']['tmp_name']);
                
                $tipos = array(
                    'jpg' => 'image/jpeg',
                    'png' => 'image/png',
                    'gif' => 'image/gif'
                );
                $ext = array_search($tiposMime, $tipos);
                
                if ($ext !== false) {
                    $nombre = "avatar".$username.".".$ext;
                    $subir_archivo = $ruta."/".$nombre;
                    echo "<div>";
                    
                    move_uploaded_file($_FILES['cargar']['tmp_name'], $subir_archivo);
                
                } else {
                    throw new Exception("Error al guardar la imagen");
                    
                }
                
                finfo_close($finfo);
        } else {
            throw new Exception("Error al guardar la imagen");
        }


            //Guardar en BBDD

            $id_usuario = obtenerIdUsuario($login);
            if($id_usuario==-1){
                throw new Exception("Error al guardar la imagen");
            }
        
            if (!$resultado = $conexionBBDD->query("UPDATE usuarios SET avatar = '$nombre' WHERE id_usuario = $id_usuario")) {
                throw new Exception("Error al guardar la imagen");
            }

            $conexionBBDD->commit();
            echo "Guardado bien";

    }catch(Exception $e){
        echo "guardado mal";
        $conexionBBDD->rollback();
       // header("Location: ../documents/miPerfil.php?subida=ko"); 
    }
}



    ?>