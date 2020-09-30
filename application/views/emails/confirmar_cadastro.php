<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>The Grocery Store Brazil.</title>
    </head>
    <body>
        <h2>The Grocery Store Brazil.</h2>
        <h3>Confimação de cadastro. </h3>
        <p>Olá: <?php echo $nome . " " . $sobrenome ?> </br>
        Muito obrigado por se cadastrar em nosso website.</p>
        <p>Para concluir seu cadastro e liberar sua conta para compras, clique no link abaixo.</p>
        <p><a href="<?php echo base_url("cadastro/confirmar/".md5($email))?>">
            Confirmar cadastro no website!</a></p>
            <h4>Seja bem-vindo e boas compras!<br>The Grocery Store Brazil.</h4>
    </body>
</html>