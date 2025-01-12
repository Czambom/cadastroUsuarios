<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT nome, email FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
    $usuario = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
    $stmt->execute([$nome, $email, $id]);
    header("Location: index.php");
}
?>

<!-- HTML para edição -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição de Usuário</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="edicao">
    <h1>Atualizar Informações</h1>
    <div>
        <form method="POST" action="atualizar.php">
            <input type="hidden" name="id" value="<?= $id ?>">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= $usuario['nome'] ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $usuario['email'] ?>" required>
            <button type="submit">Atualizar</button>
        </form>
        <div class="voltar"><button><a href="index.php">Voltar</a></button></div>
    </div>
</body>
</html>