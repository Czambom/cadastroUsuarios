<?php
require 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$nome, $email, $senha]);
        
        // Exibe mensagem de sucesso em um pop-up
        echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Código para UNIQUE constraint
            echo "<script>alert('Erro: E-mail já cadastrado.');</script>";
        } else {
            echo "<script>alert('Erro: " . $e->getMessage() . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuários</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="cadastro">
    <h1>Cadastro de Usuários</h1>
    <form action="cadastro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required minlength="6">
        <button type="submit">Cadastrar</button>
    </form>
    <div class="voltar"><button><a href="index.php">Voltar</a></button></div>
</body>
</html>