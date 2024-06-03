<?php
echo "Hola";
 if (isset($_GET['id'])){

    include_once("./functions.php");

    initSession();
    $user = $_SESSION['login']; 

    $id = $_GET['id'];
    
    $conexionBBDD = new mysqli("localhost", 'root', '', 'roled');
    $conexionBBDD->begin_transaction();
    try{
        
        if(!$resultado = $conexionBBDD->query("SELECT nombre FROM design WHERE id_design = $id")){
            throw new Exception("Error");
        }
        $nombre = $resultado->fetch_assoc()['nombre'];

        $ruta = "../../docsUsuarios/$user/$nombre";

        if (file_exists($ruta)) {
            if (!unlink($ruta)) {
                throw new Exception("Error"); 
            } 
        }

        if(!$resultado = $conexionBBDD->query("DELETE FROM design WHERE id_design = $id")){
            throw new Exception("Error");
        }
        $conexionBBDD->commit();
    }catch(Exception $e){
       
        $conexionBBDD->rollback();
    }
    
}
 
?>