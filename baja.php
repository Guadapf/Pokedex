<?php
$servername="localhost";
$database="pokedex";
$username="root";
$password="";

$baja= isset($_GET["id"]) ? $_GET["id"] : "";
$conn = mysqli_connect($servername,$username,$password,$database);

echo $baja;

mysqli_query($conn,"DELETE from pokemon where id_pokemon = '$baja'");

header("location:index.php");


