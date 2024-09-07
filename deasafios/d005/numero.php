<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analisador de Número Real</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section>
        <h1>Analisador de Número Real</h1>
        <?php 
            $numero = $_POST["numero"] ?? 0;

            echo "<p>Analisado o número <strong>" . number_format($numero, 3, ',', '.') . "</strong> informado pelo usuário.</p>";

            $inteiro = (integer) $numero;
            $fracionaria = $numero - $inteiro;

            echo "<ul>
                    <li>A parte interia do número é <strong>" . number_format($inteiro, 0, ',', '.') . "</strong></li>
                    <li>A parte fracionária do número é <strong>" . number_format($fracionaria, 3, ',', '') . "</strong></li>
                </ul>";
        ?>
        <input type="button" value="Voltar" onclick="history.go(-1)">
    </section>
</body>
</html>