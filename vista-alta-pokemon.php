<?php
require_once("./funcionalidad/funciones.php");
$tipos = consulta("SELECT * FROM tipo;");
if ( isset($_POST["nombre"]) && isset($_POST["tipos"])) {
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
        <h1>¡POKÉDEX!</h1>
        <div>
            <a href="" class="enlace-grande boton-grande"><i class="material-icons">person</i> Iniciar sesión</a>
        </div>
    </header>
    <main>
        <h2 id="titulo-formulario">¡Atrapá un Pokémon para tu Pokédex!</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div>
            <p>Elegí el tipo:</p>
                <?php while($fila = mysqli_fetch_assoc($tipos)) { ?>
                <label for="<?php echo $fila["descripcion"]; ?>"><?php echo $fila["descripcion"]; ?></label>
                <input type="checkbox" name="tipos[]" value="<?php echo $fila["id_tipo"]; ?>" id="<?php echo $fila["descripcion"]; ?>">
                <?php } ?>
            </div>
            <div>
                <label for="foto">Foto del Pokémon:</label>
                <input type="file" name="foto" id="foto">
            </div>
            <input type="submit" value="¡Atrapar!" class="boton-grande">
        </form>
    </main>
</body>
</html>