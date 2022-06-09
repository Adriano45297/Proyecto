<?php 
    include 'IPaquete.php';
    include 'DataSource.php';
    include 'Paquete.php';

    class PaqueteDAO implements IPaquete
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT codPaquete,caracteristicas,duracion,precio FROM tPaquete");
            $paquete = null;
            $paquetes = array();

            foreach ($data_table as $clave=>$valor) {
                $paquete = new Paquete();
                $paquete->setCodPaquete( $data_table[$clave]["codPaquete"] );
                $paquete->setCaracteristicas( $data_table[$clave]["caracteristicas"] );
                $paquete->setDuracion( $data_table[$clave]["duracion"] );
                $paquete->setPrecio( $data_table[$clave]["precio"] );
                array_push($paquetes, $paquete);
            }

            foreach ($data_table as $row) {
                    echo '<tr>';
                    foreach ($row as $v) {
                            echo '<td>'.$v.'</td>';
                    }
                    echo '</tr>';
            }
        }
        
        public function Agregar(Paquete $paquete){
            $data_source = new DataSource();

            $sql = "INSERT INTO tPaquete VALUES (:codPaquete,:caracteristicas,:duracion,:precio)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':codPaquete'=>$paquete->getCodPaquete(),			
                ':caracteristicas'=>$paquete->getCaracteristicas(),
                ':duracion'=>$paquete->getDuracion(),
                ':precio'=>$paquete->getPrecio()
                )
            );
            return $resultado;		
        }

        public function Actualizar(Paquete $paquete){
            $data_source = new DataSource();
            $sql = "UPDATE tPaquete SET caracteristicas = :caracteristicas, duracion = :duracion, precio = :precio				
                    WHERE codPaquete = :codPaquete";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':caracteristicas'=>$paquete->getCaracteristicas(),
                ':duracion'=>$paquete->getDuracion(),
                ':precio'=> $paquete->getPrecio(),
                ':codPaquete'=>$paquete->getCodPaquete()
                )
            );
            return $resultado;
        }

        public function Eliminar($codpaquete){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM tPaquete WHERE codPaquete = :codPaquete",
                array(':codPaquete'=>$codpaquete));
            return $resultado;
        }

        public function Buscar($codpaquete){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT * FROM tPaquete WHERE codPaquete = '$codpaquete'");
            $paquete = null;
            $paquetes = array();

            foreach ($data_table as $clave=>$valor) {
                $paquete = new Paquete();
                $paquete->setCodPaquete( $data_table[$clave]["codPaquete"] );
                $paquete->setCaracteristicas( $data_table[$clave]["caracteristicas"] );
                $paquete->setDuracion( $data_table[$clave]["duracion"] );
                $paquete->setPrecio( $data_table[$clave]["precio"] );
                array_push($paquetes, $paquete);
            }
            
            echo "<h2>Resultado de busqueda</h2>";
            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>codPaquete</strong></td>';
            echo '<td><strong>caracteristicas</strong></td>';
            echo '<td><strong>duracion</strong></td>';
            echo '<td><strong>precio</strong></td>';
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