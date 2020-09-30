<section class="hero-wrap hero-wrap-2" style="background-image: url('<?=base_url('assets/images/bg_1.jpg');?>');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-2 bread"><?=$post->post_title;?></h1>
            <p class="breadcrumbs"><span class="mr-2"><a href="<?=base_url();?>">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="<?=base_url('blog');?>">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span><?=$post->post_title;?> <i class="ion-ios-arrow-forward"></i></span></p>
          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section">
			<div class="container">
				<div class="row">
                    <div class="col-lg-12 ftco-animate">
                        <h2 class="mb-3"><?=$post->post_title;?></h2>
                        <?=$post->post_content;?>
                        <div class="tag-widget post-tag-container mb-5 mt-5">
                        <div class="tagcloud">
                            <?php foreach ($post->terms as $t) { ?>
                                <a href="<?=base_url('blog');?>" class="tag-cloud-link">
                                    <?=$t->name;?>
                                </a>
                                
                            <?php } ?>
                        </div>
                        </div>
                        
                        <!-- <div class="about-author d-flex p-4 bg-light">
                            <div class="bio mr-5">
                                <img src="images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
                            </div>
                            <div class="desc">
                                <h3></h3>
                                <p></p>
                            </div>
                        </div> -->


                        
                    </div> <!-- .col-md-8 -->

                    <!-- <div class="col-lg-4 sidebar ftco-animate">
                        <div class="sidebar-box">
                        <form action="#" class="search-form">
                            <div class="form-group">
                            <span class="icon icon-search"></span>
                            <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                            </div>
                        </form>
                        </div>
                        <div class="sidebar-box ftco-animate">
                            <h3>Category</h3>
                        <ul class="categories">
                            <li><a href="#">Neurology <span>(6)</span></a></li>
                            <li><a href="#">Cardiology <span>(8)</span></a></li>
                            <li><a href="#">Surgery <span>(2)</span></a></li>
                            <li><a href="#">Dental <span>(2)</span></a></li>
                            <li><a href="#">Ophthalmology <span>(2)</span></a></li>
                        </ul>
                        </div>

                        <div class="sidebar-box ftco-animate">
                        <h3>Tag Cloud</h3>
                        <ul class="tagcloud m-0 p-0">
                            <a href="#" class="tag-cloud-link">Medical</a>
                            <a href="#" class="tag-cloud-link">Hospital</a>
                            <a href="#" class="tag-cloud-link">Nurse</a>
                            <a href="#" class="tag-cloud-link">Doctor</a>
                            <a href="#" class="tag-cloud-link">Medicine</a>
                            <a href="#" class="tag-cloud-link">Facilities</a>
                            <a href="#" class="tag-cloud-link">Staff</a>
                        </ul>
                        </div>
                    </div> --> <!-- END COL -->
                </div>
			</div>
		</section>