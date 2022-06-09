<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        	integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css"  href="css/login.css" />
		<title>Login</title>
	</head>
	<body>
		<div class="login-box">
			<img class="avatar" src="img/logo.png" alt="">
			<h1>Login </h1>  
			<form action="include/validar.php" method="POST">
				<label for="uname" class="form-label">Usuario:</label>
				<input type="text" class="form-control" id="uname" placeholder="Digite usuario" name="usuario" required>
				<br><br>
				<label for="pwd" class="form-label">Contraseña:</label>
				<input type="password" class="form-control" placeholder="Digite contraseña" name="contraseña" required>
				<br><br>
				<input type="submit" class="btn btn-primary" value="INGRESAR">
			</form>
			<div class="registros">
				<a class="registro" href="index.php">Regresar</a>
				<br><br>
				<label class="form-label">¿No tiene una cuenta?</label>
				<a class="registro" href="registrarse.php">Registrarse</a>
			</div>
		</div>
	</body>
</html>