<?php
require_once 'ClassMembroDAO.php';
require_once 'ClassMembro.php';

$membroDAO = new ClassMembroDAO();
$membro = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $membro = $membroDAO->buscarMembroPorId($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $membroAtualizado = new ClassMembro();
    $membroAtualizado->setId($_POST['id']);
    $membroAtualizado->setNome($_POST['nome']);
    $membroAtualizado->setEmail($_POST['email']);
    $membroAtualizado->setSenha($_POST['senha']);
    $membroAtualizado->setTelefone($_POST['telefone']);

    if ($membroDAO->atualizarMembro($membroAtualizado)) {
        header('Location: listarMembro.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Editar Membro</title>
    
       
</head>
<body class="page-body-members">
    <div class="edit-members">
        <h2>Editar Membro</h2>

        <?php if ($membro): ?>
            <form action="" method="POST" class="edit-form">
                <div class="form-group">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" class="form-input" readonly value="<?php echo htmlspecialchars($membro['id']); ?>">
                </div>
                <div class="form-group">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-input" required value="<?php echo htmlspecialchars($membro['nome']); ?>">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" required value="<?php echo htmlspecialchars($membro['email']); ?>">
                </div>
                <div class="form-group">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-input" required value="<?php echo htmlspecialchars($membro['senha']); ?>">
                </div>
                <div class="form-group">
                    <label for="telefone" class="form-label">Telefone</label>
                    <input type="text" name="telefone" class="form-input" required value="<?php echo htmlspecialchars($membro['telefone']); ?>">
                </div>
                <button type="submit" class="btn-submit">Atualizar</button>
            </form>
            <a href="listarMembro.php" class="btn-cancel">Cancelar</a>
        <?php else: ?>
            <p class="error-msg">Membro não encontrado.</p>
            <a href="listarMembro.php" class="btn-cancel">Voltar</a>
        <?php endif; ?>
    </div>
</body>
</html>
