<?php include('header.php'); ?>

<!-- Banners -->
<section id="banner" class="banner-section">
    <div id="slideshow" class="slideshow">
        <?php foreach ($sliders as $slider) { ?>
            <div class="slides" style="background-image:url(<?= base_url('assets/front/images/' . $slider['image']); ?>)">
                <div class="banner-fixed">
                    <div class="container">
                        <div class="banner-content">
                            <div class="content">
                                <div class="banner-tagline text-center">
                                    <h1><?= $slider['title']; ?></h1>
                                    <ul class="gt-information">
                                        <li><i class="fa fa-clock-o"></i><span><?php $date = date_create($slider['date_added']);
                                                                                echo date_format($date, "F d, Y"); ?></span> </li>
                                        <li><i class="fa fa-map-marker"></i><span><?= $slider['venue'] ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php  } ?>
        <!-- <div class="slides" style="background-image:url(assets/images/banner-2.jpg)">
            <div class="banner-fixed">
                <div class="container">
                    <div class="banner-content">
                        <div class="content">
                            <div class="banner-tagline text-center">
                                <h1>Spain Education Seminar</h1>
                                <ul class="gt-information">
                                    <li><i class="fa fa-clock-o"></i><span>December 22, 2023</span> </li>
                                    <li><i class="fa fa-map-marker"></i><span>AL, USA</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Banners Timer -->
    <!-- <div class="container countdown-tab">
        <div class="countdown">
            <div class="counter-sec">
                <div class="countdown-counter half-width text-center">
                    <div class="timer">
                        <div class="countdown styled"></div>
                    </div>
                </div>
                <div class="countdown-btn half-width">
                    <a href="#" class="btn btn-lg btn-danger" data-bs-toggle="modal"
                        data-bs-target="#registration_form">Register Today</a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- /Banners Timer -->

</section>
<!-- /Banners -->



