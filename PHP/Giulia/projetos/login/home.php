<?php
session_start();

if (isset($_SESSION['nomeusuario'])) {
    $nomeusuario = $_SESSION['nomeusuario'];
} else {
    echo "<script>window.alert('Você não está logado!');</script>";
    echo "<script>window.location.href='login.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Protegida</title>
</head>
<body>
    <h1>Bem-vindo ao sistema, <?php echo $nomeusuario; ?>!</h1>
    
    <form action="logout.php" method="post">
        <input type="submit" value="SAIR">
    </form>
</body>
</html>
