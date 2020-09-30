<div class="col-12 col-md-8">
    <div class="card margin-top-20">
        <div class="card-header">
            Médico credenciado
        </div>
        <div class="card-body">
            <form action="<?=base_url('dash/update_medi_r'); ?>" method="POST"
            enctype="multipart/form-data">
                <?php if(isset($id)) {?>
                    <input type="text" name="id" value="<?=$id?>" style="display:none;">
                <?php } ?>
                <div class="form-group">
                    <label>Especialidade</label>
                    <select name="idespe" id="idespe" class="form-control">
                         <?php if (isset($medico->espec)) { ?>
                            <option value="<?= $medico->interespe_id?>" selected><?= $medico->espec?></option>
                        <?php } ?>
                        <?php foreach ($especs as $e) {?>
                            <option value="<?=$e->id;?>"><?=$e->espec;?></option>
                        <?php } ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Nome completo:</label>
                    <input type="text" class="form-control" name="medinome"
                        <?php if (isset($medico->medinome)) { ?>
                            value="<?= $medico->medinome?>"
                        <?php } ?>
                        required>
                </div>
                <div class="form-group">
                    <label>Link google maps (Opicional)</label> 
                    <input type="text" class="form-control" name="medimaps"
                        placeholder="Ex: https://maps.google.com"
                        <?php if (isset($medico->medimaps)) { ?>
                            value="<?= $medico->medimaps?>"
                        <?php } ?>
                        >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label>Estado</label>
                        <input type="text" class="form-control" id="mediuf"
                        name="mediuf" placeholder="UF" required
                        <?php if (isset($medico->mediuf)) { ?>
                            value="<?= $medico->mediuf?>"
                        <?php } ?>>
                    </div>
                    <div class="form-group col-md-10">
                        <label>Cidade</label>
                        <input type="text" class="form-control" id="medicida"
                        name="medicida" placeholder="Cidade" required
                        <?php if (isset($medico->medicida)) { ?>
                            value="<?= $medico->medicida?>"
                        <?php } ?>>
                    </div>
                </div>
                <div class="form-group">
                    <label>Imagem (cartão de visitas tam. max. 8mb)</label> 
                    <input type="file" class="form-control" name="mediimg" accept="image/*"
                     id="mediimg">
                </div>
                <div class="form-group">
                    <img id="showimg"  height="100px"
                    <?php if (isset($medico->mediimg)) { ?>
                            src="<?=base_url($medico->mediimg);?>"
                        <?php } ?>>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar / Alterar</button>
                </div>
                <div class="form-group">
                    <?php if (isset($_SESSION["alert"])) { ?>
                        <div class="alert alert-success"><?=$_SESSION["alert"];?></div>
                    <?php unset($_SESSION["alert"]); }  ?>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>