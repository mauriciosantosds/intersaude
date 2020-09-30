 <footer class="ftco-footer ftco-bg-dark ftco-section" style="padding-bottom: 0px;">
      <div class="container">
        <div class="row">
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <div class="logo">
                <img src="<?=base_url('assets/images/logo-branco.png');?>" alt="" height="60px" style="margin-bottom: 15px;">
              </div>
              <p>Inter Saúde cartão desconto trabalhando de forma incessante em prol da sua saúde.</p>
            </div>
            <div class="ftco-footer-widget mb-5">
            	<!-- <h2 class="ftco-heading-2">Tem alguma dúvida?</h2> -->
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">
                  Av. Prefeito Aracely de Paula, 1710<br> • Loja 01 - Sala 02 - Centro • Araxá - MG
                  </span></li>
	                <li><span class="icon icon-phone"></span><span class="text">(34) 3201-5356</span></li>
	                <li><span class="icon icon-envelope"></span><span class="text">contato@planointer.com.br</span></li>
	              </ul>
	            </div>
	            
            </div>
             
                  
               
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget  ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li>
                  <a href="<?=base_url();?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Home</a>
                </li>
                <li>
                  <a href="<?=base_url('about');?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Institucional</a>
                </li>
                <li>
                  <a href="<?=base_url('credenciado');?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Seja um credenciado</a>
                </li>
                <li>
                  <a href="<?=base_url('department');?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Empresas credenciadas</a>
                </li>
                <li>
                  <a href="<?=base_url('blog')?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Blog</a>
                </li>
                <li>
                  <a href="<?=base_url('contact');?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Contato</a>
                </li>
                <div class="row">
                    <div class="col">
                    
                    </div>
                </div>
            <a href="https://www.instagram.com/planointer/" target="_blank"><img src="<?=base_url('assets/images/insta.png');?>" alt=""></a>
            </div>
            <div class="ftco-footer-widget  ml-md-4">
              <!-- <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                <li class="ftco-animate"><a href="#"><span class="ion-logo-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://facebook.com/intercartaodesconto"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul> -->
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Ffacebook.com%2Fintercartaodesconto&tabs&width=340&height=180&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="180" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    <!-- SnapWidget -->

              <!-- <h2 class="ftco-heading-2">Servicos</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Neurologia</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Odontologia</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Cardiologia</a></li>
                <li><a href="#"><span class="ion-ios-arrow-round-forward mr-2"></span>Dermatologia</a></li>
                <li><a href="<?=base_url('department');?>"><span class="ion-ios-arrow-round-forward mr-2"></span>Mais</a></li>
              </ul> -->
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-5">
              <h2 class="ftco-heading-2">Postagens recentes</h2>
              <?php 
              $count = 0;
              foreach($posts as $p) {
                if($count < 3) {
                ?>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?=$p->thumb;?>);" href="<?=base_url('blog/read_post/'.$p->id);?>"></a>
                <div class="text">
                  <h3 class="heading"><a href="<?=base_url('blog/read_post/'.$p->id);?>"><?= $p->post_title;?></a></h3>
                  <div class="meta">
                    <div><a href="<?=base_url('blog/read_post/'.$p->id);?>"><span class="icon-calendar"></span> <?=$p->day." de ".$p->month.", ".$p->year;?></a></div>
                    <!-- <div><a href="#"><span class="icon-chat"></span> 19</a></div> -->
                  </div>
                </div>
              </div>
              <?php 
                }
                $count++;  
              }
                ?>
              <!-- <div class="block-21 mb-5 d-flex">
                <a class="blog-img mr-4" style="background-image: url(<?=base_url('assets/images/image_2.jpg')?>);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Dec 25, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div> -->
            </div>
          </div>
          <div class="col-md">
          	<div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Horário de atendimento</h2>
            	<h3 class="open-hours pl-4"><span class="ion-ios-time mr-3"></span>Segunda a Sexta das 8:00 às 18:00</h3>
            </div>
            <div class="ftco-footer-widget mb-5">
            	<h2 class="ftco-heading-2">Assine nossa newsletter!</h2>
              <form action="<?=base_url('home/newsletter');?>" class="subscribe-form" method="POST" id="newsletter">
                  <input type="text" name="url" value="https://" style="display:none;">
                <div class="form-group">
                  <input type="email" class="form-control mb-2 text-center" placeholder="Informe seu e-mail" name="email" required>
                  <input type="submit" value="Enviar" class="form-control submit px-3">
                </div>
                <div class="form-group" id="alertnews"></div>
              </form>
            </div>
          </div>
          
        </div>
        <div class="row">
              <div class="col-md-4">
                
              </div>
          </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  
  <script>document.write(new Date().getFullYear());</script> 
  Todos os direitos resevados.
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  
