<?php
// CONEXÃO COM O BANCO
include("utils/conectadb.php");
include("utils/verificalogin.php");

// TRAZ OS FUNCIONÁRIOS DO BANCO
$sqlfun = "SELECT * FROM funcionarios INNER JOIN usuarios ON FK_FUN_ID = FUN_ID";
$enviaquery = mysqli_query($link, $sqlfun);

//AQUI FILTRA AS MINHAS ESCOLHAS
$ativo = 1;
//AGORA FUNÇÕES DE CADA CLICK
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['filtro'])){
 $ativo = $_POST['filtro'];
}
    if($ativo === 1){
        $sql = "SELECT * FROM funcionarios INNER JOIN usuarios ON FK_FUN_ID = FUN_ID WHERE FUN_ATIVO = 1";
        $enviaquery = mysqli_query($link, $sql);
 }
    else{
        $sql =  "SELECT * FROM funcionarios INNER JOIN usuarios ON FK_FUN_ID = FUN_ID WHERE FUN_ATIVO = 0";
        $enviaquery = mysqli_query($link, $sql);
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/lista.css">

    <title>LISTA FUNCIONÁRIOS</title>
</head>
<body>
    <div class='global'>
    <div class='tabela'>

        <!-- BOTÃO VOLTAR FIXO -->
        <a href="backoffice.php" class="btn-voltar">
        <img src='icons/SETAAAA.webp' width="50" height="50" alt="Voltar"></a>
        
      <h1>LISTA DE FUNCIONÁRIOS</h1>
      <!-- CRIAÇÃO DE FILTRO DE TABLE -->
       <form action='funcionario_lista.php' method='post'>
        <div class="filtro">
            <input type='radio' name='filtro' value='1' required onclick='submit()' <?= $ativo == 1?'checked':''?>>ATIVOS
            <br>
            <input type='radio' name='filtro' value='0' required onclick='submit()' <?= $ativo == 0?'checked':''?>>INATIVOS
        </div>
        <form>
            <table>
                <tr> 
                    <th>ID FUNCIONARIO</th>
                    <th>NOME</th>
                    <th>CPF</th>
                    <th>CARGO</th>
                    <th>CONTATO</th>
                    <th>STATUS</th>
                    <!-- DADOS DO USUARIO -->
                    <th>LOGIN</th>
                    <th>ATIVO</th>
                    <th>ALTERAÇÃO</th>
                </tr>

                <!-- COMEÇOU O PHP -->
                <?php
                    // while($tbl2 = mysqli_fetch_array($enviaquery2)){
                        while ($tbl = mysqli_fetch_array($enviaquery)){
                ?>
                
                <tr>
                    <td><?=$tbl[0]?></td> <!--COLETA CÓDIGO DO FUN [0] -->
                    <td><?=$tbl[1]?></td> <!--COLETA NOME DO FUN [1]-->
                    <td><?=$tbl[2]?></td> <!--COLETA CPF DO FUN [2]-->
                    <td><?=$tbl[3]?></td> <!--COLETA CONTATO DO FUN[3]-->
                    <td><?=$tbl[4]?></td> <!--COLETA ATIVO DO FUN [4]-->
                    <td><?=$tbl[5]?></td> <!--COLETA ATIVO DO FUN [5]-->
                    <!-- $tbl2 COLETA SOMENTE O NOME DO USUARIO DO FUN -->
                    <td><?=$tbl[7]?></td> <!--COLETA LOGIN DO USU [1]-->
                    <td><?=$tbl[10] == 1 ?"SIM":"NÃO"?></td>
                    <!-- USANDO GET BRABO -->
                    <td><a href='funcionario_altera.php?id=<?= $tbl[0]?>'>
                    <img src='icons/hellokitty.png' width=60 height=60 ></a></td> 
                    <!--style='border: 2px solid #fff; border-radius: 1px; margin: 2px;'--> <!-- esse código eu posso usar para colocar a borda no ícone -->
                    
                    </tr>
                    <?php
                    }
    
                ?>
            </table>
        </div>

    </div>
    
    
</body>
</html>