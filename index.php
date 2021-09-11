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
  <title>CRUD Assignment | Web Development</title>
  <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
  <link rel="stylesheet" href="assets/bootstrap/all.min.css">
  <link rel="icon" href="assets/favicon_fox.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <div class="container">
      <h1>Starting Assigment...</h1>
      <?php
        foreach ($result as $r) {
      ?>
      <p>
      <?php echo $r['nome'] ?>
      </p>

      <?php
        }
      ?>
  </div>
</body>
</html>