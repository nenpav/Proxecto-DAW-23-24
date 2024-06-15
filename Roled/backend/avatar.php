<?php
require_once("../backend/functions.php");
initSession();
if(!isset($_SESSION['login'])){
    header("Location: ../index.php");
}
$username= $_SESSION['login'];
$ruta = "../docsUsuarios/".$username."/avatar";
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
        if (!isset($_FILES['cargar']) || $_FILES['cargar']['error'] == UPLOAD_ERR_NO_FILE) {
            throw new Exception ("No se ha seleccionado nignuna imagen");
            die();
        }

        
        
        //Comprobar si el usuario ya tiene una foto de avatar
        if(obtenerIdUsuario($username)==-1){
            throw new Exception ("Error al obtener el id del usuario");
            die();
        }

        $resultado = $conexionBBDD->query("SELECT avatar FROM usuarios WHERE id_usuario");
        if($resultado->num_rows>0){
            $tieneAvatar = $resultado->fetch_assoc()['avatar'];

            if(!is_null($tieneAvatar) || !empty($tieneAvatar)){
                unlink($ruta."/".$tieneAvatar);
            }
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
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

        //Guardar en BBDD

        $id_usuario = obtenerIdUsuario($username);
        if($id_usuario==-1){
            throw new Exception("Error al guardar la imagen");
            die();
        }
    
        if (!$resultado = $conexionBBDD->query("UPDATE usuarios SET avatar = '$nombre' WHERE id_usuario = $id_usuario")) {
            throw new Exception("Error al guardar la imagen");
            die();
        }

        $conexionBBDD->commit();
        //echo "Guardado bien";
        header("Location: ../documents/miPerfil.php?subida=ok&avatar=$nombre"); 

    }catch(Exception $e){
        //echo "guardado mal";
        $conexionBBDD->rollback();
        header("Location: ../documents/miPerfil.php?subida=ko"); 
    }
}



    ?>