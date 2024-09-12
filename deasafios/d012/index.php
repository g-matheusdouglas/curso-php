<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora de Tempo</title>
</head>
<body>
    <?php 
        $total_segundos = $_GET['tempo'] ?? 1;
        $semana = 604_800;
        $dia = 86_400;
        $hora = 3_600;
        $minuto = 60;
        $segundo = 1;
    ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?=$_SERVER["PHP_SELF"]?>" method="get">
            <label for="tempo">Qual é total de segundos?</label>
            <input type="number" name="tempo" id="itempo" min="0" require value="<?=$total_segundos?>">
            <input type="submit" value="Calcular">
        </form>
    </main>
    <section>
        <h2>Totalizando tudo</h2>
        <p>Analisando o valor que você digitou, <strong><?=number_format($total_segundos, 0,',','.')?> segundos</strong> equivalem a um total de:</p>
        <?php 
            $sobra = $total_segundos;
            // Total de Semanas
            $semanas = intdiv($sobra, $semana);
            $sobra %= $semana;
            // Total de Dias
            $dias = intdiv($sobra, $dia);
            $sobra %= $dia;
            // Total de Horas
            $horas = intdiv($sobra, $hora);
            $sobra %= $hora;
            // Total de Minutos
            $minutos = intdiv($sobra, $minuto);
            $sobra %= $minuto;
            // Total de Segundos
            $segundos = $sobra;
        
            echo "<ul>
                <li>$semanas semanas</li>
                <li>$dias dias</li>
                <li>$horas horas</li>
                <li>$minutos minutos</li>
                <li>$segundos segundos</li>
            </ul>";
        ?>
    </section>
</body>
</html>