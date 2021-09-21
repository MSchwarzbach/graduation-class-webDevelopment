<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desenvolvimento Web | Tarefa 6 - Autenticação</title>
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap/all.min.css">
    <link rel="icon" href="assets/favicon_fox.ico" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>
	<div class="container">
            <div class="formContainer">
                    <h1>Autenticação</h1>
                    <?php
                    if(isset($_SESSION['nao_autenticado'])):
                    ?>
                    <div class="alert alert-danger" role="alert">
                      ERRO: Usuário ou senha inválidos.
                    </div>
                    <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
			<form action="login.php" method="POST" class="form">
			<div class="formContent">	
                            <div class="field">
                                <div class="control">
                                    <input name="usuario" name="text" class="form-control" placeholder="Seu usuário" autofocus="">
                                </div>
                            </div>

                            <div class="field">
                                <div class="control">
                                    <input name="senha" class="form-control" type="password" placeholder="Sua senha">
                                </div>
                            </div>
			    <div class="buttonContainer">
                                    <button style="width: 100%" type="submit" class="btn btn-primary">Entrar</button>
                            </div>
			</div>
			</form>
	    </div>
	</div>
</body>

</html>