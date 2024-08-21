<!--Footer-->
<footer class="secondary-bg footer-td">
    <div class="container">
        <div class="row">
            <div class="col-md-4 popular-link">
                <h5>Popular Links</h5>
                <div class="menu-footer-menu-container">
                    <ul id="menu-footer-menu" class="menu" style="columns:2">
                        <li id="menu-item-2462"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2462"><a
                                class="js-target-scroll" href="<?=base_url()?>">Home</a></li>
                        <li id="menu-item-2462"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2462"><a
                                class="js-target-scroll" href="<?=base_url('about')?>">About Us</a></li>
                        <li id="menu-item-2464"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2464"><a
                                class="js-target-scroll" href="<?=base_url('blog')?>">Blogs</a></li>
                        <li id="menu-item-2394"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2394"><a
                                class="js-target-scroll" href="<?=base_url('gallery')?>">Gallery</a></li>
                        <li id="menu-item-2395"
                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-2395"><a
                                class="js-target-scroll" href="<?=base_url('video')?>">Video</a></li>
                        <li id="menu-item-2463"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2463"><a
                                class="js-target-scroll" href="<?=base_url('contact')?>">Contact Us</a></li>
                        <li id="menu-item-2463"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2463"><a
                                class="js-target-scroll" href="<?=base_url('privacy-policy')?>">Privacy Policy</a></li>
                        <li id="menu-item-2463"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2463"><a
                                class="js-target-scroll" href="<?=base_url('refund-policy')?>">Refund Policy</a></li>
                        <li id="menu-item-2463"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2463"><a
                                class="js-target-scroll" href="<?=base_url('terms-conditions')?>">Terms & Conditions</a></li>
                        
                    </ul>
                    
                    <div class="col-sm-12">
                    <h5>Subscribe to newsletter</h5>
                    <!-- <iframe src="#" class="newslette-iframe"></iframe> -->
                    <?php include('newsletter.php') ?>
                </div>
                </div>
            </div>
            <div class="col-md-4 latest-newpost">
                <h5>Upcoming Exhibitions</h5>
                <ul class="latest-post">
                    <?php foreach($upcomingexhibitions as $footerexhibition){ ?>
                    <li class="post-wp">
                        <div class="post-img-wp">
                            <a href="<?=base_url('stalls/'.$footerexhibition['link'])?>">

                                <div class="post_img">
                                    <img src="<?=base_url('assets/front/images/'.$footerexhibition['image']);?>" style="width:80px; height:50px; object-fit:cover; object-position: top;"
                                        class="img-fluid center-block wp-post-image" alt=""></div>
                            </a>
                        </div>
                        <div class="content">
                            <h4><a href="<?=base_url('stalls/'.$footerexhibition['link'])?>"><?=$footerexhibition['name']?></a></h4>
                            <p><i class="fa fa-calendar"></i><?=date('M d,Y',strtotime($footerexhibition['start_date']))?> - <?=date('M d,Y',strtotime($footerexhibition['end_date']))?> </p>
                        </div>

                    </li>
                    <?php } ?>

                </ul>
                
                <li class="post-wp list-style-none text-center">
                        <a class="btn btn-danger" href="<?=base_url('exhibitions');?>" style="border-radius:5px; padding:10px 20px;">View All</a>
                </li>
            </div>

            <div class="col-md-4 footer-news">

                <h5 class="social-title">Connect With Us</h5>
                <ul class="social_links d-block">
                    <li><a href="#" style="font-size:16px"><i class="fa fa-location" aria-hidden="true"></i> Address: <?=$address?></a></li>
                    <li><a href="mailto:<?=$email?>" style="font-size:16px"><i class="fa fa-envelope" aria-hidden="true"></i> Email: <?=$email?></a></li>
                    <li><a href="tel:<?=$mobile?>" style="font-size:16px"><i class="fa fa-phone" aria-hidden="true"></i> Phone No: <?=$mobile?></a></li>
                </ul>
                
                <!--<h5 class="social-title">Social Links</h5>-->
                <!--<ul class="social_links">-->
                <!--    <li><a href="<?=$facebook?>"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>-->
                <!--    <li><a href="<?=$twitter?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>-->
                <!--    <li><a href="<?=$instagram?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>-->
                <!--    <li><a href="<?=$youtube?>"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>-->
                <!--    <li><a href="https://wa.me/<?=$whatsapp?>"><i class="fa fa-whatsapp" aria-hidden="true"></i></a></li>-->
                <!--</ul>-->
                
            </div>

        </div>

    </div>
