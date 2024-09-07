<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Desafio-PHP-0002</title>
</head>
<body>
    <main>
        <h1>Trabalhando com números aleatórios</h1>
        <?php
            $min = 0;
            $max = 100;
            $numero = mt_rand($min, $max);
            echo "<p>Gerando um número aleatório entre $min e $max...<br>O valor gerado foi <strong>$numero</strong></P>";
        ?>
        <input type="button" value="&#x1F501 Gerar outro" onclick="recarregar()">
    </main>
    <script>
        function recarregar() {
            window.location.reload();
        }
    </script>
</body>
</html>