<?php
session_start();

// Simula adição de produto (em produção, isso viria de outra página)
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    $produtos = [
        1 => ['nome' => 'Pó translúcido', 'preco' => 89.90, 'imagem' => 'assets/produto1.jpg'],
        2 => ['nome' => 'Base Dior', 'preco' => 129.90, 'imagem' => 'assets/produto2.jpg'],
        3 => ['nome' => 'Contorno Glam', 'preco' => 109.90, 'imagem' => 'assets/produto3.jpg'],
        4 => ['nome' => 'Batom Matte', 'preco' => 79.90, 'imagem' => 'assets/produto4.jpg'],
    ];

    if (isset($produtos[$id])) {
        $_SESSION['carrinho'][] = $produtos[$id];
    }
}

// Remove item
if (isset($_GET['remove'])) {
    $index = $_GET['remove'];
    unset($_SESSION['carrinho'][$index]);
    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']); // Reindexa
}

// Total
$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Seu Carrinho</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styleCatalogo.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
  <h1 style="text-align:center; margin-top:30px;">🛒 Seu Carrinho</h1>

  <?php if (!empty($_SESSION['carrinho'])): ?>
    <div class="product-container">
      <?php foreach ($_SESSION['carrinho'] as $index => $produto): ?>
        <div class="product-card">
          <img src="<?= $produto['imagem'] ?>" alt="<?= $produto['nome'] ?>">
          <div class="product-info">
            <h3><?= $produto['nome'] ?></h3>
            <p>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></p>
            <a href="carrinho.php?remove=<?= $index ?>"><button style="margin-top:10px;">Remover</button></a>
          </div>
        </div>
        <?php $total += $produto['preco']; ?>
      <?php endforeach; ?>
    </div>

    <div class="buy" style="margin-top:40px;">
      <img src="assets/comprar.jpg" alt="Imagem promocional">
      <div class="buy-text">
        <p>Faça seu investimento. Invista em você.</p>
        <p><strong>Total: R$ <?= number_format($total, 2, ',', '.') ?></strong></p>
        <form action="pagamento.php" method="POST">
        <input type="hidden" name="valor" value="<?= $total ?>">
        <button type="submit">Comprar</button>
        </form>

      </div>
    </div>
  <?php else: ?>
    <p style="text-align:center; margin-top:40px;">Seu carrinho está vazio 😢</p>
  <?php endif; ?>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-logo">MAKE FOR YOU</div>
      <div class="footer-copy">© 2025 MAKE FOR YOU. Todos os direitos reservados.</div>
    </div>
  </footer>
</div>
</body>
</html>
