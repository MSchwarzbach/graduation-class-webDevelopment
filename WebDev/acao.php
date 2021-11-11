<?php
session_start();
include('verifica_login.php');
include('infrastructure/index.php');

if (isset($_REQUEST['acao'])) {
  $acao = $_REQUEST['acao'];

  switch($acao) {

    case 'inserir':
        
      if (  isset($_POST['nome'])  && isset($_POST['endereco']) && isset($_POST['cep']) && isset($_POST['telefone_cel'])  && isset($_POST['telefone_res']) && isset($_POST['email']) && isset($_POST['sexo']) && isset($_POST['observacoes'])  ) {

          
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];
        $telefone_cel = $_POST['telefone_cel'];
        $telefone_res = $_POST['telefone_res'];
        $email = $_POST['email'];
        $sexo = $_POST['sexo'];
        $observacoes = $_POST['observacoes'];

        if ( strlen($nome) > 0) {

          $sql = $con->prepare("INSERT INTO clientes (nome, endereco, cep, telefone_cel, telefone_res, email, sexo, observacoes) VALUES ('$nome', '$endereco', '$cep', '$telefone_cel', '$telefone_res', '$email', '$sexo', '$observacoes')");
          $sql->execute();

          header('location:cadastro.php');
        }
      } 

    break;

      case 'editar':          
        if (  isset($_POST['id']) && isset($_POST['nome'])  && isset($_POST['endereco']) && isset($_POST['cep']) && isset($_POST['telefone_cel'])  && isset($_POST['telefone_res']) && isset($_POST['email']) && isset($_POST['sexo']) && isset($_POST['observacoes']) ) {

          $id = $_POST['id'];
          $nome = $_POST['nome'];
          $endereco = $_POST['endereco'];
          $cep = $_POST['cep'];
          $telefone_cel = $_POST['telefone_cel'];
          $telefone_res = $_POST['telefone_res'];
          $email = $_POST['email'];
          $sexo = $_POST['sexo'];
          $observacoes = $_POST['observacoes'];

          if(strlen($nome) > 0) {

            $sql = $con->prepare("UPDATE clientes SET nome = '$nome', endereco = '$endereco', cep = '$cep', telefone_cel = '$telefone_cel', telefone_res = '$telefone_res', email = '$email', sexo = '$sexo', observacoes = '$observacoes' 
              WHERE id = $id");
            $sql->execute();

            header('location:cadastro.php');
          }
        }

    break;

    case 'excluir':
      if(isset  ($_GET['id'])  ) {
          $id = $_GET['id'];

          try {

            $sql = $con->prepare("DELETE FROM clientes WHERE id = $id");
            $sql->execute();

          } catch (Exception $e) {
            header('location:cadastro.php?erro=true');
            exit;
          }

          header('location:cadastro.php');
        }
    break;

    default:
        echo('DEFAULT!');
    break;
  }
}
?>