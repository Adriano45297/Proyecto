<?php 
    class Empleado
    {
        private $codempleado;
        private $nombres;
        private $apellidos;
        private $nroidentidad;
        private $email;
        private $usuario;
        
        public function setCodEmpleado($codempleado){
            $this->codempleado = $codempleado;
        }

        public function getCodEmpleado(){
            return $this->codempleado;
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