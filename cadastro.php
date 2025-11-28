<?php
require_once 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf']; // faltava um ;

    // verifica se campo nome e campo cpf estão vazios
    if(empty($nome) || empty($cpf)){
      die('Por favor, preencha todos os campos');
    }
    $sql = "INSERT INTO clientes (nome, cpf) VALUES ('$nome', '$cpf')";
    mysqli_query($conn, $sql);
    // verificacao de cpf
    if(mysqli_error($conn)){
      echo "Erro, o cpf já está cadastrado";
    } else {
      // Mensagem  adicionado para a confirmação de url  
      header("Location: index.php?msg=adicionado");
      exit;
    }
    header('Location: index.php');
    exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Cadastro</title>
</head>
<body>
  <h1>Cadastrar Cliente</h1>
  <form method="post">
    <label>Nome:<br><input type="text" name="nome" required></label><br><br>
    <label>CPF:<br><input type="text" name="cpf" required></label><br><br>
    <button type="">Salvar</button>
  </form>

  <p><a href="index.php">Voltar</a></p>
</body>
</html>
