<div class="col-12 col-md-8">
    <div class="card margin-top-20">
        <div class="card-header">
            Médico credenciado
        </div>
        <div class="card-body">
            <form action="<?=base_url('dash/register_medi'); ?>" method="POST"
            enctype="multipart/form-data">
                <?php if(isset($course["id"])) {?>
                    <input type="hidden" name="id" value="<?=$course['id']?>">
                <?php } ?>
                <div class="form-group">
                    <label>Especialidade</label>
                    <select name="idespe" id="idespe" class="form-control">
                        <?php foreach ($especs as $e) {?>
                            <option value="<?=$e->id;?>"><?=$e->espec;?></option>
                        <?php } ?>
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Nome completo:</label>
                    <input type="text" class="form-control" name="medinome"
                        <?php if (isset($course["courswork"])) { ?>
                            value="<?= $course["courswork"]?>"
                        <?php } ?>
                        required>
                </div>
                <div class="form-group">
                    <label>Link google maps (Opcional)</label> 
                    <input type="text" class="form-control" name="medimaps"
                        placeholder="Ex: https://maps.google.com"
                        <?php if (isset($course["courswork"])) { ?>
                            value="<?= $course["courswork"]?>"
                        <?php } ?>
                        >
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label>Estado</label>
                        <input type="text" class="form-control" id="mediuf"
                        name="mediuf" placeholder="UF" required>
                    </div>
                    <div class="form-group col-md-10">
                        <label>Cidade</label>
                        <input type="text" class="form-control" id="medicida"
                        name="medicida" placeholder="Cidade" required>
                    </div>
                </div>
                <div class="form-group">
                    <label>Imagem (cartão de visitas tam. max. 8mb)</label> 
                    <input type="file" class="form-control" name="mediimg" accept="image/*"
                    required id="mediimg">
                </div>
                <div class="form-group">
                    <img id="showimg"  height="100px">
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