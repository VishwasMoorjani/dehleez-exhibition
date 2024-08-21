<?php include('header.php'); ?>

<!-- Banners -->
<section class="inner-pages text-center">
	<div class="container">
		<div class="white_text div_zindex">
			<h1 class="page_title">Upcoming Exhibitions</h1>
		</div>
	</div>
	<div class="dark-overlay"></div>
</section>
<!-- /Banners -->

<!-- Upcoming Event -->
<section class="our_articles single_article">
	<div class="container">
		<div class="row">

			<?php foreach($exhibitions as $exhibition){ 
				$date1 = new DateTime($exhibition['start_date']);
				$date2 = new DateTime();
				if($date1 >= $date2){
				?>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<div class="event_inner">
					<div class="listing-thumb">
						<a href="<?=base_url('stalls/'.$exhibition['link'])?>">
							<img src="<?=base_url("assets/front/images/".$exhibition['image']); ?>" class="img-fluid" alt="image">
						</a>
						<div class="event-status">Upcoming </div>
						<div class="event-price"><?=$exhibition['venue']?></div>
						<!-- <ul class="event_icon">
							<li><a href="#" data-post-type="grids" data-post-id="2289" data-success-text="Saved" class="status-btn add-to-fav add-to-fav Save" title="Add To Bookmark"><i class="fa fa-bookmark-o"></i></a></li>
							<li><a href="javascript:void(0)" class=" interested sl-buttons sl-buttons-2289" data-nonce="8a4226b7a9" data-post-id="2289" data-iscomment="0" title="interest"><em class="sl-icons"><i class="fa fa-star-o"></i></em></a><span id="sl-loaders"></span></li>
							<li class="dropdown"><a href="#" class="" data-bs-toggle="dropdown" title="Share This Event" aria-expanded="false"><i class="fa fa-share"></i> </a>
								<ul class="dropdown-menu dp_social_share">

									<li><a href="#" target="_blank"><i class="fa fa-facebook"></i>Facebook </a></li>
									<li><a href="#" target="_blank"><i class="fa fa-twitter"></i>Twitter </a></li>
									<li><a href="#" target="_blank"><i class="fa fa-linkedin"></i>Linkedin </a></li>

								</ul>
							</li>
						</ul> -->
					</div>
					<div class="js-grid-item-body event_body__BfZIC">
						<div class="event_calendar__2x4Hv">
							<span class="event_month__S8D_o color-primary"><?php $date=date_create($exhibition['start_date']); echo date_format($date, "D") ?></span>
							<span class="event_date__2Z7TH"><?php $date=date_create($exhibition['start_date']); echo date_format($date, "d") ?></span>
						</div>

						<div class="event_content__2fB-4">
							<h2 class="event_title__3C2PA"><a href="<?=base_url('stalls/'.$exhibition['link'])?>"><?=$exhibition['name']?></a></h2>

							<ul class="event_meta__CFFPg list-none">
								<li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-calendar"> </i><?php $date=date_create($exhibition['start_date']); echo date_format($date, "Fd Y"); $date=date_create($exhibition['end_date']); echo "-".date_format($date, "Fd Y"); ?></span></li>
								<!--<li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-clock-o"> </i>10:00 AM - 8:00 PM</span></li>-->

								<li class="event_metaList__1bEH text-ellipsis"><span><a href="#" target="_blank"><span><i class="fa fa-map-marker"></i><?=$exhibition['venue']?></span></a></span></li>
								
								<a class="btn btn-danger m-3" style="border-radius:5px" href="<?=base_url('stalls/'.$exhibition['link'])?>">Book Now</a>
								
							</ul>
						</div>
					</div>


				</div>
			</div>
			<?php 
		}
		 } ?>

			<!-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
				<div class="event_inner">
					<div class="listing-thumb">
						<a href="#"><img src="assets/images/two.jpg" class="img-fluid" alt="image"></a>
						<div class="event-status">Upcoming </div>
						<div class="event-price">$100</div>
						<ul class="event_icon">
							<li><a href="#" data-post-type="grids" data-post-id="2296" data-success-text="Saved" class="status-btn add-to-fav add-to-fav Save" title="Add To Bookmark"><i class="fa fa-bookmark-o"></i></a></li>
							<li><a href="javascript:void(0)" class=" interested sl-buttons sl-buttons-2296" data-nonce="8a4226b7a9" data-post-id="2296" data-iscomment="0" title="interest"><em class="sl-icons"><i class="fa fa-star-o"></i></em></a><span id="sl-loaders1"></span></li>
							<li class="dropdown"><a href="#" class="" data-bs-toggle="dropdown" title="Share This Event" aria-expanded="false"><i class="fa fa-share"></i> </a>
								<ul class="dropdown-menu dp_social_share">

									<li><a href="#" target="_blank"><i class="fa fa-facebook"></i>Facebook </a></li>
									<li><a href="#" target="_blank"><i class="fa fa-twitter"></i>Twitter </a></li>
									<li><a href="#" target="_blank"><i class="fa fa-linkedin"></i>Linkedin </a></li>

								</ul>
							</li>
						</ul>
					</div>
					<div class="js-grid-item-body event_body__BfZIC">
						<div class="event_calendar__2x4Hv">
							<span class="event_month__S8D_o color-primary">Mon</span>
							<span class="event_date__2Z7TH">01</span>
						</div>

						<div class="event_content__2fB-4">
							<h2 class="event_title__3C2PA"><a href="#">Spain Education Seminar</a></h2>

							<ul class="event_meta__CFFPg list-none">
								<li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-calendar"> </i>March 1, 2021 - May 20, 2023</span></li>
								<li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-clock-o"> </i>1:00 PM - 8:00 PM</span></li>

								<li class="event_metaList__1bEBH text-ellipsis"><span><a href="#" target="_blank"><span><i class="fa fa-map-marker"></i>Spain Park High School, Jaguar Drive, Birmingham, AL, USA</span></a></span></li>
							</ul>
						</div>
					</div>


				</div>
			</div> -->


		</div>
	</div>
</section>
<!-- / Upcoming Event -->

<?php include('footer.php'); ?>