</footer>
<!--/Footer-->
<footer class="secondary-bg footer-sd">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="logo">
                    <h3><a href="<?=base_url();?>"><img src="<?=base_url('assets/front/images/logo.webp')?>" alt=""></a></h3>
                </div>
            </div>
            <div class="col-md-9 copyright-text">
                Copyright © 2024 Dahleez. All Rights Reserved </div>
        </div>
    </div>
</footer>

<!--Back to top-->
<div id="back-top" class="back-top">
    <a href="#">
        <i class="fa fa-angle-up" aria-hidden="true"></i> 
    </a>
</div>
<!--/Back to top-->

<!--Registration Form-->
<div id="registration_form" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content padding_4x4_40 text-center">
            <div class="modal-header">
                <h3>Reserve Your Seat</h3>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form id="paypal-form"
                action="http://themes.webmasterdriver.net/Dahleez/demo-3/with-paypal/paypal/index.php" method="get">

                <div class="form-group">
                    <input class="form-control" name="payer_fname" type="text" placeholder="Full Name" required>
                </div>

                <div class="form-group">
                    <input class="form-control" name="payer_email" type="email" placeholder="Email Address" required>
                </div>

                <div class="form-group">
                    <input class="form-control" name="phone" type="text" placeholder="Phone Number" required>
                </div>


                <div class="form-group">
                    <select class="form-control" name="product_quantity" required>
                        <option value="">Number of Seats</option>
                        <option value="1">1 Seat</option>
                        <option value="2">2 Seats</option>
                        <option value="3">3 Seats</option>
                        <option value="4">4 Seats</option>
                        <option value="5">5 Seats</option>
                    </select>
                </div>

                <div class="form-group">
                    <select class="form-control" name="product_name" required>
                        <option value="">Choose a Plan</option>
                        <option value="FrontSeat">Front Seat ($99/1 Seat)</option>
                        <option value="MiddleSeat">Middle Seat ($199/1 Seat)</option>
                        <option value="BackSeat">Back Seat ($299/1 Seat)</option>
                        <option value="VIP">VIP ($399/1 Seat)</option>
                    </select>
                </div>

                <div class="form-group">
                    <input class="btn" name="submit" type="submit" value="Buy Tickets!">
                </div>
            </form>
        </div>
    </div>
</div>
<!--/Registration Form-->

<!-- Registration-success-message -->
<div id="success" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> <span class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Thank You!</h2>
                <p class="modal-subtitle">Your message is successfully sent...</p>
            </div>
        </div>
    </div>
</div>
<!--/Registration-success-message	-->

<!-- Registration-error -->
<div id="error" class="modal modal-message fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"> <span class="close" data-bs-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></span>
                <h2 class="modal-title">Sorry...</h2>
                <p class="modal-subtitle"> Something went wrong </p>
            </div>
        </div>
    </div>
</div>
<!--/Registration-error-->

<!-- Scripts -->
<script src="<?=base_url('assets/front/js/jquery.min.js');?>"></script>
<!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script> 
<script src="<?=base_url('assets/front/js/gmaps.min.js');?>"></script>  -->
<script src="<?=base_url('assets/front/js/jquery.validate.min.js');?>"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="<?=base_url('assets/front/js/interface.js');?>"></script>
<script src="<?=base_url('assets/front/js/owl.carousel.min.js');?>"></script>
<!--Switcher-->
<script src="<?=base_url('assets/front/switcher/js/switcher.js');?>"></script>


<!-- Countdown-->
<script src="<?=base_url('assets/front/js/jquery.countdown.min.js');?>"></script>
</body>

</html>