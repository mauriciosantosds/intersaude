<div class="col-12 col-md-8">
    <div class="card margin-top-20">
        <div class="card-header">
            Especialidade
        </div>
        <div class="card-body">
            <form action="<?=base_url('dash/register_espe'); ?>" method="POST">
                <?php if(isset($course["id"])) {?>
                    <input type="hidden" name="id" value="<?=$course['id']?>">
                <?php } ?>
                <div class="form-group">
                    <input type="hidden" name="id"
                    <?php if (isset($id)) { ?>
                        value="<?=$id?>"
                    <?php  } ?>
                    >
                    <input type="text" class="form-control" name="espe"
                        placeholder="Especialidade"
                        <?php if (isset($espec)) { ?>
                            value="<?= $espec->espec;?>"
                        <?php } ?>
                        required>
                </div>
                
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                </div>
                <div class="form-group">
                    <?php if (isset($alert)) { ?>
                        <div class="alert alert-success"><?=$alert;?></div>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
    
</div>
</div>
</div>