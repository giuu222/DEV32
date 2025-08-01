<?php
include("utils/conectadb.php");
include("utils/verificalogin.php");

// COLETA O ID PELA URL
$id = $_GET['id'] ?? null;

// SE A PÁGINA RECEBER DADOS DO FORMULÁRIO
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id']; // ID escondido vindo do form
    $nomeservico = $_POST['txtnome'];
    $descricaoservico = $_POST['txtdescricao'];
    $precoservico = $_POST['txtpreco'];
    $temposervico = $_POST['txttempo'];
    $ativo = $_POST['ativo'];
    $imagem_atual = $_POST['imagem_atual'];
    $imagem_base64 = $imagem_atual;

    // SE UMA NOVA IMAGEM FOI ENVIADA
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem = file_get_contents($imagem_temp);
        $imagem_base64 = base64_encode($imagem);
    }

    // FAZ O UPDATE NO BANCO
    $sql = "UPDATE catalogo SET 
        CAT_NOME = '$nomeservico',
        CAT_DESCRICAO = '$descricaoservico',
        CAT_PRECO = '$precoservico',
        CAT_TEMPO = '$temposervico',
        CAT_ATIVO = $ativo,
        CAT_IMAGEM = '$imagem_base64'
        WHERE CAT_ID = '$id'";

    mysqli_query($link, $sql);

    echo "<script>alert('ALTERADO COM SUCESSO!');</script>";
    echo "<script>window.location.href='servico_lista.php';</script>";
    exit;
}

// SE ESTIVER NA TELA DE ALTERAÇÃO (CARREGANDO DADOS)
if ($id) {
    $sql = "SELECT * FROM catalogo WHERE CAT_ID = '$id'";
    $resultado = mysqli_query($link, $sql);
    $tbl = mysqli_fetch_array($resultado);

    $nomeservico = $tbl[1];
    $descricaoservico = $tbl[2];
    $precoservico = $tbl[3];
    $temposervico = $tbl[4];
    $ativo = $tbl[5];
    $imagem_atual = $tbl[6];
}
?>


<form class='login' action="servico_altera.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
    <input type='hidden' name='id' value='<?= $id ?>'>
    <input type='hidden' name='imagem_atual' value='<?= $imagem_atual ?>'>

    <label>NOME DO SERVIÇO</label>
    <input type='text' name='txtnome' value='<?= $nomeservico ?>' required>

    <label>DESCRIÇÃO</label>
    <textarea name='txtdescricao'><?= $descricaoservico ?></textarea>

    <label>PREÇO</label>
    <input type='text' name='txtpreco' value='<?= $precoservico ?>' required>

    <label>DURAÇÃO (minutos)</label>
    <input type='number' name='txttempo' value='<?= $temposervico ?>' required>

    <label>STATUS DO SERVIÇO</label><br>
    <input type="radio" name="ativo" value="1" <?= $ativo == 1 ? "checked" : "" ?>> ATIVO
    <input type="radio" name="ativo" value="0" <?= $ativo == 0 ? "checked" : "" ?>> INATIVO

    <br><br>
    <label>IMAGEM ATUAL</label><br>
    <img src='data:image/jpeg;base64,<?= $imagem_atual ?>' width=100 height=100><br>

    <label>ALTERAR IMAGEM</label>
    <input type='file' name='imagem'>

    <br><br>
    <input type='submit' value='ALTERAR'>
</form>
