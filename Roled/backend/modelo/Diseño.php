<?php

/**
 * Representa cada diseño realizado en la app por el usuario
 */
class Design {

    private $id_design;
    private $usuario;
    private $fecha;
    /**
     * Referencia de la ruta del diseño 
     */
    private $ruta;

    public function __construct($usuario, $fecha){
        $this->usuario=$usuario;
        $this->fecha=$fecha;
    }

    public function getId(){
        return $this->id_design;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getRuta(){
        return $ruta;
    }
    
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }

    public function setFecha($fecha){
        $this->fecha=$fecha;
    }


    public function setRuta($ruta){
        $this->ruta=$ruta;
    }


}


?>