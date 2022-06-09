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
		<meta name="description" content="Source code generated using layoutit.com">
		<meta name="author" content="LayoutIt!">
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
                        <li><a href="usuario.php">Usuario</a></li>
                        <li><a href="cliente.php">Cliente</a></li>
                        <li><a class="active" href="#">Empleado</a></li>
                        <li><a href="paquete.php">Paquete</a></li>
                        <li><a href="reserva.php">Reserva</a></li>
                        <li><a href="../include/salir.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php
            include ('../DAO/EmpleadoDAO.php');
            $dao = new EmpleadoDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $empleado = new Empleado();
                    $empleado->setCodEmpleado($_POST["txtcodempleado"]);
                    $empleado->setNombres($_POST["txtnombres"]);
                    $empleado->setApellidos($_POST["txtapellidos"]);
                    $empleado->setNroIdentidad($_POST["txtnroidentidad"]);
                    $empleado->setEmail($_POST["txtemail"]);
                    $empleado->setUsuario($_POST["txtusuario"]);
                    $i =  $dao->Agregar($empleado);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego empleado');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego empleado');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtcodempleado"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino empleado');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino empleado');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $empleado = new Empleado();
                    $empleado->setCodEmpleado($_POST["txtcodempleado"]);
                    $empleado->setNombres($_POST["txtnombres"]);
                    $empleado->setApellidos($_POST["txtapellidos"]);
                    $empleado->setNroIdentidad($_POST["txtnroidentidad"]);
                    $empleado->setEmail($_POST["txtemail"]);
                    $empleado->setUsuario($_POST["txtusuario"]);
                    $i =  $dao->Actualizar($empleado);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo empleado');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo empleado');</script>";	
                    }
                }
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <h4>Empleados</h4>
                    <p>CodEmpleado: <input type="text" name="txtcodempleado"></p>
                    <p>Nombres:  <input type="text" name="txtnombres"></p>
                    <p>Apellidos:  <input type="text" name="txtapellidos"></p>
                    <p>NroIdentidad:  <input type="text" name="txtnroidentidad"></p>
                    <p>Email:  <input type="text" name="txtemail"></p>
                    <p>Usuario:  <input type="text" name="txtusuario"></p>
                    <p>
                        <button name="btnAgregar">Agregar</button>
                        <button name="btnEliminar">Eliminar</button>
                        <button name="btnActualizar">Actualizar</button>
                    </p>
                    <br>
                    <h4>Buscar</h4>
                    <p>CodEmpleado: <input type="text" name="txtbuscar"></p>
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
                    echo '<td><strong>codEmpleado</strong></td>';
                    echo '<td><strong>nombres</strong></td>';
                    echo '<td><strong>apellidos</strong></td>';
                    echo '<td><strong>nroIdentidad</strong></td>';
                    echo '<td><strong>email</strong></td>';
                    echo '<td><strong>usuario</strong></td>';
                    print_r($dao->Listar());
                    echo '</tr>';
                ?>
            </div>
        </div>
    </body>
</html>