<div class="col-12 col-md-12">
    <div class="card margin-top-20">
        <div class="card-header">
            Cliente
        </div>
        <div class="card-body">
            <form action="<?=base_url('dash/register_cliente'); ?>" method="POST"
            enctype="multipart/form-data">
                <div class="form-group">
                    <?php if (isset($_SESSION["alert"])) { ?>
                        <div class="alert alert-success"><?=$_SESSION["alert"];?></div>
                    <?php unset($_SESSION["alert"]);} ?>
                </div>
                <?php if(isset($id)) {?>
                    <input type="text" name="id" value="<?=$id?>" style="display:none;">
                <?php } ?>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="CPF *" required name="cpf"
                            value="<?=(isset($cliente->cliencpf)) ? $cliente->cliencpf: "";?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Data de nascimetno *" name="dtnasc" required
                            value="<?=(isset($cliente->cliendtnasc)) ? $cliente->cliendtnasc: "";?>">
                        </div>
                        <div class="col">
                            <select name="sexo" class="form-control" required>
                            <?php if (isset($cliente->cliensexo)) {
                                    if($cliente->cliensexo === "M") {
                                        echo '<option value="" disabled>Sexo</option>
                                                <option value="M" selected>Masculino</option>
                                                <option value="F">Feminino</option>';    
                                    } else {
                                        echo '<option value="" disabled>Sexo</option>
                                                <option value="M">Masculino</option>
                                                <option value="F" selected>Feminino</option>'; 
                                    }  
                                } else { 
                            ?>
                                <option value="" selected disabled>Sexo</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="nome"
                        value="<?=(isset($cliente->cliennome)) ? $cliente->cliennome: "";?>"
                        required placeholder="Nome completo *">
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="email" class="form-control" placeholder="E-mail" name="email"
                            value="<?=(isset($cliente->clienemail)) ? $cliente->clienemail: "";?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Celular com DDD *" required name="cel"
                            value="<?=(isset($cliente->cliencelu)) ? $cliente->cliencelu: "";?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Telefone com DDD" name="tel"
                            value="<?=(isset($cliente->clientele)) ? $cliente->clientele: "";?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Cep *" name="cep"
                            value="<?=(isset($cliente->cliencep)) ? $cliente->cliencep: "";?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Endereço *" name="ende"
                            value="<?=(isset($cliente->clienende)) ? $cliente->clienende: "";?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Número" name="numero"
                            value="<?=(isset($cliente->cliennume)) ? $cliente->cliennume: "";?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Complemento" name="comp"
                            value="<?=(isset($cliente->cliencomp)) ? $cliente->cliencomp: "";?>">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Bairro *" required name="bairro"
                            value="<?=(isset($cliente->clienbair)) ? $cliente->clienbair: "";?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea name="deps" id="totdeps" style="display:none;"
                    class="form-control"><?=(isset($cliente->cliendepe)) ? $cliente->cliendepe: "";?></textarea>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <div class="input-group">
                                <input type="text" placeholder="Dependente" class="form-control" id="depenprin">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" id="addepen"><i class="icon-plus"></i></button>
                                </span>
                            </div>
                        </div>
                        <div class="col-2">
                            <select name="status" class="form-control" required>
                                <?php if (isset($cliente->clienstat)) {
                                    if($cliente->clienstat === "A") {
                                        echo '<option value="" disabled>Status</option>
                                                <option value="A" selected>Ativo</option>
                                                <option value="I">Inativo</option>';    
                                    } else {
                                        echo '<option value="" disabled>Status</option>
                                                <option value="A">Ativo</option>
                                                <option value="I" selected>Inativo</option>'; 
                                    }  
                                } else { 
                            ?>
                                <option value="" selected disabled>Status</option>
                                <option value="A">Ativo</option>
                                <option value="I">Inativo</option>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <div id="depen">  
                            </div>
                        </div>      
                    </div>
                
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <input type="text" class="form-control" 
                        name="uf" placeholder="UF (Estado) *" required maxlength="2"
                        value="<?=(isset($cliente->clienesta)) ? $cliente->clienesta: "";?>">
                    </div>
                    <div class="form-group col-md-10">
                        <input type="text" class="form-control" 
                        name="cidade" placeholder="Cidade *" required
                        value="<?=(isset($cliente->cliencida)) ? $cliente->cliencida: "";?>">
                    </div>
                </div>
              
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cadastrar / Alterar</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
</div>
</div>