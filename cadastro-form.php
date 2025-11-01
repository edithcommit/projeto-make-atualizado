<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro - MAKE FOR YOU</title>
    
    <style>
    body{
    background-color:rgba(191, 111, 140, 0.48);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body, html {
    height: 100%;
    font-family: Arial, sans-serif;
}


.container {
    display: flex;
    min-height: calc(100vh - 80px);
    width: 80%;
    margin: 0 auto; 
}

.form-section {
    flex: 1;
    background-color: #ffffff;
    padding: 60px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 0; 
}

.form-section h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
    color: #333;
}

.form-section p {
    margin-bottom: 30px;
    color: #666;
}

input {
    padding: 15px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    width: 100%;
    font-size: 1em;
}

button {
    background-color: #a87177;
    color: white;
    padding: 15px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1em;
}

.image-section {
    flex: 1;
    background-color: #f0d8dd;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0;
}

.image-section img {
    max-width: 100%;
    height: 100%; 
    object-fit: cover;
}

</style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="form-section">
            <h1>Crie sua Conta</h1>
            <p>Junte-se a nós para ter acesso a ofertas exclusivas.</p>
            
            <form method="POST" action="cadastro.php">
                <input type="text" name="nome" placeholder="Nome" required><br>
                <input type="email" name="email" placeholder="Email" required><br>
                <input type="password" name="senha" placeholder="Senha" required><br>
                <button type="submit">Cadastrar</button>
            </form>
            
            <p style="text-align: center; margin-top: 20px; font-size: 0.9em;">
                Já tem conta? <a href="formulario.php" style="color: #a87177; text-decoration: none; font-weight: bold;">Fazer Login</a>
            </p>

        </div>
        <div class="image-section">
            <img src="assets/login.jpg" alt="cadastro">
        </div>
    </div>
</body>
</html>