<?php 
    class Reserva
    {
        private $codreserva;
        private $codcliente;
        private $codpaquete;
        private $fechainicio;
        private $fechafin;
        private $cantidad;
        
        public function setCodReserva($codreserva){
            $this->codreserva = $codreserva;
        }

        public function getCodReserva(){
            return $this->codreserva;
        }

        public function setCodCliente($codcliente){
            $this->codcliente = $codcliente;
        }

        public function getCodCliente(){
            return $this->codcliente;
        }

        public function setCodPaquete($codpaquete){
            $this->codpaquete = $codpaquete;
        }

        public function getCodPaquete(){
            return $this->codpaquete;
        }

        public function setFechaInicio($fechainicio){
            $this->fechainicio = $fechainicio;
        }

        public function getFechaInicio(){
            return $this->fechainicio;
        }

        public function setFechaFin($fechafin){
            $this->fechafin = $fechafin;
        }

        public function getFechaFin(){
            return $this->fechafin;
        }

        public function setCantidad($cantidad){
            $this->cantidad = $cantidad;
        }

        public function getCantidad(){
            return $this->cantidad;
        }
    }
?>