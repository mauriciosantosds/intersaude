<section class="hero-wrap hero-wrap-2" style="background-image: url('<?=base_url("assets/images/bg_1.jpg");?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Contato</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Contato <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
			<div class="container">
				<div class="row d-flex align-items-stretch no-gutters">
					<div class="col-md-6 p-4 p-md-5 order-md-last bg-light">
						<form action="#" id="contact">
              <input type="text" value="https://" name="url" style="display:none;">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Seu Nome" name="nome" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Seu E-mail" name="email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Assunto" name="assunto" required>
              </div>
              <div class="form-group">
                <textarea name="mensagem"  cols="30" rows="7" class="form-control" placeholder="Menssagem" required></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar" class="btn btn-primary py-2 px-5">
              </div>
            </form>
					</div>
					<div class="col-md-6 d-flex align-items-stretch">
						<div id="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3758.721917093608!2d-46.94390728564148!3d-19.59641083308164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94b0371df59eb193%3A0x300f6a41cf662648!2sAv.%20Pref.%20Aracely%20de%20Paula%2C%201710%20-%20Loja%2001%20-%20Sala%2002%20-%20Centro%2C%20Arax%C3%A1%20-%20MG%2C%2038184-023!5e0!3m2!1spt-BR!2sbr!4v1571358316588!5m2!1spt-BR!2sbr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
            </div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="ftco-section contact-section">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Informações de contato</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-4 d-flex">
          	<div class="bg-light d-flex align-self-stretch box p-4">
	            <p><span>Endereço:</span> Av. Prefeito Aracely de Paula, 1710 • Loja 01 - Sala 02 - Centro • Araxá - MG</p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="bg-light d-flex align-self-stretch box p-4">
	            <p><span>Telefone:</span> <a href="#">(34) 3201-5356</a></p>
	          </div>
          </div>
          <div class="col-md-4 d-flex">
          	<div class="bg-light d-flex align-self-stretch box p-4">
	            <p><span>Email:</span> <a href="mailto:info@yoursite.com">contato@planointer.com.br</a></p>
	          </div>
          </div>
          <!-- <div class="col-md-3 d-flex">
          	<div class="bg-light d-flex align-self-stretch box p-4">
	            <p><span>Website</span> <a href="#">yoursite.com</a></p>
	          </div>
          </div> -->
        </div>
      </div>
    </section>
    <!-- Modal -->
<div class="modal fade" id="alertmodal" tabindex="-1" role="dialog" aria-labelledby="alertModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="alert alert-primary">Recebemos sua solicitação.</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Sair</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->