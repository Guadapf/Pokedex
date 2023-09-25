<?php
require_once("./funcionalidad/funciones.php");
session_start();
$pokes = consulta("SELECT * FROM `pokemon`;");
$esAdmin = isset($_SESSION["admin"]) && $_SESSION["admin"];
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
        <a href="index.php"><h1>¡POKÉDEX!</h1></a>
        <div>
            <?php
            if(isset($_SESSION["nombre"])){
                echo "<p style='margin-right: 10px; display: inline; font-size: large'>¡Hola " . $_SESSION["nombre"] . "!</p>";
                echo "<a href='cerrar-sesion.php' class='enlace-grande boton-grande'>Cerrar Sesion</a>";
            }else {
                echo "<a href='vista-login.php' class='enlace-grande boton-grande'><i class='material-icons'>person</i> Iniciar sesión</a>";
            }
            ?>
        </div>
    </header>
    <main>
        <div class="group">
            <form action="" method="get">
                <span class="material-icons icon">search</span>
                <input name="pokemonBuscado" placeholder="Cual es su pokemon" type="search" class="input">
            </form>
        </div>
        <div class="cont-agregar">
            <?php
            if($esAdmin){
                echo "<a href='vista-alta-pokemon.php' class='enlace-grande boton-grande'><i class='material-icons'>add</i> Agregar un Pokémon</a>";
            }
            ?>
        </div>

        <section id="contenedor-tarjetas">
            <?php
            if(isset($_GET['pokemonBuscado'])){
                $nombrePokemon = $_GET['pokemonBuscado'];
                $pokes = consulta("Select * from pokemon WHERE nombre LIKE '%$nombrePokemon%'");
            }
            while ($fila_pok = mysqli_fetch_assoc($pokes)) { ?>
                <article class="tarjeta-pokemon">

                    <?php
                    if($esAdmin){
                        echo "<div class='botones-tarjeta'>
                                  <a href='vista-alta-pokemon.php?id=" . $fila_pok["id_pokemon"] . "'><i class='material-icons'>edit</i></a>
                                  <a href='baja.php'><i class='material-icons'>delete</i></a>
                              </div>";
                    }
                    ?>
                    <img src="<?php echo $fila_pok["directorio_imagen"]; ?>" alt="Foto del pokémon <?php echo $fila_pok["nombre"]; ?>">
                    <div class="info-pokemon">
                        <?php echo "<a href='vistaPokemon.php?id=" . $fila_pok["id_pokemon"] . "'> <p> " . $fila_pok["nombre"] . "</p></a>" ?>
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