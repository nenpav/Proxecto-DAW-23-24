<?php

    class Usuario{

        private $id_usuario;
        private $username;
        private $email;
        private $password;
        private $tipo;
        private $fecha_nac;

        public function __construct($username,$email,$password,$tipo,$fecha_nac){
            $this->username=$username;
            $this->email=$email;
            $this->password=$password;
            $this->tipo=$tipo;
            $this->fecha_nac=$fecha_nac;
        }

        public function getId(){
            return $this->id_usuario;
        }

        public function getUsername(){
            return $this->username;
        }

        public function getEmail(){
            return $this->email;
        }

        public function getPassword(){
            return $this->password;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function getFechaNac(){
            return $this->fecha_nac;
        }

        public function setUsernam($username){
            $this->username=$username;
        }

        public function setPassword($password){
            $this->password=$password;
        }

        public function setFechaNac($fecha_nac){
            $this->fecha_nac=$fecha_nac;
        }


    }

?>