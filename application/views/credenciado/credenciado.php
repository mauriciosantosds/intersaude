<section class="hero-wrap hero-wrap-2" style="background-image: url('<?=base_url("assets/images/bg_1.jpg");?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Seja um credenciado</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Área do credenciado <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
	<section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-12 p-4 p-md-5 order-md-last bg-light">
						<form action="<?=base_url('credenciado/email');?>" method="POST">
              <div class="form-group">
                <?php if (isset($alert)) { ?>
                <div class="alert alert-success"><?=$alert;?></div>
                <?php } ?>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-2">
                    <label>Tipo de cadastro:</label>
                  </div>
                  <div class="col-md-4">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="options" value="pf" checked>
                      <label class="form-check-label">Pessoa física</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="options" value="pj">
                      <label class="form-check-label">Pessoa jurídica</label>
                    </div>

                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="CPF *" name="cpf" required>
                    <input type="text" class="form-control" placeholder="CNPJ *" name="cnpj" style="display:none;">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Nome *" name="nome" required>
                    <input type="text" class="form-control" placeholder="Razão social *" name="rsocial" style="display:none;">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="E-mail *" name="email" required>
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Telefone" name="tel">
                  </div>
                  <div class="col-md-3">
                    <input type="text" class="form-control" placeholder="Celular *" name="cel" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">Endereço: </div>
                </div>
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="CEP *" name="cep" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Logradouro *" name="logradouro" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Número" name="numero">
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="form-row">
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Complemento" name="complemento">
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Bairro *" name="bairro" required>
                  </div>
                  <div class="col">
                    <input type="text" class="form-control" placeholder="Cidade *" name="cidade" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Estado</label>
                <div class="form-row">
                  <div class="col-md-4"> 
                    <select name="estado" id="" class="form-control" placeholder="Selecione" required>
                      <option value="" disabled selected>Selecione *</option>
                          <option value="Acre">Acre</option>
                          <option value="Alagoas">Alagoas</option>
                          <option value="Amapá">Amapá</option>
                          <option value="Amazonas">Amazonas</option>
                          <option value="Bahia">Bahia</option>
                          <option value="Ceará">Ceará</option>
                          <option value="Distrito Federal">Distrito Federal</option>
                          <option value="Espirito Santo">Espirito Santo</option>
                          <option value="Goiás">Goiás</option>
                          <option value="Maranhão">Maranhão</option>
                          <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                          <option value="Mato Grosso">Mato Grosso</option>
                          <option value="Minas Gerais">Minas Gerais</option>
                          <option value="Pará">Pará</option>
                          <option value="Paraíba">Paraíba</option>
                          <option value="Paraná">Paraná</option>
                          <option value="Pernambuco">Pernambuco</option>
                          <option value="Piauí">Piauí</option>
                          <option value="Rio de Janeiro">Rio de Janeiro</option>
                          <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                          <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                          <option value="Rondônia">Rondônia</option>
                          <option value="Roraima">Roraima</option>
                          <option value="Santa Catarina">Santa Catarina</option>
                          <option value="São Paulo">São Paulo</option>
                          <option value="Sergipe">Sergipe</option>
                          <option value="Tocantins">Tocantins</option>
                    </select>
                  </div>
                </div>
                <div style="display:none;">
                    <p><input type="text" name="url" value="http://"></p>
                </div>
              </div>
              <div class="form-group">
                    <textarea name="obs" class="form-control" placeholder="Observações"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar" class="btn btn-primary py-3 px-5">
              </div>
            </form>
					</div>
					
				</div>
			</div>
		</section>