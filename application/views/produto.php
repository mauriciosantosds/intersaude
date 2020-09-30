<div id="homebody">
    <div class="alinhado-centro borda-base espaco-vertical">
        <?php echo heading($produtos[0]->titulo,3); ?>
    </div>
    <div class="row-fluid">
        <div class="span4">
                <?php echo img(base_url("assets/img/produto-sem-foto.png")); ?>
        </div>
        <div class="span8">
            <?php
                foreach($produtos as $produto){
                    echo "<p>".$produto->descricao."</p>".
                    heading($produto->codigo,6).
                    heading( reais($produto->preco) ,5);
                }
            ?>
        </div>
    </div>
</div>