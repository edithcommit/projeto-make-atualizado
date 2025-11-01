<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleCatalogo.css">

    <title>Catálogo de produtos</title>
</head>
<script>
  const images = document.querySelectorAll('.home-products img');
  let current = 0;

  function showNextImage() {
    images.forEach((img, index) => {
      img.style.display = index === current ? 'block' : 'none';
    });
    current = (current + 1) % images.length;
  }

  setInterval(showNextImage, 3000);
  showNextImage();
</script>
<!-- Botão flutuante -->
<button id="toggle-cart" style="position:fixed; bottom:20px; right:20px; z-index:1000;">🛒</button>

<!-- Aba lateral do carrinho -->
<div id="cart-sidebar" style="
  position: fixed;
  top: 0;
  right: -400px;
  width: 350px;
  height: 100%;
  background: white;
  box-shadow: -4px 0 10px rgba(0,0,0,0.2);
  padding: 20px;
  overflow-y: auto;
  transition: right 0.3s ease;
  z-index: 999;
">
  <h3>🛍️ Seu Carrinho</h3>
  <div id="cart-items">Carregando...</div>
</div>

<body>
    
<?php include 'header.php'; ?>
  <div class="container">
    <div class="catalog">
    <div class="catalog-content">
        <div class="text-catalog">
            <h1>Bem-vindo ao nosso Catálogo!</h1><br>
            <p>descubra todos os nossos produtos</p>
            <form action="search.php" method="POST">
                <input type="text" name="search" placeholder="O que você procura?" required>
                <input class="btn-search" type="submit" value="Procurar">
        </form>

        </div>
    </div> 
    </div>         

    <div class="products">
            <div class="home-products">
           <img src="assets/woman1.jpg" alt="">
           <img src="assets/woman2.jpg" alt="">
           <img src="assets/woman3.jpg" alt="">
            </div>

            <div class="text-home">
        <h1>Nossos melhores produtos</h1>
        <div class="home-list">
            <ul>
                <li class="home-item">Bases</li> |
                <li class="home-item">Contornos</li> |
                <li class="home-item">Batom Matte</li>
            </ul>
        </div>
        </div>
        
        <div class="product-container">
    
  <div class="product-card">
  <img src="assets/produto1.jpg" alt="Paleta Rosada">
  <div class="product-info">
    <h3>Pó translúcido</h3>
    <p>R$ 89,90</p>
    <button class="add-to-cart" data-id="1">🛒 Adicionar ao Carrinho</button>
  </div>
</div>


  <div class="product-card">
    <img src="assets/produto2.jpg" alt="Paleta Nude">
    <div class="product-info">
      <h3>Base Dior</h3>
      <p>R$ 129,90</p>
      <button class="add-to-cart" data-id="2">🛒 Adicionar ao Carrinho</button>
    </div>
  </div>

  <div class="product-card">
    <img src="assets/produto3.jpg" alt="Paleta Glam">
    <div class="product-info">
      <h3>Contorno Glam</h3>
      <p>R$ 109,90</p>
      <button class="add-to-cart" data-id="3">🛒 Adicionar ao Carrinho</button>
    </div>
  </div>

  <div class="product-card">
    <img src="assets/produto4.jpg" alt="Batom Matte">
    <div class="product-info">
      <h3>Batom Matte</h3>
      <p>R$ 79,90</p>
      <button class="add-to-cart" data-id="4">🛒 Adicionar ao Carrinho</button>
    </div>
  </div>

</div> <!-- fim do product-container-->

  <div class="buy">
  <img src="assets/comprar.jpg" alt="Imagem promocional">
  <div class="buy-text">
    <p>Faça seu investimento. Invista em você.</p>
    <a href="carrinho.php"><button>Comprar</button></a>
  </div>
</div>

   <footer class="footer">
         <div class="footer-container">
      <div class="footer-logo">MAKE FOR YOU</div>
     <div class="footer-copy">
      © 2025 MAKE FOR YOU. Todos os direitos reservados.
         </div>
        </div>
    </footer>
    
</div>
</div>
<script>
document.querySelectorAll('.add-to-cart').forEach(button => {
  button.addEventListener('click', () => {
    const id = button.getAttribute('data-id');

    fetch('adicionar.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: 'id=' + encodeURIComponent(id)
    })
    .then(response => response.json())
    .then(data => {
      if (data.status === 'ok') {
        showNotification('Produto adicionado com sucesso!');
      } else {
        showNotification('Erro ao adicionar produto.');
      }
    });
  });
});

function showNotification(message) {
  const notif = document.createElement('div');
  notif.innerText = message;
  notif.style.position = 'fixed';
  notif.style.top = '20px';
  notif.style.right = '20px';
  notif.style.background = '#ff69b4';
  notif.style.color = 'white';
  notif.style.padding = '10px 20px';
  notif.style.borderRadius = '10px';
  notif.style.boxShadow = '0 4px 10px rgba(0,0,0,0.2)';
  notif.style.zIndex = '9999';
  document.body.appendChild(notif);

  setTimeout(() => {
    notif.remove();
  }, 3000);
}
</script>
<script>
document.getElementById('toggle-cart').addEventListener('click', () => {
  const cart = document.getElementById('cart-sidebar');
  cart.style.right = cart.style.right === '0px' ? '-400px' : '0px';
  carregarCarrinho();
});

function carregarCarrinho() {
  fetch('carrinho_ajax.php')
    .then(res => res.text())
    .then(html => {
      document.getElementById('cart-items').innerHTML = html;
    });
}

function removerItem(index) {
  fetch('remover_ajax.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'index=' + encodeURIComponent(index)
  })
  .then(res => res.text())
  .then(resp => {
    if (resp === 'ok') {
      carregarCarrinho();
    }
  });
}
</script>


</body>
</html>