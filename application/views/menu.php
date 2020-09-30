 <div class="bg-top navbar-light">
    	<div class="container">
				<div class="row no-gutters d-flex align-items-center">
    			<div class="col-md-4 d-flex align-items-center py-4">
    				<a class="navbar-brand" href="<?=base_url();?>"><img src="<?=base_url('assets/images/logo.png');?>" alt="" height="60px"></a>
    			</div>
	    		<div class="col-lg-8 d-none d-md-block">
						<div class="row d-flex">
							<div class="col-md pr-1 d-flex topper align-items-center justify-content-end">
								<div class="icon bg-white mr-2 d-flex justify-content-center align-items-center" style="background: #953132 !important;"><span class="icon-mail_outline" style="color:white;"></span></div>
								<span class="text">contato@planointer.com.br</span>
							</div>
					    <div class="col-md pr-1 d-flex topper align-items-center justify-content-end">
					    	<div class="icon bg-white mr-2 d-flex justify-content-center align-items-center" style="background: #953132 !important;"><span class="icon-phone2" style="color:white;"></span></div>
						    <span class="text">Telefone: (34) 3201-5356</span>
							</div>
					    <div class="col-md pr-1 d-flex topper align-items-center justify-content-end">
					    	<div class="icon bg-white mr-2 d-flex justify-content-center align-items-center" style="background: #0ecb4d !important;"><span class="icon-whatsapp" style="color:white;"></span></div>
						    <a href="https://api.whatsapp.com/send?phone=3498442-1815" target="_blank">
									<span class="text" style="color:rgba(0, 0, 0, 0.6);">Whats: 34 98442-1815</span>
								</a>
							</div>
				    </div>
					</div>
		    </div>
		  </div>
</div>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
				<p class="button-custom order-lg-last mb-0"><a href="<?=base_url('#associado')?>" class="btn btn-secondary py-2 px-3"
				style="border-radius: 20px;">Seja um associado</a></p>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
						<li class="nav-item <?= ($page == "home" ? "active": "")?>">
							<a href="<?=base_url();?>" class="nav-link">Home</a>
						</li>
						<li class="nav-item <?= ($page == "about" ? "active": "")?>">
							<a href="<?=base_url('about');?>" class="nav-link">Institucional</a>
						</li>
	        	<li class="nav-item <?= ($page == "credenciado" ? "active": "")?>">
							<a href="<?=base_url('credenciado');?>" class="nav-link">Seja um credenciado</a>
						</li>
	        	<li class="nav-item <?= ($page == "department" ? "active": "")?>">
							<a href="<?=base_url('department');?>" class="nav-link">Empresas credenciadas</a>
						</li>
	        	<li class="nav-item">
							<a href="<?=base_url('login');?>" class="nav-link">Restrito</a>
						</li>
	        	<li class="nav-item <?= ($page == "blog" ? "active": "")?>">
							<a href="<?=base_url('blog')?>" class="nav-link">Blog</a>
						</li>
	          <li class="nav-item <?= ($page == "contact" ? "active": "")?>">
							<a href="<?=base_url('contact');?>" class="nav-link">Contato</a>
						</li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->