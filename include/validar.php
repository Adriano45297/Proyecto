<?php
    require 'conexion.php';
    $link = conectarse();
    session_start();
    
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $consulta = "SELECT COUNT(*) AS contar, cargo FROM tUsuario WHERE codUsuario = '$usuario' AND contrasenia = '$contraseña'";
    $resultado = mysqli_query($link, $consulta);
    $array = mysqli_fetch_array($resultado);

    if($array['contar']>0)
    {
        $_SESSION['username'] = $usuario;
        
        if($array['cargo']=="Empleado")
        {
            header("location: ../DAO view/usuario.php");
        }
        else if($array['cargo']=="Cliente")
        {
            header("location: ../index.php");
        }
    }
    else
    {
        echo "Usuario y/o contraseña incorrectos";
    }
?>