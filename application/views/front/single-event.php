<?php include('header.php'); ?>

<!-- Banners -->
<section id="banner" class="banner-section">
	<!-- Banner Tagline -->
	<div class="banner-fixed">
		<div class="container">
			<div style="background: url(<?= base_url('assets/front/images/' . $exhibition->image) ?>) repeat 0 0;" class="banner-content">
				<div class="content">
					<div class="banner-tagline text-center">
						<h1><?= $exhibition->name ?></h1>
						<ul class="gt-information">
							<li><i class="fa fa-clock-o"></i><span><?= $exhibition->start_date ?></span> </li>
							<li><i class="fa fa-map-marker"></i><span><?= $exhibition->venue ?></span></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Banners Tagline -->

	<!-- Banners Timer -->
	<div class="container countdown-tab">
		<div class="countdown">
			<div class="counter-sec">
				<?php if(date("Y-m-d") >= $exhibition->start_date ){ echo ""; }else{?>
				<div class="countdown-counter half-width text-center">
					<div class="timer">
						<div class="countdown styled">
						</div>
					</div>
				</div>
				<!-- <div class="countdown-btn half-width"> <a href="#" class="btn btn-lg btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#registration_form"> Booking Today</a> </div> -->
				<div class="countdown-btn half-width"> <a href="<?=base_url('user/bookyourstall/'.$exhibition->link)?>" class="btn btn-lg btn-danger btn-block" > Book Now</a> </div>
				<?php }?>
			</div>
		</div>
	</div>
	<!-- /Banners Timer -->

	<div class="dark-overlay"></div>
</section>
<!-- /Banners -->

