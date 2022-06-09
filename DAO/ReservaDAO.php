<?php 
    include 'IReserva.php';
    include 'DataSource.php';
    include 'Reserva.php';

    class ReservaDAO implements IReserva
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT codReserva,codCliente,codPaquete,fechaInicio,fechaFin,cantidad FROM tReserva");
            $reserva = null;
            $reservas = array();

            foreach ($data_table as $clave=>$valor) {
                $reserva = new Reserva();
                $reserva->setCodReserva( $data_table[$clave]["codReserva"] );
                $reserva->setCodCliente( $data_table[$clave]["codCliente"] );
                $reserva->setCodPaquete( $data_table[$clave]["codPaquete"] );
                $reserva->setFechaInicio( $data_table[$clave]["fechaInicio"] );			
                $reserva->setFechaFin( $data_table[$clave]["fechaFin"] );
                $reserva->setCantidad( $data_table[$clave]["cantidad"] );
                array_push($reservas, $reserva);
            }

            foreach ($data_table as $row) {
                    echo '<tr>';
                    foreach ($row as $v) {
                            echo '<td>'.$v.'</td>';
                    }
                    echo '</tr>';
            }
        }
        
        public function Agregar(Reserva $reserva){
            $data_source = new DataSource();

            $sql = "INSERT INTO tReserva VALUES (:codReserva,:codCliente,:codPaquete,:fechaInicio,:fechaFin,:cantidad)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':codReserva'=>$reserva->getCodReserva(),			
                ':codCliente'=>$reserva->getCodCliente(),
                ':codPaquete'=>$reserva->getCodPaquete(),
                ':fechaInicio'=>$reserva->getFechaInicio(),			
                ':fechaFin'=>$reserva->getFechaFin(),
                ':cantidad'=>$reserva->getCantidad()
                )
            );
            return $resultado;		
        }

        public function Actualizar(Reserva $reserva){
            $data_source = new DataSource();
            $sql = "UPDATE tReserva SET codCliente = :codCliente, codPaquete = :codPaquete, fechaInicio = :fechaInicio, fechaFin = :fechaFin, cantidad = :cantidad				
                    WHERE codReserva = :codReserva";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':codCliente'=>$reserva->getCodCliente(),
                ':codPaquete'=> $reserva->getCodPaquete(),
                ':fechaInicio'=>$reserva->getFechaInicio(),			
                ':fechaFin'=>$reserva->getFechaFin(),
                ':cantidad'=>$reserva->getCantidad(),
                ':codReserva'=>$reserva->getCodReserva()
                )
            );
            return $resultado;
        }

        public function Eliminar($codreserva){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM tReserva WHERE codReserva = :codReserva",
                array(':codReserva'=>$codreserva));
            return $resultado;
        }

        public function Buscar($codreserva){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT * FROM tReserva WHERE codReserva = '$codreserva'");
            $reserva = null;
            $reservas = array();

            foreach ($data_table as $clave=>$valor) {
                $reserva = new Reserva();
                $reserva->setCodReserva( $data_table[$clave]["codReserva"] );
                $reserva->setCodCliente( $data_table[$clave]["codCliente"] );
                $reserva->setCodPaquete( $data_table[$clave]["codPaquete"] );
                $reserva->setFechaInicio( $data_table[$clave]["fechaInicio"] );			
                $reserva->setFechaFin( $data_table[$clave]["fechaFin"] );
                $reserva->setCantidad( $data_table[$clave]["cantidad"] );
                array_push($reservas, $reserva);
            }
            
            echo "<h2>Resultado de busqueda</h2>";
            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>codReserva</strong></td>';
            echo '<td><strong>codCliente</strong></td>';
            echo '<td><strong>codPaquete</strong></td>';
            echo '<td><strong>fechaInicio</strong></td>';
            echo '<td><strong>fechaFin</strong></td>';
            echo '<td><strong>cantidad</strong></td>';
            echo '</tr>';
            foreach ($data_table as $row) {
                    echo '<tr>';
                    foreach ($row as $v) {
                            echo '<td>'.$v.'</td>';
                    }
                    echo '</tr>';
            }
            echo '</table>';
        }
    }
?>