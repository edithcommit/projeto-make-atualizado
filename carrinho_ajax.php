<?php
session_start();
$itens = $_SESSION['carrinho'] ?? [];

foreach ($itens as $index => $item) {
    echo "<div style='margin-bottom:15px; border-bottom:1px solid #ccc; padding-bottom:10px;'>
        <img src='{$item['imagem']}' style='width:60px; border-radius:8px;'><br>
        <strong>{$item['nome']}</strong><br>
        R$ " . number_format($item['preco'], 2, ',', '.') . "<br>
        <button onclick='removerItem($index)' style='margin-top:5px;'>Remover</button>
    </div>";
}
