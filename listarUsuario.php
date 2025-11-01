<?php
require_once 'ClassUsuarioDAO.php';

$dao = new ClassUsuarioDAO();
$usuarios = $dao->listarUsuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Usuários</title>
    
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <div class="list-content">
        <h1>Lista de Usuários</h1>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nome'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td>
                        <a href="editarUsuario.php?id=<?= $usuario['id'] ?>">Editar</a> |
                        <a href="excluirUsuario.php?id=<?= $usuario['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

</body>
</html>
