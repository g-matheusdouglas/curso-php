<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cálculo de Idade</title>
</head>
<body>
    <main>
        <?php 
            date_default_timezone_set('America/Sao_Paulo');
            $atual = date('Y');
            $nasc = $_GET['nasc'] ?? '2000';
            $ano = $_GET['ano'] ?? $atual;
        ?>
        <h1>Calculando a sua idade</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="nasc">Em que ano você nasceu?</label>
            <input type="number" name="nasc" id="inasc" min="1900" max="<?=$atual?>" require value="<?=$nasc?>">
            <label for="ano">Quer saber sau idade em que ano? (atualmente estamos em <strong><?=$atual?></strong>)</label>
            <input type="number" name="ano" id="iano" min="1900" require value="<?=$ano?>">
            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>
    <section>
            <h2>Resultado</h2>
            <?php
                $idade = $ano - $nasc;
                if ($idade > 1) {
                    echo "<p>Quem nasceu em $nasc vai ter <strong>$idade anos</strong> em $ano!</p>";
                } elseif ($idade == 1) {
                    echo "<p>Quem nasceu em $nasc vai ter <strong>$idade ano</strong> em $ano!</p>";
                } elseif ($idade == 0) {
                    if ($nasc == $atual) {
                        echo "<p>Quem nasceu em $nasc é atualmente um <strong>recém-nascido</strong> em $ano!</p>";
                    }else {
                        echo "<p>Quem nasceu em $nasc era atualmente um <strong>recém-nascido</strong> no ano de $ano!</p>";
                    }
                } else {
                    echo "<p>Você não dígitou uma data valida!<br>Tente colocar um Ano atual <strong>MAIOR</strong> que a data de Nascimento.</p>";
                }        
            ?>
        </section>
</body>
</html>