<?php

include('infrastructure/index.php');

if (  isset($_GET['id'])  ) {

  $titulo = 'Editar';

  $id = $_GET['id'];

  $sql = $con->prepare("SELECT C.nome AS nome,
                              C.id as id,
                              C.endereco AS endereco, 
                              C.cep AS cep, 
                              C.telefone_cel AS telefone_cel, 
                              C.telefone_res AS telefone_res, 
                              C.email AS email,
                              C.sexo AS sexo,
                              C.observacoes AS observacoes FROM clientes AS C  
                                WHERE id = $id");

  $sql->execute();

  $result = $sql->fetchAll();

  $nome = $result[0]['nome'];
  $endereco = $result[0]['endereco'];
  $cep = $result[0]['cep'];
  $telefone_cel = $result[0]['telefone_cel'];
  $telefone_res = $result[0]['telefone_res'];
  $email = $result[0]['email'];
  $sexo = $result[0]['sexo'];
  $observacoes = $result[0]['observacoes'];

  $acao = 'editar';

  $botao = 'Atualizar';

} else {
    
  $titulo = 'Cadastrar';
  $nome = '';
  $endereco = '';
  $cep = '';
  $telefone_cel = '';
  $telefone_res = '';
  $sexo = '';
  $observacoes = '';
  $email = '';
  $sexo = "";

  $acao = 'inserir';

  $botao = 'Inserir';  
}

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD | <?php echo $titulo;?> Cliente</title>
  <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
  <link rel="icon" href="favicon_fox.ico" type="image/x-icon">
  <link rel="stylesheet" href="style/style.css">
</head>
<body>
  <h1>Yo!</h1>
  <hr>
  <form method="POST" action="acao.php" class="form-inline" onsubmit="">

    <input value="<?php echo $id; ?>" type="hidden" name="id">
    <input value="<?php echo $nome;?>" type="text" placeholder="Nome do cliente" name="nome" class="form-control" maxlength="45" id="nome">
    <input value="<?php echo $endereco;?>" type="text" placeholder="Endereço" name="endereco" class="form-control" id="endereco">
    <input value="<?php echo $cep;?>" type="text" placeholder="CEP" name="cep" class="form-control" maxlength="8" id="cep">
    <input value="<?php echo $telefone_cel;?>" type="text" placeholder="Telefone celular" name="telefone_cel" class="form-control" maxlength="45" id="telefone_cel">
    <input value="<?php echo $telefone_res;?>" type="text" placeholder="Telefone residencial" name="telefone_res" class="form-control" maxlength="45" id="telefone_res">
    <input value="<?php echo $email;?>" type="text" placeholder="E-mail" name="email" class="form-control" maxlength="45" id="email">
    <input value="<?php echo $sexo;?>" type="text" placeholder="Sexo" name="sexo" class="form-control" maxlength="1" id="sexo">
    <input value="<?php echo $observacoes;?>" type="text" placeholder="Observações" name="observacoes" class="form-control" maxlength="45" id="observacoes">

    <input type="hidden" name="acao" value="<?php echo $acao; ?>">
    <button type="submit" class="btn btn-warning"> <?php echo $botao; ?> </button>
  
  </form>

  <div class="alert alert-danger hidden" id="erro"></div>
  <a href="index.php" class="btn btn-success"> Voltar </a>
</body>