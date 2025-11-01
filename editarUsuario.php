<?php
require_once 'ClassUsuarioDAO.php';
require_once 'ClassUsuario.php';

$usuarioDAO = new ClassUsuarioDAO();
$usuario = null;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuario = $usuarioDAO->buscarUsuarioPorId($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuarioAtualizado = new ClassUsuario();
    $usuarioAtualizado->setId($_POST['id']);
    $usuarioAtualizado->setNome($_POST['nome']);
    $usuarioAtualizado->setEmail($_POST['email']);
    $usuarioAtualizado->setSenha($_POST['senha']);

    if ($usuarioDAO->atualizarUsuario($usuarioAtualizado)) {
        header('Location: listarUsuario.php');
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
    <title>Editar Usuário</title>
    
       
</head>
<body class="page-body">
    
    <div class="edit-container">
        <h2>Editar Usuário</h2>

        <?php if ($usuario): ?>
            <form action="" method="POST" class="edit-form">
                <div class="form-group">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" name="id" class="form-input" readonly value="<?php echo htmlspecialchars($usuario['id']); ?>">
                </div>
                <div class="form-group">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-input" required value="<?php echo htmlspecialchars($usuario['nome']); ?>">
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" required value="<?php echo htmlspecialchars($usuario['email']); ?>">
                </div>
                <div class="form-group">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" class="form-input" required value="<?php echo htmlspecialchars($usuario['senha']); ?>">
                </div>
                <button type="submit" class="btn-submit">Atualizar</button>
            </form>
            <a href="listarUsuario.php" class="btn-cancel">Cancelar</a>
        <?php else: ?>
            <p class="error-msg">Usuário não encontrado.</p>
            <a href="listarUsuario.php" class="btn-cancel">Voltar</a>
        <?php endif; ?>
    </div>
</body>
</html>
