<?php
session_start();

$produtos = [
    1 => ['nome' => 'Pó translúcido', 'preco' => 89.90, 'imagem' => 'assets/produto1.jpg'],
    2 => ['nome' => 'Base Dior', 'preco' => 129.90, 'imagem' => 'assets/produto2.jpg'],
    3 => ['nome' => 'Contorno Glam', 'preco' => 109.90, 'imagem' => 'assets/produto3.jpg'],
    4 => ['nome' => 'Batom Matte', 'preco' => 79.90, 'imagem' => 'assets/produto4.jpg'],
];

$id = $_POST['id'] ?? null;

if ($id && isset($produtos[$id])) {
    $_SESSION['carrinho'][] = $produtos[$id];
    echo json_encode(['status' => 'ok']);
} else {
    echo json_encode(['status' => 'erro']);
}
