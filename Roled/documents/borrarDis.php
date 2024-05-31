<?php

if (isset($_GET['id'])){

    $id = $_GET['id'];

    $conexionBBDD = new mysqli("localhost", 'root', '', 'roled');
    $conexionBBDD->begin_transaction();
    try{
        if(!$resultado = $conexionBBDD->query("DELETE FROM design WHERE id_design = $id")){
            throw new Exception("Error");
        }
        $conexionBBDD->commit();
        header("Location: ../documents/design.php?borrar=ok"); 
    }catch(Exception $e){
        $conexionBBDD->rollback();
        header("Location: ../documents/design.php?borrar=ko"); 
    }
    
}

?>