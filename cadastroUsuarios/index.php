<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários Cadastrados</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="usuarios">
    <h1>Lista de Usuários Cadastrados</h1>
    <div class="novocadastro"><button><a href="cadastro.php">Cadastrar Novo Usuário</a></button></div>
    <table border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            require 'conexao.php';

            $stmt = $pdo->query("SELECT id, nome, email FROM usuarios");
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>
                        <td>{$row['nome']}</td>
                        <td>{$row['email']}</td>
                        <td>
                            <a href='editar.php?id={$row['id']}'>Editar</a>
                            <a href='excluir.php?id={$row['id']}'>Excluir</a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>