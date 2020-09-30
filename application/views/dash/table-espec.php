<div class="col-12 col-md-9">
    <div class="card margin-top-20">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Especialidades
                    </div>
                    <div class="col-6">
                        <a href="<?=base_url('dash/espec');?>" class="btn btn-primary float-right"><i class="icon-plus"></i> Inserir</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Especialidade</th>
                        <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($especs as $e) {?>
                        <tr>
                            <td><?=$e->espec;?></td>
                            <td>
                                <a href="<?=base_url('dash/update_espe/'.$e->id);?>" class="btn btn-warning">Alterar</a>
                                <a href="<?=base_url('dash/remove_espe/'.$e->id);?>" class="btn btn-danger">Remover</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>
            </div>
        </div>
</div>
</div>
</div>