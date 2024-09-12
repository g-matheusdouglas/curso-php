<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Simulando um Caixa Eletrônico</title>
    <style>
        small {
            font-size: 0.6rem;
        }
        ul > li {
            margin-bottom: 10px;
        }
        img.nota {
            max-height: 50px;
        }
    </style>
</head>
<body>
    <?php 
        $padrão = numfmt_create("pt-br", NumberFormatter::CURRENCY);
        $saque = $_GET['valor'] ?? 0;
    ?>
    <main>
        <h1>Caixa Eletrônico</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="valor">Qual valor você deseja sacar? (R$)<sup>*</sup></label>
            <input type="number" name="valor" id="ivalor" min="0" step="5" required value="<?=$saque?>">
            <p><small>*Notas disponíveis: <strong>$ 100, R$ 50, R$ 10 e R$ 5</strong></small></p>
            <input type="submit" value="Sacar">
        </form>
    </main>
    <section>
        <?php 
            $resto = $saque;

            // Total de Notas de R$ 100
            $notas_100 = intdiv($resto, 100);
            $resto %= 100;

            // Total de Notas de R$ 50
            $notas_50 = intdiv($resto, 50);
            $resto %= 50;

            // Total de Notas de R$ 10
            $notas_10 = intdiv($resto, 10);
            $resto %= 10;

            // Total de Notas de R$ 5
            $notas_5 = intdiv($resto, 5);
        ?>
        <h2>Saque de <?=numfmt_format_currency($padrão, $saque, "BRL")?> Realizado</h2>
        <p>O caixa eletrônico vai te entregar as seguintes notas:</p>
        <ul>
            <li><img class="nota" src="./imagens/100-reais.jpg" alt="100 reais"> X <?=$notas_100?></li>
            <li><img class="nota" src="./imagens/50-reais.jpg" alt="100 reais"> X <?=$notas_50?></li>
            <li><img class="nota" src="./imagens/10-reais.jpg" alt="100 reais"> X <?=$notas_10?></li>
            <li><img class="nota" src="./imagens/5-reais.jpg" alt="100 reais"> X <?=$notas_5?></li>
        </ul>
    </section>
</body>
</html>