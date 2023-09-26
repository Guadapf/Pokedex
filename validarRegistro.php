<?php
session_start();
include_once ("bdd.php");

$usuario = isset( $_POST["nombreRegistro"])?$_POST["nombreRegistro"] : "";
$pass = isset( $_POST["passwordRegistro"])?$_POST["passwordRegistro"] : "";

$usuarioExiste = mysqli_query($conn, "Select nombre from usuario where nombre = '$usuario'");

if (isset($usuario) && isset($pass)) {

    $usuarioExiste = mysqli_fetch_assoc(mysqli_query($conn, "Select nombre from usuario where nombre = '$usuario'"));

    if ($usuario != $usuarioExiste["nombre"]) {

        mysqli_query($conn, "insert into usuario (nombre,password,rol) VALUES ('$usuario','$pass', 2)");
        $_SESSION["ok"] = "Usuario creado";
        header("location:vista-login.php");

    }else {

        $_SESSION["error"] = "El usuario ya existe";
        header("location:vista-register.php");

    }
}