<!-- Event Caregory -->
<section id="popular" class="popular-event gray-bg vc_row">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2> Upcoming <span>Exhibitions</span> </h2>
                <p>Now you can easily filter the popular exhibitions to category format.</p>
            </div>
            <!-- <div class="recent-tab"> -->
                <!-- <ul class="nav nav-tabs"> -->
                    <!-- <li><a href="#active" data-bs-toggle="tab">Upcoming</a></li> -->
                    <!-- <li><a href="active" data-bs-toggle="tab">Upcoming</a></li> -->
                    <!-- <li><a class="#ongoing" href="#ongoing" data-bs-toggle="tab">Ongoing</a></li> -->
                    <!-- <li><a href="#expired" data-bs-toggle="tab">Completed</a></li> -->
                <!-- </ul> -->
            <!-- </div> -->
            <div class="tab-content">
                <div class="tab-pane active" id="upcoming">

                    <div class="row">
                        <?php foreach ($exhibitions as $exhibition) {
                            $date1 = new DateTime($exhibition['start_date']);
                            $date2 = new DateTime();
                            if ($date1 >= $date2) {
                        ?>
                                <div class="col-xs-12 col-lg-4 tdata">
                                    <div class="event_inner">
                                        <div class="listing-thumb">
                                            <a href="<?= base_url('stalls/' . $exhibition['link']) ?>"><img src="<?= base_url("assets/front/images/" . $exhibition['image']); ?>" class="img-fluid" alt="image"> </a>
                                            <div class="event-status">upcoming </div>
                                            <div class="event-price"><?=$exhibition['venue']?></div>
                                            <!-- <ul class="event_icon"> -->
                                                <!-- <li><a href="#" data-post-type="grids" data-post-id="2336" data-success-text="Saved" class="status-btn add-to-fav add-to-fav Save" title="Add To Bookmark"><i class="fa fa-bookmark-o"></i></a></li> -->
                                                <!-- <li><a href="javascript:void(0)" class=" interested sl-buttons sl-buttons-2336" data-nonce="8a4226b7a9" data-post-id="2336" data-iscomment="0" title="interest"><em class="sl-icons"><i class="fa fa-star-o"></i></em></a><span id="sl-loaders"></span> -->
                                                <!-- </li>
                                                <li class="dropdown"><a href="#" class="" title="Share This Event" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-share"></i> </a>
                                                    <ul class="dropdown-menu dp_social_share">

                                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i>Facebook
                                                            </a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i>Twitter
                                                            </a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i>Linkedin
                                                            </a></li>

                                                    </ul>
                                                </li> -->
                                            <!-- </ul> -->
                                        </div>
                                        <div class="js-grid-item-body event_body__BfZIC">
                                            <div class="event_calendar__2x4Hv">
                                                <span class="event_month__S8D_o color-primary"><?php $date = date_create($exhibition['start_date']);
                                                                                                echo date_format($date, "D") ?></span>
                                                <span class="event_date__2Z7TH"><?php $date = date_create($exhibition['start_date']);
                                                                                echo date_format($date, "d") ?></span>
                                            </div>

                                            <div class="event_content__2fB-4">
                                                <h2 class="event_title__3C2PA"><a href="<?= base_url('stalls/' . $exhibition['link']) ?>"><?= $exhibition['name'] ?></a></h2>

                                                <ul class="event_meta__CFFPg list-none">
                                                    <li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-calendar"> </i><?php $date = date_create($exhibition['start_date']);
                                                                                                                                            echo date_format($date, "Fd Y");
                                                                                                                                            $date = date_create($exhibition['end_date']);
                                                                                                                                            echo "-" . date_format($date, "Fd Y"); ?></span></li>
                                                    <!--<li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-clock-o"> </i>12:00 PM - 5:00 PM</span></li>-->

                                                    <li class="event_metaList__1bEBH text-ellipsis"><span><a href="#" target="_blank"><span><i class="fa fa-map-marker"></i><?= $exhibition['venue'] ?></span></a></span></li>
                                                </ul>
                                                
                                                <a class="btn btn-danger m-3" style="border-radius:5px" href="<?= base_url('stalls/' . $exhibition['link']) ?>">Book Now</a>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                        <?php }
                        } ?>

                        <!-- <div class="col-xs-12 col-lg-4 tdata">
                            <div class="event_inner">
                                <div class="listing-thumb">
                                    <a href="#"><img src="assets/images/two.jpg" class="img-fluid" alt="image"></a>
                                    <div class="event-status">upcoming </div>
                                    <div class="event-price">$99</div>
                                    <ul class="event_icon">
                                        <li><a href="#" data-post-type="grids" data-post-id="2332"
                                                data-success-text="Saved" class="status-btn add-to-fav add-to-fav Save"
                                                title="Add To Bookmark"><i class="fa fa-bookmark-o"></i></a></li>
                                        <li><a href="javascript:void(0)" class=" interested sl-buttons sl-buttons-2332"
                                                data-nonce="8a4226b7a9" data-post-id="2332" data-iscomment="0"
                                                title="interest"><em class="sl-icons"><i
                                                        class="fa fa-star-o"></i></em></a><span id="sl-loaders1"></span>
                                        </li>
                                        <li class="dropdown"><a href="#" class="" title="Share This Event"
                                                data-bs-toggle="dropdown" aria-expanded="false"><i
                                                    class="fa fa-share"></i> </a>
                                            <ul class="dropdown-menu dp_social_share">

                                                <li><a href="#" target="_blank"><i class="fa fa-facebook"></i>Facebook
                                                    </a></li>
                                                <li><a href="#" target="_blank"><i class="fa fa-twitter"></i>Twitter
                                                    </a></li>
                                                <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i>Linkedin
                                                    </a></li>

                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="js-grid-item-body event_body__BfZIC">
                                    <div class="event_calendar__2x4Hv">
                                        <span class="event_month__S8D_o color-primary">Wed</span>
                                        <span class="event_date__2Z7TH">12</span>
                                    </div>

                                    <div class="event_content__2fB-4">
                                        <h2 class="event_title__3C2PA"><a href="#">Circus Carnival 2023</a></h2>

                                        <ul class="event_meta__CFFPg list-none">
                                            <li class="event_metaList__1bEBH text-ellipsis"><span><i
                                                        class="fa fa-calendar"> </i>February 12, 2023 - February 21,
                                                    2023</span></li>
                                            <li class="event_metaList__1bEBH text-ellipsis"><span><i
                                                        class="fa fa-clock-o"> </i>10:00 AM - 10:00 PM</span></li>

                                            <li class="event_metaList__1bEBH text-ellipsis"><span><a href="#"
                                                        target="_blank"><span><i class="fa fa-map-marker"></i>London
                                                            Bridge Station, London, UK</span></a></span></li>
                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div> -->


                    </div>
                </div>


                <!-- Ongoing -->


                <div class="tab-pane" id="ongoing">
                    <div class="row">
                        <?php foreach ($exhibitions as $exhibition) {
                            $date1 = new DateTime($exhibition['start_date']);
                            $date2 = new DateTime($exhibition['end_date']);
                            $date3 = new DateTime();
                            if ($date2 >= $date3 && $date1 <= $date3) {
                        ?>
                                <div class="col-xs-12 col-lg-4 tdata">
                                    <div class="event_inner">
                                        <div class="listing-thumb">
                                            <a href="<?= base_url('stalls/' . $exhibition['link']) ?>"><img src="<?= base_url("assets/front/images/" . $exhibition['image']); ?>" class="img-fluid" alt="image"> </a>
                                            <div class="event-status">ongoing </div>
                                            <div class="event-price">$200</div>
                                            <!-- <ul class="event_icon">
                                                <li><a href="#" data-post-type="grids" data-post-id="2336" data-success-text="Saved" class="status-btn add-to-fav add-to-fav Save" title="Add To Bookmark"><i class="fa fa-bookmark-o"></i></a></li>
                                                <li><a href="javascript:void(0)" class=" interested sl-buttons sl-buttons-2336" data-nonce="8a4226b7a9" data-post-id="2336" data-iscomment="0" title="interest"><em class="sl-icons"><i class="fa fa-star-o"></i></em></a><span id="sl-loaders3"></span>
                                                </li>
                                                <li class="dropdown"><a href="#" class="" title="Share This Event" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-share"></i> </a>
                                                    <ul class="dropdown-menu dp_social_share">

                                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i>Facebook
                                                            </a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i>Twitter
                                                            </a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i>Linkedin
                                                            </a></li>

                                                    </ul>
                                                </li>
                                            </ul> -->
                                        </div>
                                        <div class="js-grid-item-body event_body__BfZIC">
                                            <div class="event_calendar__2x4Hv">
                                                <span class="event_month__S8D_o color-primary"><?php $date = date_create($exhibition['start_date']);
                                                                                                echo date_format($date, "D") ?></span>
                                                <span class="event_date__2Z7TH"><?php $date = date_create($exhibition['start_date']);
                                                                                echo date_format($date, "d") ?></span>
                                            </div>

                                            <div class="event_content__2fB-4">
                                                <h2 class="event_title__3C2PA"><a href="<?= base_url('stalls/' . $exhibition['link']) ?>"><?= $exhibition['name'] ?></a></h2>

                                                <ul class="event_meta__CFFPg list-none">
                                                    <li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-calendar"> </i><?php $date = date_create($exhibition['start_date']);
                                                                                                                                            echo date_format($date, "Fd Y");
                                                                                                                                            $date = date_create($exhibition['end_date']);
                                                                                                                                            echo "-" . date_format($date, "Fd Y"); ?></span></li>
                                                    <li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-clock-o"> </i>12:00 PM - 5:00 PM</span></li>

                                                    <li class="event_metaList__1bEBH text-ellipsis"><span><a href="#" target="_blank"><span><i class="fa fa-map-marker"></i><?= $exhibition['venue'] ?></span></a></span></li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                        <?php }
                        } ?>

                    </div>
                </div>



                <!-- Expired -->


                <div class="tab-pane" id="expired">
                    <div class="row">

                        <?php foreach ($exhibitions as $exhibition) {
                            $date1 = new DateTime($exhibition['end_date']);
                            $date2 = new DateTime();
                            if ($date1 <= $date2) {
                        ?>
                                <div class="col-xs-12 col-lg-4 tdata">
                                    <div class="event_inner">
                                        <div class="listing-thumb">
                                            <a href="<?= base_url('stalls/' . $exhibition['link']) ?>"><img src="<?= base_url("assets/front/images/" . $exhibition['image']); ?>" class="img-fluid" alt="image"> </a>
                                            <div class="event-status">Completed </div>
                                            <div class="event-price">$200</div>
                                            <!-- <ul class="event_icon">
                                                <li><a href="#" data-post-type="grids" data-post-id="2336" data-success-text="Saved" class="status-btn add-to-fav add-to-fav Save" title="Add To Bookmark"><i class="fa fa-bookmark-o"></i></a></li>
                                                <li><a href="javascript:void(0)" class=" interested sl-buttons sl-buttons-2336" data-nonce="8a4226b7a9" data-post-id="2336" data-iscomment="0" title="interest"><em class="sl-icons"><i class="fa fa-star-o"></i></em></a><span id="sl-loaders3"></span>
                                                </li>
                                                <li class="dropdown"><a href="#" class="" title="Share This Event" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-share"></i> </a>
                                                    <ul class="dropdown-menu dp_social_share">

                                                        <li><a href="#" target="_blank"><i class="fa fa-facebook"></i>Facebook
                                                            </a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-twitter"></i>Twitter
                                                            </a></li>
                                                        <li><a href="#" target="_blank"><i class="fa fa-linkedin"></i>Linkedin
                                                            </a></li>

                                                    </ul>
                                                </li>
                                            </ul> -->
                                        </div>
                                        <div class="js-grid-item-body event_body__BfZIC">
                                            <div class="event_calendar__2x4Hv">
                                                <span class="event_month__S8D_o color-primary"><?php $date = date_create($exhibition['start_date']);
                                                                                                echo date_format($date, "D") ?></span>
                                                <span class="event_date__2Z7TH"><?php $date = date_create($exhibition['start_date']);
                                                                                echo date_format($date, "d") ?></span>
                                            </div>

                                            <div class="event_content__2fB-4">
                                                <h2 class="event_title__3C2PA"><a href="<?= base_url('stalls/' . $exhibition['link']) ?>"><?= $exhibition['name'] ?></a></h2>

                                                <ul class="event_meta__CFFPg list-none">
                                                    <li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-calendar"> </i><?php $date = date_create($exhibition['start_date']);
                                                                                                                                            echo date_format($date, "Fd Y");
                                                                                                                                            $date = date_create($exhibition['end_date']);
                                                                                                                                            echo "-" . date_format($date, "Fd Y"); ?></span></li>
                                                    <li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-clock-o"> </i>12:00 PM - 5:00 PM</span></li>

                                                    <li class="event_metaList__1bEBH text-ellipsis"><span><a href="#" target="_blank"><span><i class="fa fa-map-marker"></i><?= $exhibition['venue'] ?></span></a></span></li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                        <?php }
                        } ?>


                    </div>
                </div>


            </div>

            <!--<div class="col-sm-12 text-center">-->
            <!--    <a href="<?= base_url('exhibitions') ?>" class="btn btn-primary">Browse More Exhibitions</a>-->
            <!--</div>-->

        </div>
    </div>
