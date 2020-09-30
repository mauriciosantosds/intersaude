<div class="col-md-8">
    <div class="card margin-top-20">
        <div class="card-header">
            Consultar associado
        </div>
        <div class="card-body">
            <form action="#" method="POST" id="consulta">
               
                <div class="form-group">
                    <label><strong>Consultar:</strong></label>
                    <div class="input-group mb-2">
                        <input type="text" placeholder="Nome" class="form-control" name="pesquisa" size=30 autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-warning"><i class="icon-search"></i> Pesquisar</button>
                        </span>
                    </div>
                        <div id="livesearch"></div>
                    <div class="input-group">
                        <input type="text" placeholder="CPF" class="form-control" name="pesquisacpf" size=30 autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn btn-warning" id="cpf"><i class="icon-search"></i> Pesquisar</button>
                        </span>
                    </div>
                        <div id="livesearch2"></div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <p><strong>Associado:</strong> <?=(isset($cliente->cliennome))? $cliente->cliennome : "";?> </p> 
                        <hr>
                    </div>
                    <div class="col-md-4">
                            <?php 
                            $btn = "";
                            if(isset($cliente->clienstat)) {
                                if($cliente->clienstat === "A") {
                                    $btn = "btn-success"; 
                                } else {
                                    $btn = "btn-danger";
                                }
                            }
                            $stat = "";
                            if(isset($cliente->clienstat)){
                                if($cliente->clienstat === "A"){
                                    $stat = "Ativo"; 
                                } else {
                                    $stat = "Inativo";
                                }
                            }
                            ?>
                        <p class="btn <?=$btn;?> float-right ml-2" style="cursor:default;"><?=$stat;?></p>
                    </div>
                </div>
                
                <div class="form-group">
                    <label>Dependente (s)</label>
                    <?php if(isset($cliente->cliendepe)){
                            foreach(explode(",",$cliente->cliendepe) as $d){?> 
                                <input type="text" class="form-control mb-2" name="medimaps"
                                value="<?= $d;?>" disabled>
                            <?php } 
                        }?>
                </div>
               
                <div class="form-group">
                    <?php if (isset($alert)) { ?>
                        <div class="alert alert-success"><?=$alert;?></div>
                    <?php } ?>
                </div>
            </form>
            <div class="row">
                <div class="col-md-6">
                    <form action="<?=base_url('consultacadastro/enviar_duvida');?>" method="POST">
                        <div class="form-group">
                            <label for="">Dúvidas, sugestões ou reclamações</label>
                            <textarea name="duvi" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="<?=base_url('consultacadastro/enviar_artigo');?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Tem um artigo? Envie para nós.</label>
                            <textarea name="art" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Anexar arquivo (pdf)</label>
                            <input type="file" name="arqart" class="form-control" accept=".pdf">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-4">
      <div class="card margin-top-20">
        <div class="card-header" style="background-color: #953132;">
            <h5 class="text-center" style="color: #fff">Sac</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                        <h5 style="color:#721c24;">Fale com a gente</h5>
                        <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <p><strong>Telefone: </strong>34 3668-0000</p>
                        <p><strong>WhatsApp: </strong>34 98854-5877</p>
                        <p><strong>E-mail: </strong>sac@planointer.com.br</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                        <p><h6 style="color:#721c24;">Horário de atendimento</h6></p>
                        <p>Seg. à Sex: Das 08h às 18h</p>
                </div>
            </div>
        </div>
    </div>                  
</div>
</div>
</div>