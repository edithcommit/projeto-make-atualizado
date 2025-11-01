<?php
require_once 'ClassUsuarioDAO.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $usuarioDAO = new ClassUsuarioDAO();

    if ($usuarioDAO->excluirUsuario($id)) {
        header('Location: listarUsuario.php');
        exit;
    } else {
        echo "Erro ao excluir usuário.";
    }
} else {
    echo "ID do usuário não fornecido.";
}
?>