</section>
<!-- /Event Category -->


<!-- About Dahleez-->
<section id="about" class="about-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h2>Why Choose <span>Dahleez</span> </h2>
                <p>Because our digital story started with our dreams integrated manually.</p>
            </div>
            <div class="service-box col-sm-3">
                <div class="gt-icon">
                    <i class="fa-solid fa-people-group"></i>
                </div>
                <div class="gt-title home-title">
                    <h2>Heavy Footfall</h2>
                    <p>Join us for our exclusive event and experience the buzz of excitement firsthand!</p>
                </div>
            </div>
            <div class="service-box col-sm-3">
                <div class="gt-icon">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <div class="gt-title home-title">
                    <h2>Best Marketing Team</h2>
                    <p>Discover endless opportunities and forge valuable connections at our upcoming marketing exhibitions.</p>
                </div>
            </div>
            <div class="service-box col-sm-3">
                <div class="gt-icon">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="gt-title home-title">
                    <h2>Prime Location</h2>
                    <p>Unlock the potential of your business with a prime location that sets you apart.</p>
                </div>
            </div>
            <div class="service-box col-sm-3">
                <div class="gt-icon">
                    <i class="fa-solid fa-handshake"></i>
                </div>
                <div class="gt-title home-title">
                    <h2>Friendly Environment</h2>
                    <p>Experience a welcoming and supportive atmosphere where everyone feels like family.</p>
                </div>
            </div>

            <!--<div class="col-sm-12 text-center">-->
            <!--    <p>“Page builder allow you to <strong>build</strong> custom sites without touching a line of code.-->
            <!--        <strong>Drag and drop!</strong>”-->
            <!--    </p>-->
            <!--</div>-->

            <!--<div class="service-box col-sm-3">-->
            <!--    <div class="gt-icon">-->
            <!--        <i class="fa fa-calendar"></i>-->
            <!--    </div>-->
            <!--    <div class="gt-title home-title">-->
            <!--        <h2>MULTIPLE EVENTS</h2>-->
            <!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et ultrices massa, sed porta-->
            <!--            dui.</p>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="service-box col-sm-3">-->
            <!--    <div class="gt-icon">-->
            <!--        <i class="fa fa-adjust"></i>-->
            <!--    </div>-->
            <!--    <div class="gt-title home-title">-->
            <!--        <h2>EVENT MANAGEMENT</h2>-->
            <!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et ultrices massa, sed porta-->
            <!--            dui.</p>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="service-box col-sm-3">-->
            <!--    <div class="gt-icon">-->
            <!--        <i class="fa fa-credit-card"></i>-->
            <!--    </div>-->
            <!--    <div class="gt-title home-title">-->
            <!--        <h2>CREDIT CARD PAYMENT</h2>-->
            <!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et ultrices massa, sed porta-->
            <!--            dui.</p>-->
            <!--    </div>-->
            <!--</div>-->
            <!--<div class="service-box col-sm-3">-->
            <!--    <div class="gt-icon">-->
            <!--        <i class="fa fa-street-view"></i>-->
            <!--    </div>-->
            <!--    <div class="gt-title home-title">-->
            <!--        <h2>GOOGLE STREET VIEW</h2>-->
            <!--        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas et ultrices massa, sed porta-->
            <!--            dui.</p>-->
            <!--    </div>-->
            <!--</div>-->


        </div>
    </div>
