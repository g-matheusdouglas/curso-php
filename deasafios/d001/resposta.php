<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Resultado Final</title>
</head>
<body>
    <main>
        <h1>Resultado Final</h1>
        <p>
            <?php
                $numero = $_GET["numero"] ?? 0;
                $antecessor = $numero - 1;
                $sucessor = $numero + 1;
                echo "O número escolhido foi <strong>$numero</strong>";
                echo "<br>O seu <em>antecessor</em> é <strong>$antecessor</strong>";
                echo "<br>O seu <em>sucessor</em> é <strong>$sucessor</strong>";
            ?>
        </p>
        <input type="button" value="&#X2B05; Voltar" onclick="voltar()">
    </main>
    <script>
        function voltar() {
            history.go(-1)
        }
    </script>
</body>
</html>