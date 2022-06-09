<?php 
    class Paquete
    {
        private $codpaquete;
        private $caracteristicas;
        private $duracion;
        private $precio;
        
        public function setCodPaquete($codpaquete){
            $this->codpaquete = $codpaquete;
        }

        public function getCodPaquete(){
            return $this->codpaquete;
        }

        public function setCaracteristicas($caracteristicas){
            $this->caracteristicas = $caracteristicas;
        }

        public function getCaracteristicas(){
            return $this->caracteristicas;
        }

        public function setDuracion($duracion){
            $this->duracion = $duracion;
        }

        public function getDuracion(){
            return $this->duracion;
        }	

        public function setPrecio($precio){
            $this->precio = $precio;
        }

        public function getPrecio(){
            return $this->precio;
        }
    }
?>