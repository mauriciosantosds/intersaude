<div class="col-md-12">
    <div class="card margin-top-20">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-2">
                        Parceiros credenciados
                    </div>
                    <div class="col-lg-7">
                        <form class="form-inline" action="<?=base_url('dash/list_medi_p_espec');?>" method="POST">   
                            <!-- <label for="staticEmail2" class="sr-only">Especialidade</label> -->
                            <select name="cidade" class="form-control mb-2 mr-sm-2" required>
                                <option value="" selected disabled>Cidade (selecione)</option>
                                <option value="T">Todas</option>
                                <?php foreach($cidades as $c) {?>
                                    <option value="<?=$c->medicida;?>"><?=$c->medicida;?></option>
                                <?php }?>
                            </select>
                            <!-- <label for="staticEmail2" class="sr-only">Especialidade</label> -->
                            <select name="espec" class="form-control mb-2 mr-sm-2" required>
                                <option value="" selected disabled>Especialidade (selecione)</option>
                                <option value="T">Todas</option>
                                <?php foreach($especs as $e) {?>
                                    <option value="<?=$e->espec;?>"><?=$e->espec;?></option>
                                <?php }?>
                            </select>
                            <button type="submit" class="btn btn-warning mb-2"><i class="icon-search"></i> Procurar</button>
                        </form>
                    </div>
                    <div class="col-lg-3">
                        <a href="<?=base_url("dash/medico");?>" class="btn btn-primary float-lg-right"><i class="icon-plus"></i> Inserir</a>
                    </div>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Especialidade</th> 
                        <th scope="col">Estado</th> 
                        <th scope="col">Cidade</th> 
                        <th scope="col">Endereço imagem</th> 
                        <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if (!empty($medicos)) {
                        foreach($medicos as $m) {?>
                        <tr>
                            <td><?=$m->medinome;?></td>
                            <td><?=$m->espec;?></td>
                            <td><?=$m->mediuf;?></td>
                            <td><?=$m->medicida;?></td>
                            <td><img src="<?=base_url($m->mediimg);?>" height="50px"></td>
                            <td>
                                <a href="<?=base_url('dash/update_medi/'.$m->intermedi_id);?>" class="btn btn-warning">Alterar</a>
                                <a href="<?=base_url('dash/remove_medi/'.$m->intermedi_id);?>" class="btn btn-danger">Remover</a>
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