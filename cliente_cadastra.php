<?php

// CONEXÃO COM O BANCO DE DADOS
include("utils/conectadb.php");
include("utils/verificalogin.php");

//APÓS O VAMOS CADASTRAR O FUN E O USU AO MESMO TEMPO
if($_SERVER['REQUEST_METHOD']=='POST'){
    
    // COLETAR CAMPOS DOS INPUTS POR NAMES PARA VARIÁVEIS PHPs
    $nomecli = $_POST['txtnome'];
    $cpfcli = $_POST['txtcpf'];
    $contatocli = $_POST['txtcontato'];
    $ativocli = $_POST['ativo'];
    $datanasccli = $_POST['dtdata'];
    // COLETA SENHA DE USUARIO
    $senhacli = sha1($_POST['txtsenha']);

    // INICIANDO QUERIES DE BANCO
    // VERIFICANDO SE O CLIENTE EXISTE
    $sql = "SELECT COUNT(CLI_CPF) FROM clientes
    WHERE CLI_CPF = '$cpfcli'";
    
    // ENVIANDO A QUERY PARA O BANQUINHO
    $enviaquery = mysqli_query($link, $sql);
    // RETORNO DO QUE VEM DO BANCO
    $retorno = mysqli_fetch_array($enviaquery) [0];

    // VALIDAÇÃO DO RETORNO
    if($retorno == 1){
        // INFORMA QUE O USUARIO JÁ EXISTE POIS RETORNO = 1
        echo("<script>window.alert('CLIENTE JÁ EXISTE');</script>");

    }
    else{
        // CASO FUNCIONÁRIO NÃO ESTEJA CADASTRADO
        $sql = "INSERT INTO clientes (CLI_NOME, CLI_CPF, CLI_TEL,CLI_DATANASC, CLI_ATIVO, CLI_SENHA)
        VALUES ('$nomecli', '$cpfcli', '$contatocli', '$datanasccli', $ativocli,  '$senhacli' )";

        // CONECTA COM O BANCO E MANDA A QUERY
        $enviaquery = mysqli_query($link, $sql);

        
        echo("<script>window.alert('CLIENTE ALASTRADO COM SUCESSO!');</script>");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
    <link rel="stylesheet" href="css/global.css">
    <link href="https://fonts.cdnfonts.com/css/master-lemon" rel="stylesheet">
    <title>CADASTRO DE CLIENTE</title>
</head>
<body>
    <div class="global">
        <div class="formulario">
    <!-- FIRULAS Y FIRULAS -->
 
            <a href="backoffice.php" class="btn-voltar">
                <img src='icons/SETAAAA.webp' width=50 height=50></a>
                  <h2>CADASTRO CLIENTE</h2>
            
            <form class='login' action="cliente_cadastra.php" method="post">
            
                <label>NOME DO CLIENTE</label>
                <input type='text' name='txtnome' placeholder='Digite o nome completo' required>
                <br>
                <label>CPF</label>
                <input type='number' name='txtcpf' placeholder='Digite o CPF' required>
                <br>
                <label>CONTATO</label>
                <input type='number' name='txtcontato' placeholder='Digite o telefone' required>
                <br>
                <label>DATA DE NASCIMENTO</label>
                <input type='date' name='dtdata' placeholder='DD/MM/AAAA' required>
                <br>
                <br>
    
                <label>DIGITE UMA SENHA</label>
                <input type='password' name='txtsenha' placeholder='Senha aqui'>
                <br>
          
                <label>INICIAR CLIENTE COMO:</label>
                <div class='rbativo'>
                    
                    <input type="radio" name="ativo" id="ativo" value="1" checked><label>ATIVO</label>
                    <br>
                    <input type="radio" name="ativo" id="inativo" value="0"><label>INATIVO</label>
                </div>

                <br>
                <input type='submit' value='CADASTRAR'>
            </form>
            
            <br>

        </div>
    </div>
    
</body>
</html>