<?php
require_once 'conexao.php';

$id = $_GET['id'];
if (!isset($_GET['id'])) {
    die('ID não informado');
}
// verificacao de resposta foi "sim" ou "nao"
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(($_POST['resposta']) === 'sim'){
        // Coloquei aonde que query vai deletar, estava sem where, logo excluia todos os dados
        $sql = "DELETE FROM clientes WHERE id = ?";
        mysqli_query($conn, $sql);

        // mensagem adicionado para a confirmação da url
        header('Location: index.php?msg=excluir');
        exit;
    }  else if($_POST['resposta'] === 'nao'){
        header('Location: index.php');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tem certeza?</title>
</head>
<body>
    <section class="card">
        <h1>Tem certeza que deseja excluir este cliente?</h1>
        <form method="post" action="excluir.php?id=<?php echo $id; ?>">
            <button type="submit" name="resposta" value="sim">Sim</button>
            <button type="submit" name="resposta" value="nao">Não</button>
            <a href="index.php">Voltar</a>
        </form>
    </section>
</body>
</html>