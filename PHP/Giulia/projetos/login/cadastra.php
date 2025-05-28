<?php 
//CONEXÃO COM O BANCO DE DADOS
include("conectadb.php");
//ATIVA A VARIAVEL E USO DA SESSÃO
session_start();


if($_SERVER['REQUEST_METHOD']=='POST'){
    //COLETA OS DADOS DO CAMPO DE TEXTO DO HTML
   $login = $_POST['txtlogin'];
   $senha = $_POST['txtsenha'];

   //PESQUISA NO BANCO CONTANDOS OS USUARIOS
   $sql = "SELECT COUNT(usu_login) FROM usuarios  
    where usu_login = '$login'";
    
    //ENVIANDO A QUERY PARA O BANCO
    $enviaquery = mysqli_query($link, $sql);

    //RETORNO DO QUE VEM DE BANCO
    $retorno =mysqli_fetch_array($enviaquery) [0];

    //VALIDAÇÃO DO RETORNO
    if($retorno == 0){
    
    $sql = "INSERT INTO usuario (USU_LOGIN, USU_SENHA)
    VALUES('$login', '$senha')";

     $enviaquery = mysqli_query($link, $sql);
    echo ("<script>window.alert('USUARIO CADASTRADO');</script>");
    echo ("<script>window.location.href='login.php';</script>");

    }
    else {
        echo ("<script>window.alert('USUARIO JÁ CADASTRADO);</script>");
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>LOGIN</title>
</head>
<body>
    <div class="global">
        <div class="formulario">
            <form id='cadastra' action="login.php" method="post">
                <label>LOGIN</label>
                <br>
                <input type='text' name='txtlogin' placeholder='Digita o seu login'>
                <br>
                <label>SENHA</label>
                <br>
                <input type='password' name='txtsenha' placeholder='Digite a sua senha'>
                <br>
                <input type='submit' value='FAZ O C...ADASTRAR'>
            </form>

            <a href='login.php'>JÁ TEM CONTA? CLIQUE AQUI</a>
        </div>
    </div>
</body>
</html>