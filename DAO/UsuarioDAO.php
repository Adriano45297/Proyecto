<?php 
    include 'IUsuario.php';
    include_once 'DataSource.php';
    include 'Usuario.php';

    class UsuarioDAO implements IUsuario
    {
        public function Listar(){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT codUsuario,contrasenia,cargo FROM tUsuario");
            $usuario = null;
            $usuarios = array();

            foreach ($data_table as $clave=>$valor) {
                $usuario = new Usuario();
                $usuario->setCodUsuario( $data_table[$clave]["codUsuario"] );
                $usuario->setContrasenia( $data_table[$clave]["contrasenia"] );
                $usuario->setCargo( $data_table[$clave]["cargo"] );
                array_push($usuarios, $usuario);
            }

            foreach ($data_table as $row) {
                    echo '<tr>';
                    foreach ($row as $v) {
                            echo '<td>'.$v.'</td>';
                    }
                    echo '</tr>';
            }
        }
        
        public function Agregar(Usuario $usuario){
            $data_source = new DataSource();

            $sql = "INSERT INTO tUsuario VALUES (:usuario,:contrasenia,:cargo)";

            $resultado = $data_source->ejecutarActualizacion($sql,array(
                ':usuario'=>$usuario->getCodUsuario(),			
                ':contrasenia'=>$usuario->getContrasenia(),
                ':cargo'=>$usuario->getCargo()
                )
            );
            return $resultado;		
        }

        public function Actualizar(Usuario $usuario){
            $data_source = new DataSource();
            $sql = "UPDATE tUsuario SET contrasenia = :contrasenia, cargo = :cargo				
                    WHERE codUsuario = :codUsuario";
            $resultado = $data_source->ejecutarActualizacion($sql,array(			
                ':contrasenia'=>$usuario->getContrasenia(),
                ':cargo'=>$usuario->getCargo(),
                ':codUsuario'=>$usuario->getCodUsuario()
                )
            );
            return $resultado;
        }

        public function Eliminar($usuario){
            $data_source = new DataSource();
            $resultado = $data_source->ejecutarActualizacion("DELETE FROM tUsuario WHERE codUsuario = :codUsuario",
                array(':codUsuario'=>$usuario));
            return $resultado;
        }

        public function Buscar($usuario){
            $data_source = new DataSource();
            $data_table = $data_source->ejecutarConsulta("SELECT * FROM tUsuario WHERE codUsuario = '$usuario'");
            $usuario = null;
            $usuarios = array();

            foreach ($data_table as $clave=>$valor) {
                $usuario = new Usuario();
                $usuario->setCodUsuario( $data_table[$clave]["codUsuario"] );
                $usuario->setContrasenia( $data_table[$clave]["contrasenia"] );
                $usuario->setCargo( $data_table[$clave]["cargo"] );
                array_push($usuarios, $usuario);
            }
            
            echo "<h2>Resultado de busqueda</h2>";
            echo '<table class="tabla">';
            echo '<tr>';
            echo '<td><strong>CodUsuario</strong></td>';
            echo '<td><strong>Contrasenia</strong></td>';
            echo '<td><strong>Cargo</strong></td>';
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