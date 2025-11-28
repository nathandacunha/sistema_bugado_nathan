<?php
require_once 'conexao.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf']; // faltava um ;

  // verifica se campo nome e campo cpf estão vazios
  if(empty($nome) || empty($cpf)){
    die('Por favor, preencha todos os campos');
  } else {
    // verificacao se o cpf já existe
    $sql_check = "SELECT id FROM clientes WHERE cpf = '" . mysqli_real_escape_string($conn, $cpf) . "'";
    $result_check = mysqli_query($conn, $sql_check);

    if(!$result_check){
      $error = 'Erro na verificação de cpf: ' . mysqli_error($conn);
      echo $error;
    } else if(mysqli_num_rows($result_check) > 0){
      $error = 'Este cpf já esta cadastrado';
      echo $error;
    } else {
      // Consulta 
      $sql = "INSERT INTO clientes (nome, cpf) VALUES ('" . mysqli_real_escape_string($conn, $nome) . "', '" . mysqli_real_escape_string($conn, $cpf) . "')";

      if(mysqli_query($conn, $sql)){
        header('Location: index.php');
        exit;
      } else {
        $error = 'Erro ao cadastrar o cliente: ' . mysqli_error($conn);
        echo $error;
      }
    }
  }
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
