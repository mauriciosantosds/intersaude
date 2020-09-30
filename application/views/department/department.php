<section class="hero-wrap hero-wrap-2" style="background-image: url('<?=base_url("assets/images/bg_1.jpg");?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Empresas credenciadas</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Empresas credenciadas <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section" style="padding: 2em 0;">
    	<!-- <div class="container"> -->
    		<div class="row justify-content-center">
          <div class="col-md-8 text-center heading-section ftco-animate mb-2">
          	<!-- <span class="subheading">Empresas credenciadas</span> -->
            <p>Aqui você encontra a relação de empresas credenciados à Plano Inter.</p>
          </div>
        </div>
    		<div class="ftco-departments">
					<div class="row">
            <div class="col-md-12 nav-link-wrap">
	            <div class="navbar navbar-light bg-inter justify-content-center">
								
									
										<form class="form-inline" action="<?=base_url("department/search");?>" method="POST">
											<label class="text-white">Cidade</label>
											<select name="cidade" class="form-control mr-2 ml-2" required>
												<option value="" disabled selected>Selecione *</option>
											<?php foreach ($cidades as $c) {
												if (!empty($c->medicida)){?>
												<option value="<?=$c->medicida;?>"><?=$c->medicida;?></option>
											<?php } } ?>
											</select>
											<label class="text-white">Especialidade</label>
											<select name="espec" class="form-control mr-2 ml-2" required>
												<option value="" disabled selected>Selecione *</option>
											<?php foreach ($especscombo as $e) { ?>
												<option value="<?=$e->espec;?>"><?=$e->espec;?></option>
											<?php } ?>
											</select>
											<button class="btn btn-primary search-hover" type="submit">Pesquisar</button>
										</form>
							</div>
	          </div>
					</div>  
	        <div class="col-md-12 tab-wrap">
	            
	            <div class="tab-content bg-light p-4 p-md-5 ftco-animate" id="v-pills-tabContent">

	              <div class="tab-pane py-2 fade show active" id="v-pills-5" role="tabpanel" aria-labelledby="v-pills-day-5-tab">
	              	<div class="row departments">
	              		<div class="col-md-12">
	              			<!-- <h2>Teste</h2> -->
	              			<p></p>
											<div class="row mt-5 pt-2">
											<?php $count = 0;

														foreach($especs as $e) {
							
																
																if($count > 0 & $count % 2 == 0) {
																	echo "</div><div class='row mt-5 pt-2'>";
																}						
											?>
													<div class="col-md-6">
														<div>
															<!-- 	<div class="row">
																	<div class="col-md-12"> -->
																		<a href="<?=$e->medimaps;?>">
																			<img src="<?=base_url($e->mediimg);?>" alt="" width="600px">
																		</a>
																		<!-- <div class="services-2 d-flex">
																			<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center"><span class="flaticon-first-aid-kit"></span></div>
																			<div class="text">
																				<h3><?=$e->medinome;?></h3>
																			</div>
																		</div> -->
																<!-- 	</div>
																</div> -->
																<!-- <div class="row">
																	<div class="col-md-12">
																		<p><i class="icon-school"></i> <?=$e->espec;?></p>
																		<p><i class="icon-stethoscope"></i> <?=$m->medicrm;?></p>
																		<p><i class="ion-ios-pin"></i> <?=$m->mediende;?></p>
																		<p><i class="icon-hospital-o"></i> <?=$m->medicli;?></p>
																		<p><i class="icon-clock-o"></i> <?=$m->medihora;?></p>
																		<p><i class="ion-ios-mail"></i> <?=$m->mediemai;?></p>
																		<p><i class="icon-phone"></i> <?=$m->meditele;?></p>
																	</div>
																</div> -->	
															</div>
													</div>
															<?php $count++; } ?>
															</div>
															<div class="row no-gutters my-5">
          <div class="col text-center">
            <div class="block-27">
						<?=$pagination;?>
              <!-- <ul>
                <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li>
              </ul> -->
            </div>
          </div>
        </div>
	              	<!-- 	</div> -->
	              	</div>
	              </div>
	            </div>
	          </div>  
					
    </section>