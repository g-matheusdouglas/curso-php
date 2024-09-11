<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Médias Aritiméticas</title>
</head>
<body>
    <?php 
        $valor1 = $_GET['v1'] ?? '';
        $peso1 = $_GET['p1'] ?? '';
        $valor2 = $_GET['v2'] ?? '';
        $peso2 = $_GET['p2'] ?? '';
        ?>
    <main>
        <h1>Médias Aritméticas</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="v1">1° Valor</label>
            <input type="number" name="v1" id="iv1" value="<?=$valor1?>" require>
            <label for="p1">1° Peso</label>
            <input type="number" name="p1" id="ip1" min="1" value="<?=$peso1?>" require>
            <label for="v2">2° Valor</label>
            <input type="number" name="v2" id="iv2" value="<?=$valor2?>" require>
            <label for="p2">2° Peso</label>
            <input type="number" name="p2" id="ip2" min="1" value="<?=$peso2?>" require>
            <input type="submit" value="Calcular Médias">
        </form>
    </main>
    <section>
        <h2>Cáculo das Médias</h2>
        <?php 
            $smedia = ($valor1 + $valor2) / 2;
            $pmedia = ($valor1*$peso1 + $valor2*$peso2) / ($peso1 + $peso2);
            echo "Analisando os valores $valor1 e $valor2:";
            echo "<ul>
                    <li>A <strong>Média Aritmética Simples</strong> entre os valores é igual a " . number_format($smedia, 2,',','.') . ".</li>
                    <li>A <strong>Média Aritmética Ponderada</strong> com pesos $peso1 e $peso2 é igual a " . number_format($pmedia, 2,',','.') . "</li>
                </ul>";
        ?>
    </section>
</body>
</html>