</section>
<!-- /About Dahleez-->






<!-- Golden Sponsors -->
<section id="sponsor" class="sponsor-section section-padding masked">

    <div class="container">

        <div class="row">
            <!-- Heading -->
            <div class="col-md-12">
                <div class="heading-sec">
                    <div class="section-header text-center">
                        <h2>Our Sponsors</h2>

                    </div>
                </div>
            </div>
            <!-- /Heading -->
        </div>
        <div class="row">
            <!-- speakers -->
            <?php foreach ($brands as $brand) { ?>
                <div class="col-lg-3 col-md-6 z-index">

                    <div class="image-grid-inner" style="height: auto;">


                        <img style="width: 100%; height: 300px; object-fit: cover;" src="<?= base_url('assets/front/images/' . $brand['image']); ?>" class="img-fluid lazy-active center-block wp-post-image" alt="image">

                    </div>
                </div>
            <?php } ?>


            <!-- <div class="col-lg-3 col-md-6 z-index">

                <div class="image-grid-inner" style="height: auto;">


                    <img src="assets/images/sponsor3.png" class="img-fluid lazy-active center-block wp-post-image" alt="image">

                </div>
            </div> -->





            <!-- /speakers -->
        </div>

    </div>

</section>
<!-- /Golden Sponsors -->

