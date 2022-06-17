<?php
    include 'include/conexion.php';
    $link = conectarse();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eureka Expeditions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/inicio.css">
    <link rel="stylesheet" href="css/redes.css">
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
                        <a class="nav-link active" aria-current="page" href="#">Inicio</a>
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
    <h2>EUREKA EXPEDITIONS PERU</h2>
    <h6>Mytical jorney</h6>
    <style>
        h6 {
            text-align: center;
        }
    </style>
    <br>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/carrusel1.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carrusel2.png" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="img/carrusel3.png" class="d-block w-100" alt="...">
            </div>
        </div>
        <br><br><br><br>
        <h1>Todos quieren vivir en la cima de la montaña, pero la felicidad y el crecimiento suceden mientras se sube
        </h1>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="coll">
            <div class="contenedor">
                <figure>
                    <img src="img/imagen1.jpg">
                    <div class="capa">
                        <h3>Cultura</h3>
                        <p>Con la agencia Eureka Expeditions tendras las mejores experiencias a la hora de Viajar porque
                            no solamente
                            iras a visitar paisajes si no tambien, tendras choques culturales, veras todo tipo de
                            culturas que tiene
                            cada uno de nuestras ciudades.
                        </p>
                    </div>
                </figure>

            </div>
        </div>

        <div class="col">
            <div class="contenedor">
                <figure>
                    <img src="img/imagen2.jpg">
                    <div class="capa">
                        <h3>Naturaleza</h3>
                        <p>vas a ver toda la naturaleza del lugar no solamente plantas que tienen miles de historia, si
                            no tambien
                            veras animales, que son representativos depen de la zona que vaya a visitar, y lo mas magico
                            que ver seran las Aves
                            donde cada uno de ello tiene una historia mistica y inolvidable.
                        </p>
                    </div>
                </figure>

            </div>
        </div>

    </div>
    
    <h1>CAMINO INCA Y TREKING </h1>
    <P class="info">Viajar por Perú es un poco más complicado que otros países. Reserva uno de nuestros paquetes completos y deja que
        EurekaExpedition se encargue de toda la difícil logística y las reservas. Tenemos un montón de opciones que
        incluyen todos los aspectos más destacados de Perú, incluyendo camino inca, el Machu Pichu. Y si nuestros
        itinerarios publicados no son
        perfectos, podemos personalizarlos para ti. ¡Te tenemos cubierto!</P>

    <style>
        h1 {
            width: 200;
            height: 200;
        }
    </style>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <img src="img/precio1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Camino Inca</h5>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-dark">4 dias y 3 noches</li>
                        <li class="list-group-item list-group-item-dark">Hasta 12 personas</li>
                        <li class="list-group-item list-group-item-dark">Nivel: Dificil</li>
                        <a class="btn btn-info" href="caminoinca.php" role="button">Mas informacion</a>
                    </ul>
                </div>
            </div>


        </div>
        <div class="col">
            <div class="card">
                <img src="img/precio2.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Apu Ausangate</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-dark">3 dias y 2 noches</li>
                        <li class="list-group-item list-group-item-dark">Hasta 12 personas</li>
                        <li class="list-group-item list-group-item-dark">Nivel: Moderado</li>
                        <a class="btn btn-info" href="ausangate.php" role="button">Mas informacion</a>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <br><br><br><br>
    <h1>MACHU PICCHU VALLE SAGRADO</h1>
    <P class="info"> Machu Picchu es una ciudadela inca ubicada en las alturas de las montañas de los Andes en Perú, sobre el valle
        del río Urubamba. Se construyó en el siglo XV y luego fue abandonada, y es famosa por sus sofisticadas paredes
        de piedra seca que combinan enormes bloques sin el uso de un mortero, los edificios fascinantes que se
        relacionan con las alineaciones astronómicas y sus vistas panorámicas. El uso exacto que tuvo sigue siendo un
        misterio.</P>
    <style>
        h1 {
            text-align: center;
        }
    </style>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <img src="img/precio3.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Valle Sagrado</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-dark">1 dia</li>
                        <li class="list-group-item list-group-item-dark">Hasta 12 personas</li>
                        <li class="list-group-item list-group-item-dark">Nivel: Dificil</li>
                        <a class="btn btn-info" href="vallesagrado.php" role="button">Mas informacion</a>
                    </ul>
                </div>
            </div>


        </div>
        <div class="col">
            <div class="card">
                <img src="img/precio4.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Machu Picchu </h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-dark">1 dia 1 noche</li>
                        <li class="list-group-item list-group-item-dark">Hasta 12 personas</li>
                        <li class="list-group-item list-group-item-dark">Nivel: Moderado</li>
                        <a class="btn btn-info"  href="machupicchu.php" role="button">Mas informacion</a>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <br><br><br><br>
    <h1>TOURS CULTURALES</h1>
    <P class="info">Nuestros recorridos culturales están diseñados para ofrecer lo más destacado de nuestra región. Hay mucho que ver
        en la ciudad y el valle circundante, para aprender más sobre nuestra historia y cultura. ¡Y las vistas son
        impresionantes! Nuestros tours culturales pueden realizarse en uno o dos días e incluyen todo lo que hace
        especial a Alpaca Expeditions: un guía turístico de primera categoría y un servicio impecable.</P>
    <style>
        h1 {
            text-align: center;
        }
    </style>
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card">
                <img src="img/precio5.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Montaña de 7 colores</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-dark">1 dia</li>
                        <li class="list-group-item list-group-item-dark">Hasta 6 personas</li>
                        <li class="list-group-item list-group-item-dark">Nivel: Dificil</li>
                        <a class="btn btn-info" href="Msietecolores.php" role="button">Mas informacion</a>
                    </ul>
                </div>
            </div>


        </div>
        <div class="col">
            <div class="card">
                <img src="img/precio06.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Inti punku</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-dark">1 dia </li>
                        <li class="list-group-item list-group-item-dark">Hasta 6 personas</li>
                        <li class="list-group-item list-group-item-dark">Nivel: Moderado</li>
                        <a class="btn btn-info" href="Intipunku.php" role="button">Mas informacion</a>
                    </ul>
                </div>
            </div>
        </div>

    </div>

    <br><br>

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