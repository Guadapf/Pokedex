<?php
require_once("./funcionalidad/funciones.php");
$tipos = consulta("SELECT * FROM tipo;");
if (isset($_GET["id"])) {
    $pokemon = mysqli_fetch_assoc(consulta("SELECT * FROM pokemon WHERE id_pokemon = " . $_GET["id"] . ";"));
    $tiposDelPokemon = [];
    $resultadoTipos = consulta("SELECT id_tipo FROM pokemon_tipo WHERE id_pokemon = " . $pokemon["id_pokemon"] .";");
    while ($fila = mysqli_fetch_assoc($resultadoTipos)) {
        array_push($tiposDelPokemon, $fila["id_tipo"]);
    }
    if (isset($_POST["nombre"]) && isset($_POST["tipos"])) {
        if (isset($_FILES["foto"]) && $dirImagen = subirArchivo($_FILES["foto"], $_POST["nombre"]))
        {
            moificarImagen($pokemon["id_pokemon"], $dirImagen);
        }
        modificar($pokemon["id_pokemon"], $_POST["nombre"], $_POST["tipos"], $tiposDelPokemon);
    }
} elseif (isset($_POST["nombre"]) && isset($_POST["tipos"])) {
    if (isset($_FILES["foto"]))
    {
        $dirImagen = subirArchivo($_FILES["foto"], $_POST["nombre"]);
        altaPokemon($_POST["nombre"], $_POST["tipos"], $dirImagen);
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado - Pokédex</title>
    <link rel="stylesheet" href="estilos/estilos-comunes.css">
    <link rel="stylesheet" href="estilos/estilos-vista-alta-pokemon.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <header>
        <a href="index.php"><h1>¡POKÉDEX!</h1></a>
        <div>
            <a href="vista-login.php" class="enlace-grande boton-grande"><i class="material-icons">person</i> Iniciar sesión</a>
        </div>
    </header>
    <main>
        <h2 id="titulo-formulario">¡Atrapá un Pokémon para tu Pokédex!</h2>
        <form action="" method="post" enctype="multipart/form-data">
<<<<<<< HEAD
            <div class="relative">
                <input class="input-cal input-base" id="nombre" placeholder="" type="text" name="nombre">
                <label id="label-input">Nombre</label>
=======
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre"
                <?php
                if (isset($_GET["id"])) {
                    echo "value='" . $pokemon["nombre"] . "'";
                }
                ?>>
>>>>>>> 6efc5c962470b0b160b5a4776540c4dc30113a11
            </div>
            <div class="cont-check">
            <p>Elegí el tipo:</p>
<<<<<<< HEAD
                    <?php while($fila = mysqli_fetch_assoc($tipos)) { ?>
                        <label for="<?php echo $fila["descripcion"]; ?>"><?php echo $fila["descripcion"]; ?></label>
                        <input type="checkbox" name="tipos[]" value="<?php echo $fila["id_tipo"]; ?>" id="<?php echo $fila["descripcion"]; ?>">
                    <?php } ?>
=======
                <?php while($fila = mysqli_fetch_assoc($tipos)) { ?>
                <label for="<?php echo $fila["descripcion"]; ?>"><?php echo $fila["descripcion"]; ?></label>
                <input type="checkbox" name="tipos[]" value="<?php echo $fila["id_tipo"]; ?>" id="<?php echo $fila["descripcion"]; ?>"
                <?php
                if (isset($_GET["id"])) {
                    foreach ($tiposDelPokemon as $tipoDelPokemon) {
                        if ($tipoDelPokemon == $fila["id_tipo"]) {
                            echo "checked";
                        }
                    }
                }
                ?>>
                <?php } ?>
>>>>>>> 6efc5c962470b0b160b5a4776540c4dc30113a11
            </div>
            <div class="cont-file">
                <label for="foto">Foto del Pokémon:</label>
                <input type="file" name="foto" id="foto">
            </div>
            <div class="cont-btn">
                <input type="submit" value="¡Atrapar!" class="boton-grande">
            </div>

        </form>
    </main>
</body>
</html>