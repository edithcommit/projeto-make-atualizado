<?php
require_once 'ClassMembroDAO.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $membroDAO = new ClassMembroDAO();

    if ($membroDAO->excluirMembro($id)) {
        header('Location: listarMembro.php');
        exit;
    } else {
        echo "Erro ao excluir membro.";
    }
} else {
    echo "ID do membro não fornecido.";
}
?>
