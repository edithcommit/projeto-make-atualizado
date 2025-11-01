<?php
// Inicia a sessão para garantir que as variáveis existam
session_start();

// 1. Destruir TODAS as variáveis de sessão
$_SESSION = array();

// 2. Se a sessão usa cookies, força a remoção do cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Destruir a sessão
session_destroy();

// 4. Redirecionar para a página inicial
header("Location: index.php");
exit;
?>