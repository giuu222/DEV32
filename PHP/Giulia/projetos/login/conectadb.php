<?php
//LOCALIZAÇÃO DO SERVIDOR DE BANCO
$servidor = "localhost";
//NOME DA BASE
$banco = "login";
//USUARIO DO banco
$usuario = "root";
//SENHA DO BANCO
$senha = "";
//RECURSOS DE CONEXÃO DO BANCO
$link = mysqli_connect($servidor, $usuario, $senha, $banco);

?>