<!-- Featured Event -->
<!--<section id="featured-event" class="featured-event section-padding">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
            <!-- Heading -->
<!--            <div class="col-md-12">-->
<!--                <div class="heading-sec">-->
<!--                    <div class="section-header text-center">-->
<!--                        <h2>Featured Exhibitions</h2>-->
<!--                        <p>Exhibitions those who are stand alone with featured and some specific specifications.</p>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <!-- /Heading -->
<!--        </div>-->
<!--        <div class="row">-->



            <?php 
            // foreach ($featuredexhibitions as $exhibition) {
            ?>
                <!--<div class="col-xs-12 col-lg-4 tdata">-->
                <!--    <div class="event_inner">-->
                        <!--<div class="listing-thumb">-->
                        <!--    <a href="<?php //base_url('stalls/' . $exhibition['link']) ?>"><img src="<?php //base_url("assets/front/images/" . $exhibition['image']); ?>" class="img-fluid" alt="image"> </a>-->
                        <!--    <div class="event-status">Featured </div>-->
                        <!--    <div class="event-price"><?php // $exhibition['venue'] ?></div>-->
                        <!--</div>-->
                        <!--<div class="js-grid-item-body event_body__BfZIC">-->
                        <!--    <div class="event_calendar__2x4Hv">-->
                        <!--        <span class="event_month__S8D_o color-primary">-->
                        <?php //$date = date_create($exhibition['start_date']); echo date_format($date, "D") ?>
                        <!--</span>-->
                        <!--        <span class="event_date__2Z7TH">
                        <?php //$date = date_create($exhibition['start_date']); echo date_format($date, "d") ?>
                        <!--</span>-->
                        <!--    </div>-->

                        <!--    <div class="event_content__2fB-4">-->
                        <!--        <h2 class="event_title__3C2PA"><a href="<?php // base_url('stalls/' . $exhibition['link']) ?>"><?php //$exhibition['name'] ?></a></h2>-->

                        <!--        <ul class="event_meta__CFFPg list-none">-->
                        <!--            <li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-calendar"> </i> -->
                        <?php 
                        // $date = date_create($exhibition['start_date']); 
                        // echo date_format($date, "Fd Y");
                        // $date = date_create($exhibition['end_date']);
                        // echo "-" . date_format($date, "Fd Y"); ?>
                        <!--</span></li>-->
                        <!--            <li class="event_metaList__1bEBH text-ellipsis"><span><i class="fa fa-clock-o"> </i>12:00 PM - 5:00 PM</span></li>-->

                        <!--            <li class="event_metaList__1bEBH text-ellipsis"><span><a href="#" target="_blank"><span><i class="fa fa-map-marker"></i><?= $exhibition['venue'] ?></span></a></span></li>-->
                        <!--        </ul>-->
                        <!--    </div>-->
                        <!--</div>-->


                <!--    </div>-->
                <!--</div>-->

            <?php // } ?>

            
