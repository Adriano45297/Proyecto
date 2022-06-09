<?php
    include 'include/conexion.php';
    $link = conectarse();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    	integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css"  href="css/registro.css" />
</head>
<body>
    <?php
        if($_POST){
            if(isset($_POST['btnregistrarse'])) {
                include_once 'DAO/UsuarioDAO.php';
                $dao = new UsuarioDAO();
                $usuario = new Usuario();
                $usuario->setCodUsuario($_POST["txtusuario"]);
                $usuario->setContrasenia($_POST["txtcontraseña"]);
                $usuario->setCargo("Cliente");
                $j =  $dao->Agregar($usuario);
                
                include_once 'DAO/ClienteDAO.php';
                $dao = new ClienteDAO();
                $cliente = new Cliente();
                $cliente->setCodCliente("");
                $cliente->setNombres($_POST["txtnombres"]);
                $cliente->setApellidos($_POST["txtapellidos"]);
                $cliente->setNroIdentidad($_POST["txtnroidentidad"]);
                $cliente->setEdad($_POST["txtedad"]);
                $cliente->setCelular($_POST["txtcelular"]);
                $cliente->setEmail($_POST["txtemail"]);
                $cliente->setUsuario($_POST["txtusuario"]);
                $i =  $dao->Agregar($cliente);
                if ($i == 1 and $j == 1) {
                    echo "<script>alert('Se registro con exito');</script>";
                }
                else {
                    echo "<script>alert('Error: No se pudo registrar');</script>";	
                }
            }
        }
    ?>
    <div class="box">
        <h3><strong>REGISTRO</strong></h3>
        <br>
        <form action="#" method="POST">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nombres: </label>
                    <input type="text" class="form-control" placeholder="Ingrese sus nombres" name="txtnombres" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Apellidos: </label>
                        <input type="text" class="form-control" placeholder="Ingrese sus apellidos" name="txtapellidos" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Nro de identidad: </label>
                        <input type="text" class="form-control" placeholder="Ingrese su numero de identidad" name="txtnroidentidad" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Edad: </label>
                        <input type="number" class="form-control" placeholder="Ingrese su edad" name="txtedad" required>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="form-group">
                        <label>Celular: </label>
                        <input type="text" class="form-control" placeholder="Ingrese su celular" name="txtcelular" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Email: </label>
                        <input type="email" class="form-control" placeholder="Ingrese su email" name="txtemail" required>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Usuario: </label>
                        <input type="text" class="form-control" placeholder="Ingrese su nombre de usuario" name="txtusuario" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Contraseña: </label>
                        <input type="password" class="form-control"  placeholder="Ingrese su contraseña" name="txtcontraseña">
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <a href="login.php">Regresar</a>
                    </div>
                </div>
                <div class="col-sm-8"></div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <button name="btnregistrarse">Registrarse</button>
                    </div>
                </div>
            </div>
        </form>	
    </div>
</body>
</html>