<?php
session_start();
$_SESSION ["admin"] = false;

$conexion = mysqli_connect("localhost", "root", "", "pokedex");

if(mysqli_connect_errno()){
    echo "Conexión fallida" . mysqli_connect_errno();
    exit();
}

if(isset($_POST["nombre"]) && isset($_POST["password"])){
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];


    $query = "SELECT r.descripcion FROM usuario u JOIN rol r ON u.id_rol = r.id_rol WHERE u.nombre = '$nombre' AND u.password = '$password';";
    $resultado = mysqli_query($conexion, "$query");

    if ($resultado !== false) {
        $rol = mysqli_fetch_assoc($resultado);

        switch ($rol["descripcion"]) {
            case "admin":
                $_SESSION["admin"] = true;
                $_SESSION["nombre"] = $nombre;
                break;
            case "usuario":
                $_SESSION["nombre"] = $nombre;
                break;
            default:
                $_SESSION["error"] = "Nombre y/o contraseña incorrectos";
                header("Location: vista-login.php");
                exit();
        }

    } else {
        $_SESSION["error"] = "Nombre y/o contraseña incorrectos";
        header("Location: vista-login.php");
        exit();
    }

    header("Location: index.php");
    exit();
}

mysqli_close($conexion);