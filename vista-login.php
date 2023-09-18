<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="estilos/estilos-comunes.css">
    <link rel="stylesheet" href="estilos/estilos-vista-login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header>
        <h1>¡POKÉDEX!</h1>
        <div>
            <a href="" class="enlace-grande boton-grande"><i class="material-icons">person</i> Iniciar sesión</a>
        </div>
    </header>
    <main>
        <section class="contenedor">
            <form action="validar.php" method="post" class="form">
                <p class="form-title">Inicia Sesion</p>
                <div class="contenedor-input">
                    <input type="text" name="nombre" placeholder="Nombre de Usuario" required>
                </div>
                <div class="contenedor-input">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <?php
                if (isset($_SESSION["error"])) {
                    echo "<p style='color: red; text-align: center'>" . $_SESSION["error"] . "</p>";
                    unset($_SESSION["error"]);
                }
                ?>
                <button type="submit" class="submit">Iniciar</button>
                <p class="signup-link">¿Sin cuenta?
                    <a href="">Registrate</a>
                </p>
            </form>
        </section>

    </main>
</body>
</html>
