<?php 
    class Usuario
    {
        private $codusuario;
        private $contrasenia;
        private $cargo;
        
        public function setCodUsuario($codusuario){
            $this->codusuario = $codusuario;
        }

        public function getCodUsuario(){
            return $this->codusuario;
        }

        public function setContrasenia($contrasenia){
            $this->contrasenia = $contrasenia;
        }

        public function getContrasenia(){
            return $this->contrasenia;
        }

        public function setCargo($cargo){
            $this->cargo = $cargo;
        }

        public function getCargo(){
            return $this->cargo;
        }
    }
?>