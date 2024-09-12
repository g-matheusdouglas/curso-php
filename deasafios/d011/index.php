<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reajustando Preços</title>
</head>
<body>
    <?php 
        $padrão = numfmt_create("pt-br", NumberFormatter::CURRENCY);
        $preço = $_GET['preco'] ?? 0;
        $percentual = $_GET['percentual'] ?? 0;
    ?>
    <main>
        <h1>Reajustador de Preços</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="ipreco" min="0" required value="<?=$preço?>">
            <label for="percentual">Qual será o percentual de reajuste? (<strong><span id="p">?</span>%</strong>)</label>
            <input type="range" name="percentual" id="ipercentual" min="0" max="100" step="1" value="<?=$percentual?>" oninput="mudaValor()">
            <input type="submit" value="Reajustar">
        </form>
    </main>
    <section>
        <?php 
            $npreço = $preço + ($preço * $percentual / 100);
        ?>
        <h2>Resultado do Reajuste</h2>
        <p>O produto que custava <?=numfmt_format_currency($padrão, $preço, "BRL")?>, com <strong><?=$percentual?>% de aumento</strong> vai passar a custar <strong><?=numfmt_format_currency($padrão, $npreço, "BRL")?></strong> a partir de agora.</p>
    </section>
    <script>
        // Declarações automáticas
        mudaValor()

        function mudaValor() {
            p.innerText = ipercentual.value;
        }
    </script>
</body>
</html>