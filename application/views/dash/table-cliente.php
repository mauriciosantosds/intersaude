<div class="col-md-12">
    <div class="card margin-top-20">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-2">
                        Clientes
                    </div>
                    <div class="col-lg-7">
                        <form class="form-inline" action="<?=base_url('dash/list_cliente');?>" method="POST">   
                            <!-- <label for="staticEmail2" class="sr-only">Especialidade</label> -->
                            <input type="text" class="form-control mb-2 mr-sm-2" name="pesquisa" placeholder="Nome">
                            <input type="text" class="form-control mb-2 mr-sm-2" name="pesquisacpf" placeholder="CPF">
                            <button type="submit" class="btn btn-warning mb-2"><i class="icon-search"></i> Procurar</button>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <a href="<?=base_url("dash/cliente");?>" class="btn btn-primary float-lg-right"><i class="icon-plus"></i> Inserir</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th> 
                            <th scope="col">E-mail</th> 
                            <th scope="col">Celular</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        if (!empty($clientes)) {
                            foreach($clientes as $c) {
                                $sexo = ($c->cliensexo === "M") ? "Masculino" : "Feminino";
                                $celu = $c->cliencelu = $this->formatphone->formatCel($c->cliencelu);
                                $tele = $c->clientele = $this->formatphone->formatCel($c->clientele);
                                ?>
                            <tr>
                                <td><?=$c->cliennome;?></td>
                                <td><?=$c->cliencpf;?></td>
                                <td><?=$c->clienemail;?></td>
                                <td><?=$celu;?></td>
                                <td><?=$tele;?></td>
                                <td>
                                    <a href="<?=base_url('dash/update_clien/'.$c->id);?>" class="btn btn-warning">Alterar</a>
                                    <a href="<?=base_url('dash/remove_clien/'.$c->id);?>" class="btn btn-danger">Remover</a>
                                </td>
                            </tr>
                        <?php }}  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>
</div>
</div>