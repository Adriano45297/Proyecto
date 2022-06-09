<?php 
    include 'IEmpleado.php';
    include 'DataSource.php';
    include 'Empleado.php';

    class EmpleadoDAO implements IEmpleado
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT codEmpleado,nombres,apellidos,nroIdentidad,email,usuario FROM tEmpleado");
            $empleado = null;
            $empleados = array();

            foreach ($data_table as $clave=>$valor) {
                $empleado = new Empleado();
                $empleado->setCodEmpleado( $data_table[$clave]["codEmpleado"] );
                $empleado->setNombres( $data_table[$clave]["nombres"] );
                $empleado->setApellidos( $data_table[$clave]["apellidos"] );
                $empleado->setNroIdentidad( $data_table[$clave]["nroIdentidad"] );
                $empleado->setEmail( $data_table[$clave]["email"] );
                $empleado->setUsuario( $data_table[$clave]["usuario"] );
                array_push($empleados, $empleado);
            }

            foreach ($data_table as $row) {
                    echo '<tr>';
                    foreach ($row as $v) {
                            echo '<td>'.$v.'</td>';
                    }
                    echo '</tr>';
            }
        }
        
        public function Agregar(Empleado $empleado){
            $data_source = new DataSource();

            $sql = "INSERT INTO tEmpleado VALUES (:codEmpleado,:nombres,:apellidos,:nroIdentidad,:email,:usuario)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':codEmpleado'=>$empleado->getCodEmpleado(),			
                ':nombres'=>$empleado->getNombres(),
                ':apellidos'=>$empleado->getApellidos(),
                ':nroIdentidad'=>$empleado->getNroIdentidad(),
                ':email'=>$empleado->getEmail(),
                ':usuario'=>$empleado->getUsuario()
                )
            );
            return $resultado;		
        }

        public function Actualizar(Empleado $empleado){
            $data_source = new DataSource();
            $sql = "UPDATE tEmpleado SET nombres = :nombres, apellidos = :apellidos, nroIdentidad = :nroIdentidad, email = :email, usuario = :usuario				
                    WHERE codEmpleado = :codEmpleado";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':nombres'=>$empleado->getNombres(),
                ':apellidos'=>$empleado->getApellidos(),
                ':nroIdentidad'=> $empleado->getNroIdentidad(),
                ':email'=>$empleado->getEmail(),
                ':usuario'=>$empleado->getUsuario(),
                ':codEmpleado'=>$empleado->getCodEmpleado()
                )
            );
            return $resultado;
        }

        public function Eliminar($codempleado){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM tEmpleado WHERE codEmpleado = :codEmpleado",
                array(':codEmpleado'=>$codempleado));
            return $resultado;
        }

        public function Buscar($codempleado){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT * FROM tEmpleado WHERE codEmpleado = '$codempleado'");
            $empleado = null;
            $empleados = array();

            foreach ($data_table as $clave=>$valor) {
                $empleado = new Empleado();
                $empleado->setCodEmpleado( $data_table[$clave]["codEmpleado"] );
                $empleado->setNombres( $data_table[$clave]["nombres"] );
                $empleado->setApellidos( $data_table[$clave]["apellidos"] );
                $empleado->setNroIdentidad( $data_table[$clave]["nroIdentidad"] );
                $empleado->setEmail( $data_table[$clave]["email"] );
                $empleado->setUsuario( $data_table[$clave]["usuario"] );
                array_push($empleados, $empleado);
            }
            
            echo "<h2>Resultado de busqueda</h2>";
            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>codEmpleado</strong></td>';
            echo '<td><strong>nombres</strong></td>';
            echo '<td><strong>apellidos</strong></td>';
            echo '<td><strong>nroIdentidad</strong></td>';
            echo '<td><strong>email</strong></td>';
            echo '<td><strong>usuario</strong></td>';
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