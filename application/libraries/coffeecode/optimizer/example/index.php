<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <?php
    require __DIR__ . "../../../../../vendor/autoload.php";

    $op = new \CoffeeCode\Optimizer\Optimizer();
    echo $op
        ->optimize(
            "Proccel Energia :: empresa de energia solar em Araxá Minas Gerais",
            "A Proccel atua no segmento de projetos e montagens de instalações elétricas comerciais e industriais, com foco no mercado de energia solar localizada em Minas Gerais Araxá.",
            $_SERVER['SERVER_NAME']."/index.php",
            $_SERVER['SERVER_NAME']."/images/logo.png"
        )
        /* ->twitterCard(
            "@robsonvleite",
            "@robsonvleite",
            "upinside.com.br",
            "summary_large_image"
        ) */
        ->openGraph(
            "proccelenergia",
            "pt_BR",
            "article"
        )
        /* ->facebook("626590460695980") *///->facebook(null, [9283729732123, 912837192372, 73642734723])
        ->render();
    ?>
</head>
<body>

<h1><?= $op->title; ?></h1>
<p><?= $op->description; ?></p>

<?php
//echo "<pre>", print_r($op->data(), true), "</pre>";
//echo "<pre>", print_r(array_map("htmlspecialchars", $op->debug()), true), "</pre>";

?>

</body>
</html>