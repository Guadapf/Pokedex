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

    <style>
        p{  color: red;
            text-align: center;}

        a{  text-decoration: none;}
    </style>
</head>
<body>
    <header>
        <a href="index.php"><h1>¡POKÉDEX!</h1></a>
        <div>
            <a href='vista-login.php' class='enlace-grande boton-grande'><i class='material-icons'>person</i> Iniciar sesión</a>
        </div>
    </header>
    <main>
        <section class="contenedor">
            <form action="validarRegistro.php" method="post" class="form">
                <p class="form-title">Registrate</p>
                <div class="contenedor-input">
                    <input type="text" name="nombreRegistro" placeholder="Nombre de Usuario" required>
                </div>
                <div class="contenedor-input">
                    <input type="password" name="passwordRegistro" placeholder="Contraseña" required>
                </div>
                <?php
                if (isset($_SESSION["error"])) {
                    echo "<p>" . $_SESSION["error"] . "</p>";
                    unset($_SESSION["error"]);
                }
                ?>
                <button type="submit" class="submit">Registrarte</button>
            </form>
        </section>
    </main>
</body>
</html>
