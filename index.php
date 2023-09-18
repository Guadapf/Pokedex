<?php
require_once("./funcionalidad/funciones.php");

$pokes = consulta("SELECT * FROM `pokemon`;");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado - Pokédex</title>
    <link rel="stylesheet" href="estilos/estilos-comunes.css">
    <link rel="stylesheet" href="estilos/estilos-index.css">
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
        <a href="vista-alta-pokemon.php" class="enlace-grande boton-grande"><i class="material-icons">add</i> Agregar un Pokémon</a>
        <section id="contenedor-tarjetas">
            <?php while ($fila_pok = mysqli_fetch_assoc($pokes)) { ?>
                <article class="tarjeta-pokemon">
                    <div class="botones-tarjeta">
                        <a href=""><i class="material-icons">edit</i></a>
                        <a href=""><i class="material-icons">delete</i></a>
                    </div>
                    <img src="<?php echo $fila_pok["directorio_imagen"]; ?>" alt="Foto del pokémon <?php echo $fila_pok["nombre"]; ?>">
                    <div class="info-pokemon">
                        <p><?php echo $fila_pok["nombre"]; ?></p>
                        <div class="tipos">
                            <?php
                            $idPok = $fila_pok["id_pokemon"];
                            $tipos = consulta("SELECT id_tipo FROM `pokemon_tipo` WHERE id_pokemon = $idPok;");
                            while ($fila_tipo = mysqli_fetch_array($tipos)) {
                                $idTipo = $fila_tipo["id_tipo"];
                                $dirImgTipo = mysqli_fetch_assoc(consulta("SELECT `directorio_imagen` FROM `tipo` WHERE id_tipo = $idTipo;"))["directorio_imagen"];
                            ?>
                            <img src="<?php echo $dirImgTipo; ?>" alt="Ícono del tipo">
                            <?php } ?>
                        </div>
                    </div>
                </article>
            <?php } ?>
        </section>
    </main>
</body>
</html>