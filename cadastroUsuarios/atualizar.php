<?php
require 'conexao.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    try {
        $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = ? AND id != ?");
        $stmt->execute([$email, $id]);
        $emailExistente = $stmt->fetch();

        if ($emailExistente) {
            $message = "Erro: O e-mail já está em uso por outro usuário.";
        } else {
            $stmt = $pdo->prepare("UPDATE usuarios SET nome = ?, email = ? WHERE id = ?");
            $stmt->execute([$nome, $email, $id]);
            $message = "Usuário atualizado com sucesso!";
        }
    } catch (PDOException $e) {
        $message = "Erro: " . $e->getMessage();
    }
}

if (!empty($message)) {
    echo "<script>alert('" . addslashes($message) . "');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de Cadastro Usuários</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="atualizacao">
    <h1>Atualização de Cadastro de Usuários</h1>
    <div class="voltar"><button><a href="index.php">Voltar ao Início</a></button></div>
</body>
</html>