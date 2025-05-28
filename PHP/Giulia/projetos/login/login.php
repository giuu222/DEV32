<?php 
//CONEXÃO COM O BANCO DE DADOS
include("conectadb.php");
//ATIVA A VARIAVEL E USO DA SESSÃO
session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    //COLETA OS DADOS DO CAMPO DE TEXTO DO HTML
   $login = $_POST['txtlogin'];
   $senha = $_POST['txtsenha'];
    //COMUNICA COM O BANCO MONTANDO AS QUERIES
    $sql = "SELECT COUNT(usu_id) FROM usuarios 
    where usu_login = '$login' AND usu_senha = '$senha'";

    //ENVIANDO A QUERY PARA O BANCO
    $enviaquery = mysqli_query($link, $sql);
    //RETORNO DO QUE VEM DE BANCO
    $retorno =mysqli_fetch_array($enviaquery) [0];

    //VALIDAÇÃO DO RETORNO
    if($retorno == 1){
        $_SESSION['nomeusuario'] = $login;

       Header("location: home.php");
    }
    else {
        echo ("<script>window.alert('LOGIN OU SENHA INCORRETOS');</script>");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="estilo.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="global">
        <div class="formulario">
            <form action="login.php" method="post">
                <label>LOGIN</label>
                <br>
                <input type='text' name='txtlogin' placeholder='Digita o seu login'>
                <br>
                <label>SENHA</label>
                <br>
                <input type='password' name='txtsenha' placeholder='Digite a sua senha'>
                <br>
                <input type='submit' placeholder='Fazer login'>
            </form>
            <br>
            <a href='cadastra.php'>NÃO TEM CONTA? CLIQUE AQUI</a>
        </div>
    </div>
</body>
</html>