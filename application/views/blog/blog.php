<section class="hero-wrap hero-wrap-2" style="background-image: url(<?=base_url('assets/images/bg_1.jpg');?>);" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread">Blog</h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section bg-light">
			<div class="container">
				<div class="row">
          <?php foreach ($post as $p) { ?>
 
            <div class="col-md-4 ftco-animate">
              <div class="blog-entry">
                <a href="<?=base_url('blog/read_post/'.$p->id)?>" class="block-20" 
                <?=($p->thumb ? 'style="background-image: url('.$p->thumb.'")':"")?>>
                  <div class="meta-date text-center p-2">
                    <span class="day"><?=$p->day;?></span>
                    <span class="mos"><?=$p->month;?></span>
                    <span class="yr"><?=$p->year;?></span>
                  </div>
                </a>
                <div class="text bg-white p-4">
                  <h3 class="heading"><a href="#"><?=$p->post_title;?></a></h3>
                  <p><?=$p->abstract;?></p>
                  <div class="d-flex align-items-center mt-4">
                    <p class="mb-0"><a href="<?=base_url('blog/read_post/'.$p->id)?>" class="btn btn-primary">Leia mais <span class="ion-ios-arrow-round-forward"></span></a></p>
                    <!-- <p class="ml-auto mb-0">
                      <a href="#" class="mr-2"></a>
                      <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                    </p> -->
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="row no-gutters my-5">
          <div class="col text-center">
            <div class="block-27">
             
                
                <?=$pagination;?>
                <!-- <li><a href="#"><i class="ion-ios-arrow-back"></i></a></li> -->
                <!-- <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li> -->
                <!-- <li><a href="#"><i class="ion-ios-arrow-forward"></i></a></li> -->
            
            </div>
          </div>
        </div>
			</div>
		</section>