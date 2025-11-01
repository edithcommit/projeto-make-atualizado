<?php
session_start();
$index = $_POST['index'] ?? null;

if (isset($_SESSION['carrinho'][$index])) {
    unset($_SESSION['carrinho'][$index]);
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);
    echo 'ok';
} else {
    echo 'erro';
}
