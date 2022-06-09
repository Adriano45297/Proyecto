<?php
    include '../include/conexion.php';
    $link = conectarse();
    session_start();
    $usuario = $_SESSION['username'];

    if(!isset($usuario)){
        header("location: ../login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/style.css" rel="stylesheet">
		<title>Administrar</title>
	</head>
    <body>
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <h1>Eureka Expeditions</h1>
                    <ul>
                        <li><a class="active" href="#">Usuario</a></li>
                        <li><a href="cliente.php">Cliente</a></li>
                        <li><a href="empleado.php">Empleado</a></li>
                        <li><a href="paquete.php">Paquete</a></li>
                        <li><a href="reserva.php">Reserva</a></li>
                        <li><a href="../include/salir.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php
            include ('../DAO/UsuarioDAO.php');
            $dao = new UsuarioDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $usuario = new Usuario();
                    $usuario->setCodUsuario($_POST["txtcodusuario"]);
                    $usuario->setContrasenia($_POST["txtcontrasenia"]);
                    $usuario->setCargo($_POST["txtcargo"]);
                    $i =  $dao->Agregar($usuario);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego usuario');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego usuario');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtcodusuario"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino usuario');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino usuario');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $usuario = new Usuario();
                    $usuario->setCodUsuario($_POST["txtcodusuario"]);
                    $usuario->setContrasenia($_POST["txtcontrasenia"]);
                    $usuario->setCargo($_POST["txtcargo"]);
                    $i =  $dao->Actualizar($usuario);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo usuario');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo usuario');</script>";	
                    }
                }
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <h4>Usuarios</h4>
                    <p>Usuario: <input type="text" name="txtcodusuario"></p>
                    <p>Contrasenia:  <input type="text" name="txtcontrasenia"></p>
                    <p>Cargo:  <input type="text" name="txtcargo"></p>
                    <p>
                        <button name="btnAgregar">Agregar</button>
                        <button name="btnEliminar">Eliminar</button>
                        <button name="btnActualizar">Actualizar</button>
                    </p>
                    <br>
                    <h4>Buscar</h4>
                    <p>Usuario: <input type="text" name="txtbuscar"></p>
                    <p><button name="btnbuscar">Buscar</button></p>
                    <?php
                        if(isset($_POST['btnbuscar']))
                        {
                            $dao->Buscar($_POST['txtbuscar']);
                        }
                    ?>
                </form>
            </div>
            <div class="col-md-8">
                <?php
                    echo "<br><br><h5>Listar</h5><br>";
                    echo '<table class="tabla">';
                    echo '<tr>';
                    echo '<td><strong>CodUsuario</strong></td>';
                    echo '<td><strong>Contrasenia</strong></td>';
                    echo '<td><strong>Cargo</strong></td>';
                    print_r($dao->Listar());
                    echo '</tr>';
                ?>
            </div>
        </div>
    </body>
</html>