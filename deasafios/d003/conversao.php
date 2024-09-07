<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conversor de Moedas v1.0</title>
</head>
<body>
    <main>
        <h1>Consersor de Moedas v1.0</h1>
        <p>
            <?php
                // Cotação copiada do Google
                $cotacao = 5.75;

                // Quando $$ você tem
                $real = $_GET["din"] ?? 0;

                // Equivalência em dólar
                $dolar = $real / $cotacao;

                // Formatação de moedas com internacionalização
                // Biblioteca intl (Internallization PHP)
                $padrão = numfmt_create("pt-br", NumberFormatter::CURRENCY);
                
                // Mostrar o resultado
                echo "Seus " . numfmt_format_currency($padrão, $real, "BRL") . " equivalem a <strong>" .  numfmt_format_currency($padrão, $dolar, "USD"). "</strong>
                <br><small><strong>*Cotação fixa de " . numfmt_format_currency($padrão,$cotacao, "BRL")
                 . "</strong> Informada diretamente no código.</small>";

                // Outra maneira de Formatar em número é usando o number_format()
                // EX: number_format($real, 2, ',', '.')
            ?>
        </p>
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">
    </main>
</body>
</html>