<!--        </div>-->
<!--        <div class="col-sm-12 text-center">-->
<!--            <a href="<?= base_url('featured') ?>" class="btn btn-primary">Browse More Exhibitions</a>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- /Featured Event -->



<!-- Testimonial-Style-1 -->
<section id="testimonial" class="section-padding gray-bg">
    <div class="container">
        <div class="row">
            <!-- Heading -->
            <div class="col-md-12">
                <div class="heading-sec">
                    <div class="section-header text-center">
                        <h2>Our Client <span>Says</span> </h2>
                        <!-- <p>Testimonials Styles 1</p> -->
                    </div>
                </div>
            </div>
            <!-- /Heading -->

            <div id="testimonial_slider" class="owl-carousel">
                <?php foreach ($reviews as $review) { ?>
                    <div class="item">
                        <div class="testimonial_head">
                            <div class="testimonial_img"> <img src="<?= base_url('assets/front/images/' . $review['image']); ?>" class="img-fluid" alt="image"> </div>
                            <h5><?= $review['name'] ?></h5>
                            <!-- <small>CEO of Lorem lpsum</small> -->
                        </div>
                        <?= $review['message'] ?>
                    </div>
                <?php } ?>

                <!-- <div class="item">
                    <div class="testimonial_head">
                        <div class="testimonial_img"> <img src="assets/images/testimonial_img2.jpg" class="img-fluid" alt="image"> </div>
                        <h5>Samantha Doe</h5>
                        <small>CEO of Lorem lpsum</small>
                    </div>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged.</p>
                </div> -->


            </div>
        </div>
    </div>
</section>
<!-- /Testimonial-Style-1 -->



<!-- Blog -->
<!--<section id="blog" class="section-padding">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
            <!-- Heading -->
<!--            <div class="col-md-12">-->
<!--                <div class="heading-sec">-->
<!--                    <div class="section-header text-center">-->
<!--                        <h2>Event Advice & Tips</h2>-->
<!--                        <p>What’s new and upcoming, good news for our users and much more!</p>-->
<!--                    </div>-->
<!--                </div>-->
            <!--</div>-->
            <!-- /Heading -->
            <?php foreach ($blogs as $blog) { ?>
                <!--<div class="col-md-4 col-sm-4">-->
                <!--    <div class="blog_wrap">-->
                <!--        <div class="blog_img margin-btm-20">-->
                <!--            <a href="<?= base_url('blog/' . $blog['link']) ?>"><img style="width: 100%; height: 300px; object-fit: cover;" src="<?= base_url('assets/front/images/' . $blog['image']); ?>" class="img-fluid" alt="image"></a>-->
                <!--        </div>-->
                <!--        <div class="blog_meta">-->
                <!--            <span>-->
                    <?php //$date = date_create($blog['date_added']);
                          //echo date_format($date, "F d, Y") ?>
                <!--  </span>-->
                            <!-- <span>No Comments</span> -->
                <!--        </div>-->
                <!--        <h4><a href="<?= base_url('blog/' . $blog['link']) ?>"><?= $blog['post_title'] ?></a></h4>-->

                <!--    </div>-->
                <!--</div>-->
            <?php } ?>

            
            
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- /Blog -->


<?php include('footer.php'); ?>