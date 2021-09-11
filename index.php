<?php

include('infrastructure/index.php');

$sql = $con->prepare('SELECT C.nome AS nome, 
                            C.endereco AS endereco, 
                            C.cep AS cep, 
                            C.telefone_cel AS telefone_cel, 
                            C.telefone_res AS telefone_res, 
                            C.email AS email,
                            C.sexo AS sexo,
                            C.observacoes AS observacoes
                            FROM clientes AS C  
                                    ORDER BY C.nome');

$sql->execute();
$result = $sql->fetchAll();

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> CRUD | Tarefa 5 Desenvolvimento Web </title>
  <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="assets/bootstrap/all.min.css">
  <link rel="icon" href="assets/favicon_fox.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <div class="container">
    <h1> Listagem de Clientes </h1>

    <hr>

    <a href="" class="btn btn-primary"> Adicionar Cliente </a>

    <table class="table table-striped">

      <thead>
        <tr>
          <th>Nome</th>
          <th>Endereço</th>
          <th>CEP</th>
          <th>Telefone Celular</th>
          <th>Telefone Residencial</th>
          <th>E-mail</th>
          <th>Sexo</th>
          <th>Observações</th>
          <th>Ação</th>
        </tr>
      </thead>
      
      <tbody>

      <?php
          foreach ($result as $r) {
      ?>

      <tr>
          <td> <?php echo $r['nome'] ?> </td>
          <td> <?php echo $r['endereco'] ?> </td>
          <td> <?php echo $r['cep'] ?> </td>
          <td> <?php echo $r['telefone_cel'] ?> </td>
          <td> <?php echo $r['telefone_res'] ?> </td>
          <td> <?php echo $r['email'] ?> </td>
          <td> <?php echo strtoupper($r['sexo']) ?> </td>
          <td> <?php echo $r['observacoes'] ?> </td>
          <td>
            <a href="" class="btn btn-warning">EDITAR</a>

            <a onclick="return confirm('Deseja excluir?')" href="" class="btn btn-danger">DELETAR</a>
          </td>
      </tr>

      <?php
          }
      ?>

      </tbody>
      
    </table>
  </div>
</body>
</html>