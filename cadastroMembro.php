<?php
require_once "conexao.php";



$nome = $_POST["nome"] ?? '';
$email = $_POST["email"] ?? '';
$senha = $_POST["senha"] ?? '';
$telefone = $_POST["telefone"] ?? '';



$conexao = Conexao::getInstance();

function emailExiste($conexao, $email) {
    $sql = "SELECT COUNT(*) FROM membros WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

if (emailExiste($conexao, $email)) {
    echo "Erro: E-mail já cadastrado.";
    exit;
}


function insere($conexao, $nome, $email, $senha, $telefone) {
    try {
        $sql = "INSERT INTO membros (nome, email, senha, telefone) VALUES (?, ?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $senha);
        $stmt->bindValue(4, $telefone);
        return $stmt->execute();
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
}


if (insere($conexao, $nome, $email, $senha, $telefone)) {
    header("Location: sucessoMembro.php");
    exit;
} else {
    echo "Erro ao cadastrar usuário.";
}
?>
