<?php
require_once 'ClassMembroDAO.php';

$dao = new ClassMembroDAO();
$membros = $dao->listarMembro();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Lista de Membros</title>
    
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
    <div class="list-members">
        <h1>Lista de Membros</h1>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
            <?php foreach ($membros as $membro): ?>
                <tr>
                    <td><?= $membro['id'] ?></td>
                    <td><?= $membro['nome'] ?></td>
                    <td><?= $membro['email'] ?></td>
                    <td><?= $membro['telefone'] ?></td>
                    <td>
                        <a href="editarMembro.php?id=<?= $membro['id'] ?>">Editar</a> |
                        <a href="excluirMembro.php?id=<?= $membro['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>

</body>
</html>
