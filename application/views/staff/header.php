</head>

<body class="g-sidenav-show  bg-gray-200">
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="<?= base_url(); ?>" target="_blank">
                <img src="<?= base_url('assets/front/images/logo.webp'); ?>" style="background:#fff" alt="" srcset="">&nbsp; 
            </a>
        </div>
        <?php //print_r($permissions);
        // die();
         ?>
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <?php 
                if(in_array('dashboard', $permissions)){ 
                ?>
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('staff/dashboard'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-tachometer "></i>
                        </div>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <?php } 
                if(in_array('enquiry', $permissions)){ 
                ?>
                
                <li class="nav-item">
                   <a class="nav-link text-white " href="<?= base_url('staff/enquiry'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-question" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Customized Enquiry (<?php // $CI = &get_instance(); echo $CI->Global_model->countseen('enquiry');?>)</span>
                    </a>
                </li>
                
                <?php } 
                if(in_array('exhibitions', $permissions)){ 
                ?>
                
                <li class="nav-item">
                   <a class="nav-link text-white " href="<?= base_url('staff/exhibitions'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Exhibitions</span>
                    </a>
                </li>
                
                <?php } 
                if(in_array('offline', $permissions)){ 
                ?>
                
                <li class="nav-item">
                   <a class="nav-link text-white " href="<?= base_url('staff/offline'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Offline Bookings</span>
                    </a>
                </li>
                
                <?php } 
                if(in_array('coupons', $permissions)){ 
                ?>

                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/coupons'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">coupons</span>
                    </a>
                </li>

                <?php } 
                if(in_array('orders', $permissions)){ 
                ?>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/orders'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Orders</span>
                    </a>
                </li>

                <?php } 
                if(in_array('slider', $permissions)){ 
                ?>

                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('staff/slider'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-image" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Slider</span>
                    </a>
                </li>

                <?php } 
                if(in_array('gallerys', $permissions)){ 
                ?>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/gallerys'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-image" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Gallery </span>
                    </a>
                </li>

                <?php } 
                if(in_array('vgallery', $permissions)){ 
                ?>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/vgallery'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-video" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Video Gallery</span>
                    </a>
                </li>

                <?php } 
                if(in_array('brands', $permissions)){ 
                ?>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/brands'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-image" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sponsors</span>
                    </a>
                </li>
                
                <?php } 
                if(in_array('customers', $permissions)){ 
                ?>

                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/customers'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Customers</span>
                    </a>
                </li>

                <?php } 
                if(in_array('carenquiry', $permissions)){ 
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/carenquiry'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-question" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Car Enquiry (<?php //$CI = &get_instance(); echo $CI->Global_model->countseen('carenquiry');?>)</span>
                    </a>
                </li> -->

                <?php } 
                if(in_array('farm', $permissions)){ 
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/farm'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Farm</span>
                    </a>
                </li> -->

                <?php } 
                if(in_array('farmcategory', $permissions)){ 
                ?>
                
                <!-- <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/farmcategory'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-sitemap" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Farm Category</span>
                    </a>
                </li> -->

                <?php } 
                if(in_array('farmenquiry', $permissions)){ 
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/farmenquiry'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-question" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Farm Enquiry (<?php //$CI = &get_instance(); echo $CI->Global_model->countseen('farmenquiry');?>)</span>
                    </a>
                </li> -->
                
                <?php } 
                if(in_array('team', $permissions)){ 
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/team'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Our Team</span>
                    </a>
                </li> -->

                <?php } 
                if(in_array('sliders', $permissions)){ 
                ?>

                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/sliders'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-file-image"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sliders</span>
                    </a>
                </li>

                <?php } 
                if(in_array('services', $permissions)){ 
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('staff/services'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Services</span>
                    </a>
                </li> -->

                <?php } 
                if(in_array('blogs', $permissions)){ 
                ?>
                
                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('staff/blogs'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fas fa-rss" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Blogs</span>
                    </a>
                </li>

                <?php } 
                if(in_array('reviews', $permissions)){ 
                ?>

                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('staff/reviews'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-star" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Reviews</span>
                    </a>
                </li>

                <?php } 
                if(in_array('appointments', $permissions)){ 
                ?>

                <!-- <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('staff/appointments'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Appointments (<?php //$CI = &get_instance(); echo $CI->Global_model->countseen('form');?>)</span>
                    </a>
                </li> -->

                <?php } 
                if(in_array('roles', $permissions)){ 
                ?>

                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('staff/roles'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Roles</span>
                    </a>
                </li>

                <?php } 
                if(in_array('staff', $permissions)){ 
                ?>

                <li class="nav-item">
                    <a class="nav-link text-white" href="<?= base_url('staff/staff'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Staff</span>
                    </a>
                </li>

                <?php } ?>
                
                <li class="nav-item ">
                    <!-- <a class="nav-link text-white" data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-file" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Pages</span>
                    </a> -->
                    <div class="collapse " id="ordersExample">
                        <ul class="nav nav-sm flex-column">
                            <?php if(in_array('about', $permissions)){ ?>
                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('staff/about'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> About Us </span>
                                </a>
                            </li> -->

                            <?php }  if(in_array('terms', $permissions)){  ?>

                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('staff/terms'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Terms & Conditions </span>
                                </a>
                            </li> -->

                            <?php }  if(in_array('privacy', $permissions)){  ?>
                            
                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('staff/privacy'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Privacy Policy </span>
                                </a>
                            </li> -->

                            <?php }  if(in_array('cancellation', $permissions)){  ?>

                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('staff/cancellation'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Cancellation & Refund Policy </span>
                                </a>
                            </li> -->
                            
                            <?php }  if(in_array('doanddonts', $permissions)){  ?>

                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('staff/doanddonts'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Do and Don’ts </span>
                                </a>
                            </li> -->

                            <?php }  if(in_array('safetyfeatures', $permissions)){  ?>

                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('staff/safetyfeatures'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Safety Features </span>
                                </a>
                            </li> -->

                            <?php }  if(in_array('traveltips', $permissions)){  ?>

                            <!-- <li class="nav-item">
                                <a class="nav-link text-white " href="<?= base_url('staff/traveltips'); ?>">
                                    <span class="sidenav-normal  ms-2  ps-1"> Travel Tips </span>
                                </a>
                            </li> -->

                            <?php } ?>
                            
                        </ul>
                    </div>
                </li>
                
                <?php if(in_array('backup', $permissions)){  ?>
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/backup'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-history" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Backup</span>
                    </a>
                </li>

                <?php }  if(in_array('globalsettings', $permissions)){  ?>

                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Settings</h6>
                </li> 
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/globalsettings'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Settings</span>
                    </a>
                </li>

                <?php }  if(in_array('changepassword', $permissions)){  ?>
                
                <li class="nav-item">
                    <a class="nav-link text-white " href="<?= base_url('staff/change-password'); ?>">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </div>
                        <span class="nav-link-text ms-1">Change Password</span>
                    </a>
                </li>

                <?php }  ?>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky noPrint" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <img src="<?= base_url('assets/front/images/logo.webp'); ?>" style="height:3rem" alt="" srcset="">
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar" style="justify-content: end;">
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="<?php echo site_url('staff/logout') ?>" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-user me-sm-1"></i>
                                <span class="d-sm-inline d-none">Logout</span>
                            </a>
                        </li>
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

    <?php if(isset($_SESSION['success_msg'])){ ?>
    <script>
    setTimeout(function() {
        document.getElementById('myalert').style.display = "none";
    }, 3000);
    </script>
    <div class="alert alert-success alert-dismissible text-white ms-auto w-30" id="myalert"
        style="right: 24px; top: 0px; position: absolute; z-index: 10000;background:green" role="alert">
        <span class="text-sm"><?=$_SESSION['success_msg']; ?></span>
        <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php } ?>

    <?php if(isset($_SESSION['error_msg'])){ ?>
        <script>
        setTimeout(function() {
            document.getElementById('myalert').style.display = "none";
        }, 3000);
        </script>
        <div class="alert alert-error alert-dismissible text-white ms-auto w-30" id="myalert"
            style="right: 24px; top: 0px; position: absolute; z-index: 10000; background:red" role="alert">
            <span class="text-sm"><?=$_SESSION['error_msg']; ?></span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>