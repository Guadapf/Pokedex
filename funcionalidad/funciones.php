<?php

function consulta ($sql)
{
    $conexion = mysqli_connect("localhost", "root", "", "pokedex");
    $resultado = mysqli_query($conexion, $sql);
    mysqli_close($conexion);
    return $resultado;
}

function altaPokemon ($nombre, $tipos, $dirImagen)
{
    consulta("INSERT INTO `pokemon` (`nombre`, `directorio_imagen`) VALUES ('$nombre', '$dirImagen')");
    $idPokemon = mysqli_fetch_assoc(consulta("SELECT id_pokemon FROM `pokemon` WHERE `nombre` = '$nombre';"))["id_pokemon"];
    foreach ($tipos as $tipo)
    {
        consulta("INSERT INTO `pokemon_tipo` (id_pokemon, id_tipo) VALUES ($idPokemon, $tipo);");
    }
}

function subirArchivo($archivo, $nombre) {
    if ($archivo["error"] > 0)
    {
        return false;
    }
    $archivo["name"] = $nombre . "." . pathinfo($archivo["name"], PATHINFO_EXTENSION);
    if (file_exists("assets/fotos-pokemon/" . $archivo["name"]))
    {
        return false;
    }
    move_uploaded_file($archivo["tmp_name"], "assets/fotos-pokemon/" . $archivo["name"]);
    return "assets/fotos-pokemon/" . $archivo["name"];
}