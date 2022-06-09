<?php 
    interface IReserva
    {
        public function Listar();	
        public function Agregar(Reserva $reserva);
        public function Actualizar(Reserva $reserva);
        public function Eliminar($codreserva);
    }
?>