<!-- Expired Event -->
<section class="event-detail">
	<div class="container">
		<div class="row">

			<div class="col-lg-8 col-md-12">
				<div class="event_detail">
					<div class="content-box-module">
						<div class="content-box-module-detail">
							<ul class="nav nav-tabs" role="tablist">
								<li>
									<a data-bs-toggle="tab" class="active" href="#gt-event-tab-0" role="tab" aria-controls="gt-event-tab-1" aria-selected="true">About</a>
								</li>
								<!-- <li>
									<a data-bs-toggle="tab" href="#gt-event-tab-1" role="tab" aria-controls="gt-event-tab-1" aria-selected="true">Speaker</a>
								</li> -->
								<!-- <li>
									<a data-bs-toggle="tab" href="#gt-event-tab-2" role="tab" aria-controls="gt-event-tab-2" aria-selected="true">Schedule</a>
								</li> -->
								<!-- <li class="ticket">
									<a data-bs-toggle="tab" href="#gt-event-tab-3" role="tab" aria-controls="gt-event-tab-3" aria-selected="true">Tickets</a>
								</li> -->
								<li>
									<a data-bs-toggle="tab" href="#gt-event-tab-4" role="tab" aria-controls="gt-event-tab-4" aria-selected="true">Venue</a>
								</li>
								<li>
									<a data-bs-toggle="tab" href="#gt-event-tab-5" role="tab" aria-controls="gt-event-tab-7" aria-selected="true">Photos</a>
								</li>
								<!-- <li>
									<a data-bs-toggle="tab" href="#gt-event-tab-6" role="tab" aria-controls="gt-event-tab-7" aria-selected="true">Contact</a>
								</li> -->
							</ul>
						</div>
						<div class="tab-content">


							<div class="tab-pane active in fade show" id="gt-event-tab-0" role="tabpanel" aria-labelledby="nav-gt-event-tab-1-tab">
								<div class="content-box_body content_data row">
									<div class="col-sm-12">
										<?= $exhibition->description ?>
									</div>
									<!-- <div class="col-sm-6 about-image">
										<div class="row">
											<?php foreach (json_decode($exhibition->images) as $image) { ?>
											<div class="col-sm-6 about-image">
												<img src="<?= base_url("assets/front/images/" . $image); ?>" class="img-fluid" alt="image">
											</div>
											<?php } ?>

										</div>

									</div> -->
									<!-- <div class="col-sm-12">
										<p>It was originally his carnival and first held in 2001. It was then officially named as JFC on the first of January 2003. Since then, the carnival has been held every year in the month of August. Sadly, Fariz passed away earlier this year in April but has left us with a wonderful event to his legacy.</p>
									</div> -->
								</div>
							</div>

							<div class="tab-pane fade" id="gt-event-tab-1" role="tabpanel" aria-labelledby="nav-gt-event-tab-1-tab">
								<div class="col-sm-12">
									<div class="row">
										<div class="col-xs-12 col-md-6 speakers">
											<div class="speaker-sec">
												<div class="speaker-info-box text-center border-box">
													<div class="spearker-img"> <img src="assets/images/speaker_img1.jpg" alt="" class="img-fluid center-block"> </div>
													<div class="speaker-hover">
														<div class="social-icons text-center"> <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> </div>
													</div>
												</div>
												<div class="speaker-info">
													<h5><a href="#">Una Kravets</a></h5>
													<h6>ui engineer at DigitalOcean</h6>
												</div>
											</div>
										</div>

										<div class="col-xs-12 col-md-6 speakers">
											<div class="speaker-sec">
												<div class="speaker-info-box text-center border-box">
													<div class="spearker-img"> <img src="assets/images/speaker_img2.jpg" alt="" class="img-fluid center-block"> </div>
													<div class="speaker-hover">
														<div class="social-icons text-center"> <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> </div>
													</div>
												</div>
												<div class="speaker-info">
													<h5><a href="#">Una Kravets</a></h5>
													<h6>ui engineer at DigitalOcean</h6>
												</div>
											</div>
										</div>

										<div class="col-xs-12 col-md-6 speakers">
											<div class="speaker-sec">
												<div class="speaker-info-box text-center border-box">
													<div class="spearker-img"> <img src="assets/images/speaker_img3.jpg" alt="" class="img-fluid center-block"> </div>
													<div class="speaker-hover">
														<div class="social-icons text-center"> <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> </div>
													</div>
												</div>
												<div class="speaker-info">
													<h5><a href="#">Una Kravets</a></h5>
													<h6>ui engineer at DigitalOcean</h6>
												</div>
											</div>
										</div>

										<div class="col-xs-12 col-md-6 speakers">
											<div class="speaker-sec">
												<div class="speaker-info-box text-center border-box">
													<div class="spearker-img"> <img src="assets/images/speaker_img4.jpg" alt="" class="img-fluid center-block"> </div>
													<div class="speaker-hover">
														<div class="social-icons text-center"> <a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a> <a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a> </div>
													</div>
												</div>
												<div class="speaker-info">
													<h5><a href="#">Una Kravets</a></h5>
													<h6>ui engineer at DigitalOcean</h6>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="gt-event-tab-2" role="tabpanel" aria-labelledby="nav-gt-event-tab-2-tab">
								<div class="schedule_event">
									<div class="schedule_info2">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs" role="tablist">
											<li role="presentation"><a class="active" href="#schedule_day1" role="tab" data-bs-toggle="tab" aria-selected="true">Day 1 <span>22 july 2021</span></a></li>
											<li role="presentation"><a href="#schedule_day2" role="tab" data-bs-toggle="tab" class="" aria-selected="false">Day 2 <span>23 july 2021</span></a></li>
											<li role="presentation"><a href="#schedule_day3" role="tab" data-bs-toggle="tab" class="" aria-selected="false">Day 3 <span>24 july 2021</span></a></li>
										</ul>
										<!-- Tab panes -->
										<div class="tab-content">
											<!-- Schedule-Day-1 -->
											<div role="tabpanel" class="tab-pane active" id="schedule_day1">
												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">08:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_1.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse21" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse21" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">10:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_2.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse22" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse22" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">12:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_3.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse23" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse23" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">02:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_1.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse24" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse24" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">04:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_2.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse25" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse25" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Schedule-Day-1 -->

											<!-- Schedule-Day-2 -->
											<div role="tabpanel" class="tab-pane" id="schedule_day2">
												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">08:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_3.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets 2</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse26" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse26" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">10:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_1.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse27" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse27" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">12:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_2.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse28" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse28" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">02:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_3.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse29" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse29" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">04:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_1.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse30" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse30" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Schedule-Day-2 -->

											<!-- Schedule-Day-3 -->
											<div role="tabpanel" class="tab-pane" id="schedule_day3">
												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">08:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_2.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse32" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse32" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">10:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_3.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse33" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse33" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">12:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_1.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse34" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse34" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>

															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">02:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_2.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse35" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse35" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>

												<div class="conference-time-list">
													<div class="conf-user-time"> <span class="time">04:00</span> <span class="time-schedule">am</span> </div>
													<div class="conf-user-img"> <img class="img-fluid center-block" src="assets/images/schedule_speaker_3.jpg" alt=""> </div>
													<div class="conf-user-info">
														<h5>Una Kravets</h5>
														<h6>ui engineer at DigitalOcean</h6>
														<a href="#collapse36" data-bs-toggle="collapse" role="button" class="conf-close" aria-expanded="false">
															<i class="fa fa-angle-right" aria-hidden="true"></i>
														</a>
														<div role="tabpanel" class="collapse" id="collapse36" aria-expanded="false" style="height: 0px;">
															<div class="conf-user-content">
																<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
																	dummy text ever since the 1500s, when an unknown printer.</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<!-- /Schedule-Day-3 -->
										</div>
									</div>
								</div>

							</div>

							<div class="tab-pane fade" id="gt-event-tab-3" role="tabpanel" aria-labelledby="nav-gt-event-tab-3-tab">
								<div class="event_tickets">
									<div class="row">
										<div class="col-md-6 pricing_wrap">
											<div class="regi-price-table border-box">
												<div class="table-price-box secondary-bg">
													<h5>Front Seat</h5>
													<div class="regi-price-box">
														<p>$99</p>
													</div>
												</div>
												<div class="table-price-detail">
													<ul>
														<li><i class="fa fa-check" aria-hidden="true"></i>Seat</li>
														<li><i class="fa fa-times" aria-hidden="true"></i>Coffee Break</li>
														<li><i class="fa fa-times" aria-hidden="true"></i>Certificate</li>
													</ul>
													<a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#registration_form">Book Today</a>
												</div>
											</div>
										</div>

										<div class="col-md-6 pricing_wrap">
											<div class="regi-price-table border-box">
												<div class="table-price-box secondary-bg">
													<h5>Middle Seat</h5>
													<div class="regi-price-box">
														<p>$199</p>
													</div>
												</div>
												<div class="table-price-detail">
													<ul>
														<li><i class="fa fa-check" aria-hidden="true"></i>Seat</li>
														<li><i class="fa fa-times" aria-hidden="true"></i>Coffee Break</li>
														<li><i class="fa fa-times" aria-hidden="true"></i>Certificate</li>
													</ul>
													<a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#registration_form">Book Today</a>
												</div>
											</div>
										</div>

										<div class="col-md-6 pricing_wrap">
											<div class="regi-price-table border-box">
												<div class="table-price-box secondary-bg">
													<h5>Back Seat</h5>
													<div class="regi-price-box">
														<p>$299</p>
													</div>
												</div>
												<div class="table-price-detail">
													<ul>
														<li><i class="fa fa-check" aria-hidden="true"></i>Seat</li>
														<li><i class="fa fa-check" aria-hidden="true"></i>Coffee Break</li>
														<li><i class="fa fa-times" aria-hidden="true"></i>Certificate</li>
													</ul>
													<a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#registration_form">Book Today</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="tab-pane fade" id="gt-event-tab-4" role="tabpanel" aria-labelledby="nav-gt-event-tab-4-tab">
								<div class="event_map">
									<div class="map-directions">

										<a href="https://www.google.com/maps?daddr=26.2106823,50.61493640000003" target="_blank"><i class="fa fa-map-o"></i>Get Directions</a>

									</div>

									<p class="venue"><strong>Venue : </strong><i class="fa fa-map-marker"></i><a href="#" target="_blank"><?= $exhibition->venue ?></a></p>

									<div id="singlepostmap" class="singlemap" style="position: relative; overflow: hidden;">
										<iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?= $exhibition->venue ?>+(<?= $exhibition->name ?>)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
									</div>

								</div>
							</div>

							<div class="tab-pane fade" id="gt-event-tab-5" role="tabpanel" aria-labelledby="nav-gt-event-tab-5-tab">
								<div class="event_contact">
									<div class="gallery_style3 row">
										<?php foreach (json_decode($exhibition->images) as $image) { ?>
											<div class="col-md-4">
												<a href="<?= base_url("assets/front/images/" . $image); ?>" rel="prettyPhoto[gallery1]" class="cursorimage"><img alt="image" src="<?= base_url("assets/front/images/" . $image); ?>" class="img-fluid prettyPhoto-m-img"></a>
											</div>
										<?php } ?>
										<!-- <div class="col-md-4">
											<a href="assets/images/gallery_img2.jpg" rel="prettyPhoto[gallery1]" class="cursorimage"><img alt="image" src="assets/images/gallery_img2.jpg" class="img-fluid prettyPhoto-m-img"></a>
										</div>
										<div class="col-md-4">
											<a href="assets/images/gallery_img3.jpg" rel="prettyPhoto[gallery1]" class="cursorimage"><img alt="image" src="assets/images/gallery_img3.jpg" class="img-fluid prettyPhoto-m-img"></a>
										</div>
										<div class="col-md-4">
											<a href="assets/images/gallery_img4.jpg" rel="prettyPhoto[gallery1]" class="cursorimage"><img alt="image" src="assets/images/gallery_img4.jpg" class="img-fluid prettyPhoto-m-img"></a>
										</div>
										<div class="col-md-4">
											<a href="assets/images/gallery_img5.jpg" rel="prettyPhoto[gallery1]" class="cursorimage"><img alt="image" src="assets/images/gallery_img5.jpg" class="img-fluid prettyPhoto-m-img"></a>
										</div>
										<div class="col-md-4">
											<a href="assets/images/gallery_img6.jpg" rel="prettyPhoto[gallery1]" class="cursorimage"><img alt="image" src="assets/images/gallery_img6.jpg" class="img-fluid prettyPhoto-m-img"></a>
										</div> -->
									</div>

								</div>
							</div>


							<div class="tab-pane fade" id="gt-event-tab-6" role="tabpanel" aria-labelledby="nav-gt-event-tab-6-tab">
								<div class="event_contact">

									<form method="POST" action="http://themes.webmasterdriver.net/Dahleez/demo-3/with-paypal/contact.php">
										<div class="row">
											<div class="col-sm-6">
												<div class="form-group">
													<label>Full Name</label>
													<input type="text" name="name" placeholder="Enter Your Name" class="form-control" required>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label>Email</label>
													<input type="email" name="email" placeholder="Enter Your Email" class="form-control" required>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label>Subject</label>
													<input type="text" name="subject" placeholder="Enter Your subject" class="form-control" required>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label>Message</label>
													<textarea class="form-control" name="message" placeholder="Enter Your Message" required></textarea>
												</div>
											</div>

											<div class="col-sm-12">
												<div class="form-group checkbox">
													<input type="checkbox" name="accept-this-1" value="1" aria-invalid="false" required><span>Check here to consent to this website storing my information so they can respond.</span>
												</div>
											</div>

											<div class="col-sm-12">
												<input type="submit" name="contact" value="Contact" class="btn btn-primary">
											</div>

										</div>
									</form>

								</div>
							</div>

						</div>

					</div>
				</div>

				<!-- <div class="event_detail desktop_comment" id="comment">
					<div class="content-box-module">
						<h4 class="content-box_title"><i class="fa fa-comments"></i><span>Leave a reply </span></h4>
						<div class="content-box_body">

							<form method="get" class="comment-form">
								<div class="form-group">
									<input name="full_name" type="text" class="form-control" placeholder="Full Name">
								</div>

								<div class="form-group">
									<input name="email" type="email" class="form-control" placeholder="Email Address">
								</div>

								<div class="form-group">
									<textarea class="form-control" name="comment" rows="4" placeholder="Comment"></textarea>
								</div>

								<div class="form-group">
									<button class="btn" type="submit">Post Comment</button>
								</div>
							</form>


						</div>
					</div>
				</div> -->

			</div>


			<div class="col-lg-4 col-md-12">
				<div class="event_detail_sidebar">


					<!--<div class="listing-sidebar">-->

					<!--	<div class="sidebar_wrap listing_action_btn">-->
							<!--<ul>-->
								<!-- <li> <a href="#"><i class="fa fa-star-o"></i> INTERESTED</a> </li> -->
								<!--<li><a data-bs-toggle="modal" data-bs-target="#share_event"><i class="fa fa-share-alt"></i>Share This </a></li>-->
								<!--<div class="modal fade" id="share_event">-->

								<!--	<div class="modal-dialog" role="document">-->

								<!--		<div class="modal-content">-->

								<!--			<div class="modal-header">-->

								<!--				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>-->

								<!--				<h3 class="modal-title" id="myModalLabel">Share Event</h3>-->

								<!--			</div>-->

								<!--			<div class="modal-body">-->

								<!--				<div class="share_listing">-->
								<!--					<a href="https://www.facebook.com/sharer.php?u=<?=urlencode(base_url('stalls/'.$exhibition->link))?>" target="_blank"><i class="fa fa-facebook"></i> </a>-->
								<!--					<a href="https://twitter.com/share?text=[TITLE]&url=<?=urlencode(base_url('stalls/'.$exhibition->link))?>" target="_blank"><i class="fa fa-twitter"></i> </a>-->
								<!--					<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=urlencode(base_url('stalls/'.$exhibition->link))?>" target="_blank"><i class="fa fa-linkedin"></i> </a>-->
								<!--					<a href="https://api.whatsapp.com/send?text=<?=urlencode(base_url('stalls/'.$exhibition->link))?>" target="_blank"><i class="fa fa-whatsapp"></i> </a>-->

								<!--				</div>-->

								<!--			</div>-->

								<!--		</div>-->

								<!--	</div>-->

								<!--</div>-->
								<!--<li><a data-bs-toggle="modal" data-bs-target="#email_friend"><i class="fa fa-user-plus"></i>Refer & Earn</a></li>-->
								<!-- <li><a href="#comment" class="js-target-scroll"> <i class="fa fa-comment"></i>Write Comment</a></li> -->

								<!--<div class="modal fade" id="email_friend">-->

								<!--	<div class="modal-dialog" role="document">-->

								<!--		<div class="modal-content">-->

								<!--			<div class="modal-header">-->

								<!--				<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>-->

								<!--				<h3 class="modal-title" id="myModalLabel1">Email to a Friend</h3>-->

								<!--			</div>-->

								<!--			<div class="modal-body">-->

								<!--				<div role="form" class="wpcf7" id="wpcf7-f2040-p2289-o2" lang="en-US" dir="ltr">-->
								<!--					<div class="screen-reader-response"></div>-->
								<!--					<form action="http://themes.webmasterdriver.net/Dahleez/demo-3/with-paypal/contact.php" method="post" class="wpcf7-form" novalidate>-->

								<!--						<div class="form-group">-->
								<!--							<span class="wpcf7-form-control-wrap your-name"><input type="text" name="your-name" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required form-control" aria-required="true" aria-invalid="false" placeholder="Your Name" required></span>-->
								<!--						</div>-->
								<!--						<div class="form-group">-->
								<!--							<span class="wpcf7-form-control-wrap your-email"><input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Your Email Address" required></span>-->
								<!--						</div>-->
								<!--						<div class="form-group">-->
								<!--							<span class="wpcf7-form-control-wrap friend-email"><input type="email" name="friend-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email form-control" aria-required="true" aria-invalid="false" placeholder="Friend Email Address" required></span>-->
								<!--						</div>-->
								<!--						<div class="form-group">-->
								<!--							<span class="wpcf7-form-control-wrap Message"><textarea name="Message" cols="40" rows="4" class="wpcf7-form-control wpcf7-textarea form-control" aria-invalid="false" placeholder="Message" required></textarea></span>-->
								<!--						</div>-->
								<!--						<div class="form-group">-->
								<!--							<span class="wpcf7-form-control-wrap accept-this-1"><span class="wpcf7-form-control wpcf7-acceptance"><span class="wpcf7-list-item"><label><input type="checkbox" name="accept-this-1" value="1" aria-invalid="false" required><span class="wpcf7-list-item-label">Check here to consent to this website storing my information so they can respond.</span></label></span></span></span>-->
								<!--						</div>-->
								<!--						<div class="form-group">-->
								<!--							<input type="submit" value="Submit" name="sendmessage" class="wpcf7-form-control wpcf7-submit btn btn-block"><span class="ajax-loader"></span>-->
								<!--						</div>-->
								<!--					</form>-->
								<!--				</div>-->
								<!--			</div>-->

								<!--		</div>-->

								<!--	</div>-->

								<!--</div>-->


							<!--</ul>-->
					<!--	</div>-->
					<!--</div>-->


					<div class="listing-sidebar">
						<div class="sidebar-heading">
							<h5><i class="fa fa-th-list"></i><span>Event Schedule </span></h5>
						</div>

						<div class="sidebar_wrap listing_action_btn">
							<ul class="event_schedule">
								<li>
									<div class="gt-title">Start Date </div>
									<div class="gt-icon"><i class="fa fa-calendar-check-o"></i></div>
									<div class="gt-content">
										<div class="gt-inner"><?php $date = date_create($exhibition->start_date);
																echo date_format($date, "F d Y") ?></div>
									</div>
								</li>

								<li>
									<div class="gt-title">End Date </div>
									<div class="gt-icon"><i class="fa fa-calendar-times-o"></i></div>
									<div class="gt-content">
										<div class="gt-inner"><?php $date = date_create($exhibition->end_date);
																echo date_format($date, "F d Y") ?></div>
									</div>
								</li>
							</ul>
						</div>

					</div>


					<div class="listing-sidebar">
						<div class="sidebar-heading">
							<h5><i class="fa fa-th-list"></i><span>Other Info </span></h5>
						</div>
						<div class="content-box-module">

							<div class="gt-content-detail-box">
								<ul>


									<!-- <li class="event_status">
											<div class="gt-icon"></div>
											<div class="gt-content">
												<div class="gt-title">Status </div>
												<div class="gt-inner"><a href="#">Upcoming</a></div>
											</div>
										</li> -->
									<li>
										<div class="gt-icon"><i class="fa fa-map-signs"></i></div>
										<div class="gt-content">
											<div class="gt-title">Venue </div>
											<div class="gt-inner"><a href="#" target="_blank"><?= $exhibition->venue ?></a> </div>
										</div>
									</li>

									<li>
										<div class="gt-icon"><i class="fa fa-phone"></i></div>
										<div class="gt-content">
											<div class="gt-title">Phone </div>
											<div class="gt-inner"><a href="tel:<?= $exhibition->phone ?>"><?= $exhibition->phone ?> </a></div>
										</div>
									</li>

									<li>
										<div class="gt-icon"><i class="fa fa-envelope-o"></i></div>
										<div class="gt-content">
											<div class="gt-title">Email </div>
											<div class="gt-inner"><a href="mailto:<?= $exhibition->email ?>"><?= $exhibition->email ?></a> </div>
										</div>
									</li>

									<!-- <li>
										<div class="gt-icon"><i class="fa fa-ticket"></i></div>
										<div class="gt-content">
											<div class="gt-title">Remaining Tickets </div>
											<div class="gt-inner">200

											</div>
										</div>
									</li> -->

								</ul>

							</div>

						</div>
					</div>
				</div>

				<!-- <div class="listing-sidebar">
					<div class="sidebar-heading">
						<h5><i class="fa fa-th-list"></i><span>Sponsors Lists </span></h5>
					</div>
					<div class="content-box-module">
						<div class="sponsor-content-detail col-sm-12">
							<div class="row">
								<div class="col-sm-6 sponsor_img">
									<a href="#" target="_blank"><img src="assets/images/sponsors_logo_1.png" class="img-fluid center-block wp-post-image" alt=""> </a>
								</div>


								<div class="col-sm-6 sponsor_img">
									<a href="#" target="_blank"><img src="assets/images/sponsors_logo_2.png" class="img-fluid center-block wp-post-image" alt=""> </a>
								</div>


								<div class="col-sm-6 sponsor_img">
									<a href="#" target="_blank"><img src="assets/images/sponsors_logo_3.png" class="img-fluid center-block wp-post-image" alt=""> </a>
								</div>

								<div class="clear"></div>
							</div>
						</div>
					</div>
				</div> -->


				<div class="event_detail mobile_comment" id="comment1">
					<div class="content-box-module">
						<h4 class="content-box_title"><i class="fa fa-comments"></i><span>Leave a reply </span></h4>
						<div class="content-box_body">

							<form method="get" class="comment-form">
								<div class="form-group">
									<input name="full_name" type="text" class="form-control" placeholder="Full Name">
								</div>

								<div class="form-group">
									<input name="email" type="email" class="form-control" placeholder="Email Address">
								</div>

								<div class="form-group">
									<textarea class="form-control" name="comment" rows="4" placeholder="Comment"></textarea>
								</div>

								<div class="form-group">
									<button class="btn" type="submit">Post Comment</button>
								</div>
							</form>


						</div>
					</div>
				</div>

			</div>

		</div>
	</div>
</section>
<!-- / Expired Event -->


<?php include('footer.php'); ?>

<script>
	var endDate = "<?php echo date("F d, Y", strtotime($exhibition->start_date)); ?>";
	console.log(endDate);
	$('.countdown.styled').countdown({
		date: endDate,
		render: function(data) {
			$(this.el).html("<div class='countdown-amount'>" + this.leadingZeros(data.days, 2) + " <span class='countdown-period'>Days</span></div><div class='countdown-amount'>" + this.leadingZeros(data.hours, 2) + " <span class='countdown-period'>Hours</span></div><div class='countdown-amount'>" + this.leadingZeros(data.min, 2) + " <span class='countdown-period'>Minutes</span></div><div class='countdown-amount'>" + this.leadingZeros(data.sec, 2) + " <span class='countdown-period'>Seconds</span></div>");
		}
	});
</script>