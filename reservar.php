<?php
    include 'include/conexion.php';
    $link = conectarse();
    session_start();
    $usuario = $_SESSION['username'];

    if(!isset($usuario)){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="stylesheet" href="css/inicio.css">
        <link rel="stylesheet" href="css/redes.css">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<title>Reservar</title>
	</head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="img/logo1.png" alt="" width="150" height="70" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Paquetes
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="caminoinca.php">Camino Inca</a></li>
                                <li><a class="dropdown-item" href="vallesagrado.php">Valle Sagrado</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="ausangate.php">Ausangate</a></li>
                                <li><a class="dropdown-item" href="machupicchu.php">Machu Picchu</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="Msietecolores.php">Montaña de 7 colores</a></li>
                                <li><a class="dropdown-item" href="Intipunku.php">Inti Punku</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="mistico.php">Mistico</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aves.php">Aves</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="rs.php">Responsabilidad Social</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <?php
                            if(!isset($_SESSION['username']))
                            {
                                echo '  <li class="nav-item">
                                            <a class="nav-link" href="login.php">Iniciar sesion</a>
                                        </li>';
                            }
                            else
                            {
                                $usuario = $_SESSION['username'];
                                echo "<li class='nav-item dropdown'>
                                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button'
                                            data-bs-toggle='dropdown' aria-expanded='false'>
                                            $usuario
                                        </a>
                                        <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                            <li><a class='dropdown-item' href='reservar.php'>Reservar</a></li>
                                            <li><a class='dropdown-item' href='include/salir.php'>Cerrar sesion</a></li>
                                        </ul>
                                    </li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
            include ('DAO/ReservaDAO.php');
            $dao = new ReservaDAO();
            if($_POST){
                if(isset($_POST['btnAgregar'])) {
                    $reserva = new Reserva();
                    $reserva->setCodReserva($_POST["txtcodreserva"]);
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
            }
        ?>
        <div class="row">
            <div class="col-md-12">
                <form action="#" method="POST">
                    <input type="hidden" value="" name="txtcodreserva">
                        
                        <?php
                            $consulta = "SELECT codCliente FROM tCliente WHERE usuario='$usuario'";
                            $resultado = mysqli_query($link, $consulta);
                            $array = mysqli_fetch_array($resultado);

                            $cliente=$array['codCliente'];
                            echo "<input type='hidden' class='form-control' placeholder='$cliente' name='txtcodcliente' value='$cliente'>";
                        ?>
                        
                    <div class="form-group">
                        <label>Paquete: </label>
                        <br>
                        <select class="form-control" name="txtcodpaquete">
                            <option selected>Escoja el paquete</option>
                            <option value="P0001">Camino Inca</option>
                            <option value="P0002">Valle Sagrado</option>
                            <option value="P0003">Ausangate</option>
                            <option value="P0004">Machu Picchu</option>
                            <option value="P0005">Montaña de 7 colores</option>
                            <option value="P0006">Inti Punku</option>
                            <option value="P0007">Retiro Espiritual</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha inicio: </label>
                        <input type="date" class="form-control" name="txtfechainicio">
                    </div>
                    <div class="form-group">
                        <label>Fecha fin: </label>
                        <input type="date" class="form-control" name="txtfechafin">
                    </div>
                    <div class="form-group">
                        <label>Cantidad: </label>
                        <input type="number" class="form-control" placeholder="Establesca la cantidad" name="txtcantidad">
                    </div>
                    <div>
                        <button name="btnAgregar">Reservar</button>
                    </div>
                </form>	
            </div>
        </div>
        <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="img/logo1.png" alt="Logo de SLee Dw">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>CONTACTANOS</h2>
                <p>Gmail: EurekaExpedition@gmail.com</p>
                <p>Celular: +51 974 706 919</p>
                <p>Ubicaion: Ollantaytambo-Urubamba-Cusco</p>
                <a href="manualusuario.php">Manual de usuario</a>
                <style>
                    a{text-decoration: none; color: red;}
                </style>
                <p></p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>
                &copy; 2022 <b>Autores</b> - Joel Wenceslao Bejar Espinoza - Julio César Maza García - Miguel Adriano Florez Mejia - Edy nestor fuentes avilés
            </small>
        </div>
    </footer>
        <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    </body>
</html>