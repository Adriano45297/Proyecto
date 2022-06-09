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
                        <li><a href="empleado.php">Empleado</a></li>
                        <li><a href="paquete.php">Paquete</a></li>
                        <li><a class="active" href="#">Reserva</a></li>
                        <li><a href="../include/salir.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php
            include ('../DAO/ReservaDAO.php');
            $dao = new ReservaDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $reserva = new Reserva();
                    $reserva->setCodCliente($_POST["txtcodcliente"]);
                    $reserva->setCodPaquete($_POST["txtcodpaquete"]);
                    $reserva->setFechaInicio($_POST["txtfechainicio"]);
                    $reserva->setFechaFin($_POST["txtfechafin"]);
                    $reserva->setCantidad($_POST["txtcantidad"]);
                    $i =  $dao->Agregar($reserva);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego reserva');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego reserva');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtcodreserva"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino reserva');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino reserva');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $reserva = new Reserva();
                    $reserva->setCodReserva($_POST["txtcodreserva"]);
                    $reserva->setCodCliente($_POST["txtcodcliente"]);
                    $reserva->setCodPaquete($_POST["txtcodpaquete"]);
                    $reserva->setFechaInicio($_POST["txtfechainicio"]);
                    $reserva->setFechaFin($_POST["txtfechafin"]);
                    $reserva->setCantidad($_POST["txtcantidad"]);
                    $i =  $dao->Actualizar($reserva);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo reserva');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo reserva');</script>";	
                    }
                }
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <h4>Reservas</h4>
                    <p>CodReserva: <input type="text" name="txtcodreserva"></p>
                    <p>CodCliente:  <input type="text" name="txtcodcliente"></p>
                    <p>CodPaquete:  <input type="text" name="txtcodpaquete"></p>
                    <p>FechaInicio:  <input type="text" name="txtfechainicio"></p>
                    <p>FechaFin:  <input type="text" name="txtfechafin"></p>
                    <p>Cantidad:  <input type="text" name="txtcantidad"></p>
                    <p>
                        <button name="btnAgregar">Agregar</button>
                        <button name="btnEliminar">Eliminar</button>
                        <button name="btnActualizar">Actualizar</button>
                    </p>
                    <br>
                    <h4>Buscar</h4>
                    <p>CodReserva: <input type="text" name="txtbuscar"></p>
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
                    echo '<td><strong>codReserva</strong></td>';
                    echo '<td><strong>codCliente</strong></td>';
                    echo '<td><strong>codPaquete</strong></td>';
                    echo '<td><strong>fechaInicio</strong></td>';
                    echo '<td><strong>fechaFin</strong></td>';
                    echo '<td><strong>cantidad</strong></td>';
                    print_r($dao->Listar());
                    echo '</tr>';
                ?>
            </div>
        </div>
    </body>
</html>