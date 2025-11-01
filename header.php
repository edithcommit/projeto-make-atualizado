<?php
// Inicia a sessão se ainda não foi iniciada (segurança extra)
if (session_status() === PHP_SESSION_NONE) { // Usando verificação robusta
    session_start();
}
?>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light"> 
        <div class="container-fluid"> 
            
            <a class="navbar-brand" aria-current="page" href="index.php"><h1>MAKE FOR YOU</h1></a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0"> 
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://w.app/gscced" target="_blank">Contato</a>
                    </li>
                </ul>
                
                <div class="d-flex">
                    <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
                        
                        <span class="navbar-text me-3" style="color: #260101; font-weight: 500;">
                            Olá, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!
                        </span>
                        
                        <a href="logout.php" class="btn btn-danger btn-sm">Sair</a>
                        
                    <?php else: ?>
                        
                        <a href="formulario.php" class="btn btn-secondary">Entrar</a>
                        
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>
</header>