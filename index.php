<?php
require_once 'conexao.php';

$sql = "SELECT * FROM clientes";
$result = mysqli_query($conn, $sql);

?>
<!-- Mensagem que cliente foi adicionado com sucesso-->
<?php if(isset($_GET['msg']) && $_GET['msg'] === 'adicionado'):?>
  <div style="padding:12px; background:rgb(215, 237, 212); color:rgb(32, 87, 21); border-radius:5px;">
    <h3>Cliente cadastrado com sucesso!</h3>
  </div>
<?php endif;?>

<!-- Mensagem que cliente foi editado com sucesso-->
<?php if(isset($_GET['msg']) && $_GET['msg'] === 'editado'):?>
  <div style="padding:12px; background:rgb(230, 226, 193); color:rgb(196, 179, 34); border-radius:5px;">
    <h3>Cliente editado com sucesso! </h3>
  </div>
<?php endif;?>

<!-- Mensagem que cliente foi excluido com sucesso-->
<?php if(isset($_GET['msg']) && $_GET['msg'] === 'excluir'):?>
  <div style="padding:12px; background:rgb(253, 156, 137); color:rgb(233, 22, 22); border-radius:5px;">
    <h3>Cliente excluido com sucesso! </h3>
  </div>
<?php endif;?>

<!DOCTYPE html>
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