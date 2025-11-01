<?php
// processaLogin.php

// 1. Inicia a sessão para gerenciar o estado de login
session_start();
require_once "conexao.php"; // Certifique-se de que a conexão esteja disponível

// 2. Coleta e sanitiza os dados do formulário
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';
$conexao = Conexao::getInstance();

if (empty($email) || empty($senha)) {
    $_SESSION['login_erro'] = "Preencha todos os campos.";
    header("Location: formulario.php");
    exit;
}

// ------------------------------------
// 3. Tenta logar como MEMBRO
// ------------------------------------
$sqlMembro = "SELECT id, nome, senha FROM membros WHERE email = ?";
$stmtMembro = $conexao->prepare($sqlMembro);
$stmtMembro->bindValue(1, $email);
$stmtMembro->execute();
$membro = $stmtMembro->fetch(PDO::FETCH_ASSOC);

if ($membro) {
    // **IMPORTANTE: Use password_verify() se você usa password_hash() no cadastro!**
    // Assumindo por enquanto que você ainda não implementou o hash seguro:
    if ($senha === $membro['senha']) { 
    // Mude a linha acima para: if (password_verify($senha, $membro['senha'])) { 
        
        $_SESSION['logado'] = true;
        $_SESSION['usuario_id'] = $membro['id'];
        $_SESSION['usuario_nome'] = $membro['nome'];
        $_SESSION['usuario_tipo'] = 'membro'; // Identifica o nível de acesso
        
        // Redireciona para o painel de membro ou página específica
        header("Location: index.php"); 
        exit;
    }
}

// ------------------------------------
// 4. Se não for membro, tenta logar como USUÁRIO
// ------------------------------------
$sqlUsuario = "SELECT id, nome, senha FROM usuario WHERE email = ?";
$stmtUsuario = $conexao->prepare($sqlUsuario);
$stmtUsuario->bindValue(1, $email);
$stmtUsuario->execute();
$usuario = $stmtUsuario->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    // **IMPORTANTE: Use password_verify() se você usa password_hash() no cadastro!**
    // Assumindo por enquanto que você ainda não implementou o hash seguro:
    if ($senha === $usuario['senha']) { 
    // Mude a linha acima para: if (password_verify($senha, $usuario['senha'])) { 
        
        $_SESSION['logado'] = true;
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_tipo'] = 'usuario'; // Identifica o nível de acesso


        // Adiciona cabeçalhos para prevenir cache do navegador
        header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Data no passado

        // Redireciona para o index.php (agora sem cache)
        header("Location: index.php"); 
        exit;
    }
}

// ------------------------------------
// 5. Se chegou aqui, as credenciais são inválidas
// ------------------------------------
$_SESSION['login_erro'] = "E-mail ou senha inválidos.";
header("Location: formulario.php"); // Volta para o formulário de login
exit;
?>