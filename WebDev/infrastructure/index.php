<?php
$usuario = 'root';
$senha = '';
$charset  = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

try {
    $con = new PDO('mysql:host=localhost;dbname=mydb', $usuario, $senha, $charset);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo('ERRO DO BANCO: ' . $e->getMessage());
}

?>