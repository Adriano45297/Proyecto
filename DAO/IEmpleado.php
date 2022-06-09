<?php 
    interface IEmpleado
    {
        public function Listar();	
        public function Agregar(Empleado $empleado);
        public function Actualizar(Empleado $empleado);
        public function Eliminar($codempleado);
    }
?>