<?php
require_once "conexao.php";

$nome = $_POST["nome"] ?? '';
$email = $_POST["email"] ?? '';
$senha = $_POST["senha"] ?? '';


$conexao = Conexao::getInstance();

function emailExiste($conexao, $email) {
    $sql = "SELECT COUNT(*) FROM usuario WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt->execute();
    return $stmt->fetchColumn() > 0;
}

if (emailExiste($conexao, $email)) {
    echo "Erro: E-mail já cadastrado.";
    exit;
}


function insere($conexao, $nome, $email, $senha) {
    try {
        $sql = "INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $senha);
        return $stmt->execute();
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
        return false;
    }
}


if (insere($conexao, $nome, $email, $senha)) {
    header("Location: sucesso.php");
    exit;
} else {
    echo "Erro ao cadastrar usuário.";
}
?>
