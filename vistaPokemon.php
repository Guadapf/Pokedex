<?php
$servername="localhost";
$database="pokedex";
$username="root";
$password="";

echo"
        <link rel='stylesheet' href='estilos/estilos-comunes.css'>
        
        <style>
        .tituloPokemon{
        text-align: center;
        margin-top: 50px;
        font-size: 100px;
        }           
        
</style>
";

$id= isset($_GET["id"]) ? $_GET["id"] : "";
$conn = mysqli_connect($servername,$username,$password,$database);

$consulta=mysqli_query($conn,"SELECT * from pokemon where id_pokemon = '$id'");


while ($fila_pok = mysqli_fetch_assoc($consulta)){
    echo "<body>
    <div class='tituloPokemon'>" . $fila_pok["nombre"] . "</div> 
    <img src='".$fila_pok["directorio_imagen"]."' alt='falta patroclo' width='500'>
    </body>";
}
?>

