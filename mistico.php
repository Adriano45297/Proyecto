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
                            <li><a class="dropdown-item" href="Msietecolores.php">Monta??a de 7 colores</a></li>
                            <li><a class="dropdown-item" href="Intipunku.php">Inti Punku</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Mistico</a>
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
    <h2>RETIRO ESPIRITUAL AYAHUASCA</h2>
    <h6>Mytical jorney</h6>
    <style>
        h6 {
            text-align: center;
        }
    </style>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="coll">
            <div class="contenedor">
                <figure>
                    <img src="img/mistico1.jpg">
                    <div class="capa">
                        <h3>AYAHUASCA</h3>
                        <p>El consumo de la ayahuasca genera efectos alucin??genos a causa de la presencia del DMT
                            natural de plantas como Psychotria viridis, Diplopterys cabrerana y otras. Es especialmente
                            serio su efecto sobre el c??rtex cerebral, que puede provocar un cuadro psic??tico cuya
                            duraci??n var??a, pudiendo ser agudo, o bien m??s duradero y en algunos casos, ser
                            irreversible.
                        </p>
                    </div>
                </figure>

            </div>
        </div>

        <div class="col">
            <div class="contenedor">
                <figure>
                    <img src="img/mistico2.jpg">
                    <div class="capa">
                        <h3>SAN PEDRO </h3>
                        <p>El ritual del San Pedro se conoce como ??mesa??, y se hace con el prop??sito de curar a alguien
                            enfermo para quien el tratamiento habitual no ha funcionado, tambi??n para obtener dinero,
                            recuperar el amor de alguien o para encontrar objetos o animales extraviados.
                        </p>
                    </div>
                </figure>

            </div>
        </div>

    </div>

    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="coll">
            <div class="contenedor">
                <figure>
                    <img src="img/mistico3.jpg">
                    <div class="capa">
                        <h3>SAN PEDRO</h3>
                        <p>El ritual del San Pedro se conoce como ??mesa??, y se hace con el prop??sito de curar a alguien
                            enfermo para quien el tratamiento habitual no ha funcionado, tambi??n para obtener dinero,
                            recuperar el amor de alguien o para encontrar objetos o animales extraviados.
                        </p>
                    </div>
                </figure>

            </div>
        </div>

        <div class="col">
            <div class="contenedor">
                <figure>
                    <img src="img/mistico4.jpg">
                    <div class="capa">
                        <h3>AYAHUASCA</h3>
                        <p>El consumo de la ayahuasca genera efectos alucin??genos a causa de la presencia del DMT
                            natural de plantas como Psychotria viridis, Diplopterys cabrerana y otras. Es especialmente
                            serio su efecto sobre el c??rtex cerebral, que puede provocar un cuadro psic??tico cuya
                            duraci??n var??a, pudiendo ser agudo, o bien m??s duradero y en algunos casos, ser
                            irreversible.
                        </p>
                    </div>
                </figure>

            </div>
        </div>

    </div>

    <div class="card text-center">
        <div class="card-header">
            PAQUETE RETIRO ESPIRITUAL
        </div>
        <div class="card-body">
            <h5 class="card-title">Retiro Espiritual </h5>
            <p class="card-text">Retiro Espiritual

                El retiro de Ayahuasca en Per??, es una experiencia de caracter??sticas m??sticas que lo sumergir?? en una
                experiencia introspectiva ayud??ndolo a entender mejor su mundo espiritual y el que lo rodea.
                Recomendado: para aquellos que disfrutan de caminatas largas y tienen una condici??n f??sica moderada.
                Consideraciones: Se requiere un permiso de ingreso (Alpaca Expeditions lo obtendr?? por usted en cuanto
                reserve con nosotros). Se requiere reservar con anticipaci??n.
            </p>
            <a href="reservar.php" class="btn btn-primary">Reservar paquete a $60.00</a>
        </div>
        <div class="card-footer text-muted">
            Duracion 4 horas
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
                &copy; 2022 <b>Autores</b> - Joel Wenceslao Bejar Espinoza - Julio C??sar Maza Garc??a - Miguel Adriano Florez Mejia - Edy nestor fuentes avil??s
            </small>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/eb496ab1a0.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>