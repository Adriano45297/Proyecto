<?php 
    interface IPaquete
    {
        public function Listar();	
        public function Agregar(Paquete $paquete);
        public function Actualizar(Paquete $paquete);
        public function Eliminar($codpaquete);
    }
?>