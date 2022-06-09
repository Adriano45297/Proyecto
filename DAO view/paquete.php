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
                        <li><a class="active" href="#">Paquete</a></li>
                        <li><a href="reserva.php">Reserva</a></li>
                        <li><a href="../include/salir.php">Salir</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php
            include ('../DAO/PaqueteDAO.php');
            $dao = new PaqueteDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $paquete = new Paquete();
                    $paquete->setCodPaquete($_POST["txtcodpaquete"]);
                    $paquete->setCaracteristicas($_POST["txtcaracteristicas"]);
                    $paquete->setDuracion($_POST["txtduracion"]);
                    $paquete->setPrecio($_POST["txtprecio"]);
                    $i =  $dao->Agregar($paquete);
                    if ($i == 1) {
                        echo "<script>alert('Se agrego paquete');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se agrego paquete');</script>";	
                    }
                }
                else if (isset($_POST['btnEliminar'])) {			
                    $i = $dao->Eliminar($_POST["txtcodpaquete"]);
                    if ($i == 1) {
                        echo "<script>alert('Se elimino paquete');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se elimino paquete');</script>";	
                    }
                }
                else if (isset($_POST['btnActualizar'])) {
                    $paquete = new Paquete();
                    $paquete->setCodPaquete($_POST["txtcodpaquete"]);
                    $paquete->setCaracteristicas($_POST["txtcaracteristicas"]);
                    $paquete->setDuracion($_POST["txtduracion"]);
                    $paquete->setPrecio($_POST["txtprecio"]);
                    $i =  $dao->Actualizar($paquete);
                    if ($i == 1) {
                        echo "<script>alert('Se actualizo paquete');</script>";
                    }
                    else {
                        echo "<script>alert('Error: No se actualizo paquete');</script>";	
                    }
                }
            }
        ?>
        <div class="row">
            <div class="col-md-4">
                <form action="#" method="POST">
                    <br>
                    <h4>Paquetes</h4>
                    <p>CodPaquete: <input type="text" name="txtcodpaquete"></p>
                    <p>Caracteristicas:  <input type="text" name="txtcaracteristicas"></p>
                    <p>Duración:  <input type="text" name="txtduracion"></p>
                    <p>Precio:  <input type="text" name="txtprecio"></p>
                    <p>
                        <button name="btnAgregar">Agregar</button>
                        <button name="btnEliminar">Eliminar</button>
                        <button name="btnActualizar">Actualizar</button>
                    </p>
                    <br>
                    <h4>Buscar</h4>
                    <p>CodPaquete: <input type="text" name="txtbuscar"></p>
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
                    echo '<td><strong>codPaquete</strong></td>';
                    echo '<td><strong>caracteristicas</strong></td>';
                    echo '<td><strong>duracion</strong></td>';
                    echo '<td><strong>precio</strong></td>';
                    print_r($dao->Listar());
                    echo '</tr>';
                ?>
            </div>
        </div>
    </body>
</html>