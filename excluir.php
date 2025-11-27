<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
    die('ID não informado');
}

$id = $_GET['id'];

// Coloquei aonde que query vai deletar, estava sem where, logo excluia todos os dados
$sql = "DELETE FROM clientes WHERE id = $id";
mysqli_query($conn, $sql);

header('Location: index.php');
exit;
?>