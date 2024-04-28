<?php

/**
 * Crea la conexión con la base de datos
 */
    class ConexionBBDD{

        private $conexionBBDD;

        public function __construct($host, $user, $pwd, $bbdd){
            $this->conexionBBDD = new mysqli($host,$user,$pwd,$bbdd);
            if($this->conexionBBDD->connect_error){
                die("No se ha podido establecer la conexión");
            }
        }

        public function getConexion(){
            return $this->conexionBBDD;
        }

        public function deleteConexion(){
            $this->conexionBBDD->close();
        }

    }

?>