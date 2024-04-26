<?php

/**
 * Representa al dispositivo POV
 */
class Dispositivo {

    private $id_dispositivo;
    
    private $usuario;

    private $estado;

    
    public function __construct($usuario,$estado){
        $this->usuario = $usuario;
        $this->estado = $estado;
    }

    public function getId(){
        return $this->id_dispositivo;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getEstado(){
        return $this->estado;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setEstado($estado){
        $this->estado = $estado;
    }

}



?>