<?php
require_once 'conexao.php';

$sql = "SELECT * FROM clientes";
$result = mysqli_query($conn, $sql);

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Lista de Clientes</title>
</head>
<body>
  <h1>Clientes</h1>
  <a href="cadastro.php">Cadastrar novo</a>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>Ações</th>
    </tr>
    <?php
      // mudei a variavel $results para $result
      if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr>';
          echo '<td>' . $row['id'] . '</td>';
          echo '<td>' . $row['nome'] . '</td>';
          echo '<td>' . $row['cpf'] . '</td>';
          echo '<td> <a href="editar.php?id='. $row['id'] . '">Editar</a> | <a href="excluir.php?id=' . $row['id'] . '">Excluir</a></td>';
          echo '</tr>';
        }
      } else {
        echo '<tr><td colspan="4">Nenhum registro encontrado</td></tr>';
      }
    ?>
  </table>
</body>
</html>
