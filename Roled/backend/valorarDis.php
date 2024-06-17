<?php
    if (isset($_GET['id'])){

        include_once("./functions.php");
    
        initSession();
        $user = $_SESSION['login']; 
    
        $id = $_GET['id'];
        //echo $id;
        
        $conexionBBDD = new mysqli("localhost", 'root', '', 'roled');
        $conexionBBDD->begin_transaction();

        try{
            if(!$resultado = $conexionBBDD->query("SELECT valoraciones FROM design WHERE id_design=$id")){
                throw new Exception("Error");
            }
            $valoracion = $resultado->fetch_assoc()['valoraciones'];
            $newValoracion = $valoracion + 1;
            //echo $newValoracion;
            if(!$resultado = $conexionBBDD->query("UPDATE design SET valoraciones=$newValoracion WHERE id_design = $id")){
                throw new Exception("Error");
            }
            $conexionBBDD->commit();
        }catch(Exception $e){
            $conexionBBDD->rollback();
        }
    }

?>