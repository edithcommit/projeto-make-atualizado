<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Meus Pedidos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styleCatalogo.css">

</head>
<body>
<?php include 'header.php'; ?>

<div class="container" style="margin-top:40px;">
  <h1 style="text-align:center;">📋 Meus Pedidos</h1>

  <?php if (!empty($_SESSION['pedidos'])): ?>
    <?php foreach ($_SESSION['pedidos'] as $pedido): ?>
      <div style="background:#fff; padding:20px; margin:20px auto; border-radius:15px; max-width:800px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">
        <h3>Pedido nº <?= $pedido['numero'] ?> - <?= $pedido['data'] ?></h3>
        <p><strong>Total:</strong> R$ <?= number_format($pedido['valor'], 2, ',', '.') ?></p>
        <ul>
          <?php foreach ($pedido['itens'] as $item): ?>
            <li><?= $item['nome'] ?> - R$ <?= number_format($item['preco'], 2, ',', '.') ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <p style="text-align:center; margin-top:40px;">Você ainda não fez nenhum pedido.</p>
  <?php endif; ?>

  <div style="text-align:center; margin-top:30px;">
    <a href="catalogo.php"><button>Voltar ao Catálogo</button></a>
  </div>
</div>
</body>
</html>
