<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "root"; // coloquei a senha como "root"
$db   = "manutencao";

//troquei o $server para $host
$conn = mysqli_connect($host, $user, $pass, $db); 

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>