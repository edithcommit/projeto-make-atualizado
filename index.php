<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
 
    <title>Home</title>
</head>
<body>
<?php include 'header.php'; ?>
     <div class="container">
            <div class="home">
    <div class="container"> 
        <div class="row align-items-center g-3"> 
            
            <div class="col-12 col-md-8 order-2 order-md-1"> 
                <div class="text">
                    <h1 class="display-4">Reveal Yourself</h1><br>
                    <p class="lead">Nossa missão é realçar a beleza única de cada pessoa, oferecendo produtos com qualidade.</p><br>
                    <a href="catalogo.php" class="btn btn-dark btn-lg">Veja nosso Catálogo</a>
                </div>
            </div>
            
            <div class="col-12 col-md-4 text-center order-1 order-md-2">
                 <img src="assets/home.jpg" alt="Imagem de maquiagem" class="img-fluid rounded shadow">
            </div> 
            
        </div>
    </div>
</div>

        <div class="about" id="about">
            <div class="about-content">
           
                <div class="text-about">
                    <h1>Sobre nós</h1>
                    <p>Somos uma empresa que preza pela autoestima e bem estar de todas as pessoas que utilizam dos nossos produtos. Prezando sempre a melhor experiência em cada detalhe, com mais de 100 franquias pelo Brasil somos responsáveis por destacar cada traço brasileiro enfatizando nossas culturas e costumes.</p>
                     </div>
                <img src="assets/about.jpg" alt="">
            </div>
            
            <div class="custom-shape-divider-bottom-1744056718">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
    </svg>
         </div>  
        </div>
          
        <div class="be-part">
         <div class="be-part-content">
          <div class="text-section">
           <h1>Seja uma Make Yourself!</h1>
         <p>Se a <b>MAKE FOR YOU</b> faz parte da sua rotina, participe da nossa comunidade.</p>
          </div>
           <form class="form-section" method="POST" action="cadastroMembro.php">
          <input type="text" name="nome" placeholder="Nome" required>
          <input type="email" name="email" placeholder="Email" required>
          <input type="password" name="senha" placeholder="Senha" required>
          <input type="text" name="telefone" placeholder="Seu telefone" required>
         <button type="submit">Criar Conta</button>
      </form>
  </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>