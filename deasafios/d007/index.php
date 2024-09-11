<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Salário Mínimo</title>
    <style>
        
    </style>
</head>
<body>
    <?php 
        // Capturando os dados do Formulário Retroalimentado
        $salario = $_GET['salario'] ?? 0;
        $minimo = 1_412.00;
        $padrão = numfmt_create("pt-br", NumberFormatter::CURRENCY);
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="salario">Salário (R$)</label>
            <input type="number" name="salario" id="isalario" step="0.01" value="<?=$salario?>">
            <p>Considerando o salário mínimo de <strong><?=numfmt_format_currency($padrão, $minimo, "BRL")?></strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section>
           <h2>Resultado Final</h2>
           <?php
                $quantidade = intdiv($salario, $minimo);
                $restante = $salario % $minimo;
                if ($restante > 0) {
                    if ($quantidade != 1) {
                        echo "<p>Quem recebe um salário de " . numfmt_format_currency($padrão, $salario, "BRL") . " ganha <strong>$quantidade salários mínimos</strong> + " . numfmt_format_currency($padrão, $restante, "BRL") . ".</p>";
                    } else {
                        echo "<p>Quem recebe um salário de " . numfmt_format_currency($padrão, $salario, "BRL") . " ganha <strong>$quantidade salário mínimo</strong> + " . numfmt_format_currency($padrão, $restante, "BRL") . ".</p>";
                    }
                } elseif ($quantidade != 1) {
                    echo "<p>Quem recebe um salário de " . numfmt_format_currency($padrão, $salario, "BRL") . " ganha exatamente <strong>$quantidade salários mínimos</strong>.</p>";
                } else {
                    echo "<p>Essa pessoa recebe <strong>1 salário mínimo</strong> de <strong>" . numfmt_format_currency($padrão, $minimo, "BRL") . "</strong>.</p>";
                }
           ?>
    </section>
</body>
</html>