<?php 
    include 'ICliente.php';
    include_once 'DataSource.php';
    include 'Cliente.php';

    class ClienteDAO implements ICliente
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT codCliente,nombres,apellidos,nroIdentidad,edad,celular,email,usuario FROM tCliente");
            $cliente = null;
            $clientes = array();

            foreach ($data_table as $clave=>$valor) {
                $cliente = new Cliente();
                $cliente->setCodCliente( $data_table[$clave]["codCliente"] );
                $cliente->setNombres( $data_table[$clave]["nombres"] );
                $cliente->setApellidos( $data_table[$clave]["apellidos"] );
                $cliente->setNroIdentidad( $data_table[$clave]["nroIdentidad"] );
                $cliente->setEdad( $data_table[$clave]["edad"] );			
                $cliente->setCelular( $data_table[$clave]["celular"] );
                $cliente->setEmail( $data_table[$clave]["email"] );
                $cliente->setUsuario( $data_table[$clave]["usuario"] );
                array_push($clientes, $cliente);
            }

            foreach ($data_table as $row) {
                    echo '<tr>';
                    foreach ($row as $v) {
                            echo '<td>'.$v.'</td>';
                    }
                    echo '</tr>';
            }
        }
        
        public function Agregar(Cliente $cliente){
            $data_source = new DataSource();

            $sql = "INSERT INTO tCliente VALUES (:codCliente,:nombres,:apellidos,:nroIdentidad,:edad,:celular,:email,:usuario)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':codCliente'=>$cliente->getCodCliente(),			
                ':nombres'=>$cliente->getNombres(),
                ':apellidos'=>$cliente->getApellidos(),
                ':nroIdentidad'=>$cliente->getNroIdentidad(),
                ':edad'=>$cliente->getEdad(),			
                ':celular'=>$cliente->getCelular(),
                ':email'=>$cliente->getEmail(),
                ':usuario'=>$cliente->getUsuario()
                )
            );
            return $resultado;		
        }

        public function Actualizar(Cliente $cliente){
            $data_source = new DataSource();
            $sql = "UPDATE tCliente SET nombres = :nombres, apellidos = :apellidos, nroIdentidad = :nroIdentidad, edad = :edad, celular = :celular, email = :email, usuario = :usuario				
                    WHERE codCliente = :codCliente";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':nombres'=>$cliente->getNombres(),
                ':apellidos'=>$cliente->getApellidos(),
                ':nroIdentidad'=> $cliente->getNroIdentidad(),
                ':edad'=>$cliente->getEdad(),			
                ':celular'=>$cliente->getCelular(),
                ':email'=>$cliente->getEmail(),
                ':usuario'=>$cliente->getUsuario(),
                ':codCliente'=>$cliente->getCodCliente()
                )
            );
            return $resultado;
        }

        public function Eliminar($codcliente){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM tCliente WHERE codCliente = :codCliente",
                array(':codCliente'=>$codcliente));
            return $resultado;
        }

        public function Buscar($codcliente){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT * FROM tCliente WHERE codCliente = '$codcliente'");
            $cliente = null;
            $clientes = array();

            foreach ($data_table as $clave=>$valor) {
                $cliente = new Cliente();
                $cliente->setCodCliente( $data_table[$clave]["codCliente"] );
                $cliente->setNombres( $data_table[$clave]["nombres"] );
                $cliente->setApellidos( $data_table[$clave]["apellidos"] );
                $cliente->setNroIdentidad( $data_table[$clave]["nroIdentidad"] );
                $cliente->setEdad( $data_table[$clave]["edad"] );			
                $cliente->setCelular( $data_table[$clave]["celular"] );
                $cliente->setEmail( $data_table[$clave]["email"] );
                $cliente->setUsuario( $data_table[$clave]["usuario"] );
                array_push($clientes, $cliente);
            }
            
            echo "<h2>Resultado de busqueda</h2>";
            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>codCliente</strong></td>';
            echo '<td><strong>nombres</strong></td>';
            echo '<td><strong>apellidos</strong></td>';
            echo '<td><strong>nroIdentidad</strong></td>';
            echo '<td><strong>edad</strong></td>';
            echo '<td><strong>celular</strong></td>';
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