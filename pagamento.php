<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cep'])) {
    $cep = preg_replace('/\D/', '', $_POST['cep'] ?? '');
    $valor = floatval($_POST['valor'] ?? 0);
    $frete = floatval($_POST['frete'] ?? 0);

    // Atribui frete com base no prefixo do CEP
    $prefixo = substr($cep, 0, 2);
    if (in_array($prefixo, ['70', '71', '72', '73'])) {
        $frete = 10; // Frete especial para DF
    } else {
        $frete = 20; // Frete padrão
    }

    $totalFinal = $valor + $frete;
    $data = date('d/m/Y H:i:s');
    $pedido = rand(1000, 9999);

    $novoPedido = [
        'numero' => $pedido,
        'data' => $data,
        'valor' => $totalFinal,
        'itens' => $_SESSION['carrinho'] ?? []
    ];

    $_SESSION['pedidos'][] = $novoPedido;
    $_SESSION['carrinho'] = [];
    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Confirmação de Pagamento</title>
        <link rel="stylesheet" href="styleCatalogo.css">
    </head>
    <body>
        <div class="container" style="text-align:center; margin-top:50px;">
            <h1>✅ Pagamento Confirmado!</h1>
            <p>Pedido nº <strong><?= $pedido ?></strong> realizado em <strong><?= $data ?></strong></p>
            <p>Valor dos produtos: R$ <?= number_format($valor, 2, ',', '.') ?></p>
            <p>Frete: R$ <?= number_format($frete, 2, ',', '.') ?></p>
            <p><strong>Total pago: R$ <?= number_format($totalFinal, 2, ',', '.') ?></strong></p>
            <p>Obrigado por comprar na <strong>MAKE FOR YOU</strong> 💄</p>
            <a href="pedidos.php"><button style="margin-top:20px;">Ver Meus Pedidos</button></a>
        </div>
    </body>
    </html>
    <?php
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pagamento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleCatalogo.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <div class="container" style="max-width:600px; margin:50px auto;">
        <h2 style="text-align:center;">Informações de entrega</h2>

        <form method="POST" id="form-pagamento">
            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep" required>
            <button type="button" onclick="buscarEndereco()">Buscar Endereço</button>

            <div id="endereco" style="margin-top:10px;"></div>

            <input type="hidden" name="valor" value="<?= htmlspecialchars($_POST['valor'] ?? 0) ?>">
            <input type="hidden" name="frete" id="frete" value="0">

            <button type="submit" style="margin-top:20px;">Finalizar Compra</button>
        </form>
    </div>

    <script>
    function buscarEndereco() {
        const cep = document.getElementById('cep').value.replace(/\D/g, '');
        if (cep.length !== 8) {
            alert('CEP inválido');
            return;
        }

        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(response => response.json())
            .then(data => {
                if (data.erro) {
                    document.getElementById('endereco').innerText = 'CEP não encontrado.';
                    return;
                }

                const cidade = data.localidade;
                const estado = data.uf;
                const prefixo = cep.substring(0, 2);
                let frete = ['70', '71', '72', '73'].includes(prefixo) ? 10 : 20;

                document.getElementById('endereco').innerHTML = `
                    <p><strong>Endereço:</strong> ${data.logradouro}, ${data.bairro}, ${cidade} - ${estado}</p>
                    <p><strong>Frete:</strong> R$ ${frete.toFixed(2)}</p>
                `;
                document.getElementById('frete').value = frete;
            })
            .catch(() => {
                document.getElementById('endereco').innerText = 'Erro ao buscar CEP.';
            });
    }
    </script>
</body>
</html>
