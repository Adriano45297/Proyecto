<?php 
    class Cliente
    {
        private $codcliente;
        private $nombres;
        private $apellidos;
        private $nroidentidad;
        private $edad;
        private $celular;
        private $email;
        private $usuario;
        
        public function setCodCliente($codcliente){
            $this->codcliente = $codcliente;
        }

        public function getCodCliente(){
            return $this->codcliente;
        }

        public function setNombres($nombres){
            $this->nombres = $nombres;
        }

        public function getNombres(){
            return $this->nombres;
        }

        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
        }

        public function getApellidos(){
            return $this->apellidos;
        }	

        public function setNroIdentidad($nroidentidad){
            $this->nroidentidad = $nroidentidad;
        }

        public function getNroIdentidad(){
            return $this->nroidentidad;
        }

        public function setEdad($edad){
            $this->edad = $edad;
        }

        public function getEdad(){
            return $this->edad;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function getUsuario(){
            return $this->usuario;
        }
    }
?>