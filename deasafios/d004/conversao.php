<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Conversor de Moedas Avançado</title>
</head>
<body>
    <main>
        <h1>Consersor de Moedas Avançado</h1>
        <p>
            <?php
                // Cotação vinda da API do Banco Central
                $início = date("m-d-Y", strtotime("-7 days"));
                $fim = date("m-d-Y");
                $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=%27'. $início .'%27&@dataFinalCotacao=%27'. $fim .'%27&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';

                $dados = json_decode(file_get_contents($url), true);

                $cotacao = $dados["value"][0]["cotacaoCompra"];

                // Quando $$ você tem
                $real = $_GET["din"] ?? 0;

                // Equivalência em dólar
                $dolar = $real / $cotacao;

                // Formatação de moedas com internacionalização
                // Biblioteca intl (Internallization PHP)
                $padrão = numfmt_create("pt-br", NumberFormatter::CURRENCY);
                
                // Mostrar o resultado
                echo "<p>Seus " . numfmt_format_currency($padrão, $real, "BRL") . " equivalem a <strong>" .  numfmt_format_currency($padrão, $dolar, "USD"). "</strong></p>";

                // Outra maneira de Formatar em número é usando o number_format()
                // EX: number_format($real, 2, ',', '.')
            ?>
        </p>
        <input type="button" value="Voltar" onclick="javascript:history.go(-1)">
    </main>
</body>
</html>