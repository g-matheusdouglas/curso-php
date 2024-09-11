<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Raízes de um número</title>
</head>
<body>
    <main>
        <?php 
            $numero = $_GET['numero'] ?? 0;
        ?>
        <h1>Informe um número</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="numero">Número</label>
            <input type="number" name="numero" id="inumero" value="<?=$numero?>">
            <input type="submit" value="Calcular Raízes">
        </form>
    </main>
    <section>
        <h2>Resultado final</h2>
        <?php 
            $quadrada = sqrt($numero);
            $cúbica = $numero**(1/3); 
            echo "<p>Analisando o <strong> número $numero</strong>, temos:</p>";
            echo "<ul>
                    <li>A sua raiz quadrada é <strong>" . number_format($quadrada, 3,',','.') . "</strong></li>
                    <li>A sua raiz cúbica é <strong>" . number_format($cúbica, 3,',','.') . "</strong></li>
                </ul>";
        ?>
    </section>
</body>
</html>