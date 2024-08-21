<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="">
  <meta name="description" content="">
  <title>Dahleez</title>

  <!--Bootstrap -->
  <!-- <link id="pagestyle" href="<?=base_url('assets/admin/css/material-dashboard.css?v=3.0.4');?>" rel="stylesheet" /> -->
  <link rel="stylesheet" href="<?= base_url('assets/front/css/bootstrap.min.css'); ?>" type="text/css">
  <!--Custome Style -->
  <link rel="stylesheet" href="<?= base_url('assets/front/css/style.css'); ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/front/css/custom.css'); ?>" type="text/css">
  <!--OWL Carousel slider-->
  <link rel="stylesheet" href="<?= base_url('assets/front/css/owl.carousel.css'); ?>" type="text/css">
  <link rel="stylesheet" href="<?= base_url('assets/front/css/owl.transitions.css'); ?>" type="text/css">
  <!-- SWITCHER -->
  <link rel="stylesheet" id="switcher-css" type="text/css" href="<?= base_url('assets/front/switcher/css/switcher.css'); ?>" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/front/switcher/css/color1.css'); ?>" title="color1" media="all" data-default-color="true" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/front/switcher/css/color2.css'); ?>" title="color2" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/front/switcher/css/color3.css'); ?>" title="color3" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/front/switcher/css/color4.css'); ?>" title="color4" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/front/switcher/css/color5.css'); ?>" title="color5" media="all" />
  <link rel="alternate stylesheet" type="text/css" href="<?= base_url('assets/front/switcher/css/color6.css'); ?>" title="color6" media="all" />

  <link rel="stylesheet" href="<?= base_url("assets/front/css/magiczoomplus.css"); ?>" type="text/css">
  <!--FontAwesome Font Style -->
  <script src="<?= base_url('assets/front/js/31f5977fdc.js'); ?>"></script>

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url('assets/front/images/favicon-icon/apple-touch-icon-144-precomposed.png'); ?>">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('assets/front/images/favicon-icon/apple-touch-icon-72-precomposed.png'); ?>">
  <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/front/images/favicon-icon/apple-touch-icon-57-precomposed.png'); ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/front/images/favicon-icon/favicon.png'); ?>">
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body id="home">

  <!--Header-->
  <header id="header" class="transparent">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo">
            <a href="<?=base_url();?>"><img src="<?=base_url('assets/front/images/logo.webp')?>" alt=""></a>
            <!-- <h3><a href="<?= base_url() ?>"><span>DAH</span>LEEZ</a></h3> -->
          </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <!-- Navigation -->
          <nav class="navbar navbar-expand-lg">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <div class="collapse navbar-collapse" id="navigation">
              <ul class="nav navbar-nav ml-auto">
                <li class="active dropdown"><a href="<?= base_url() ?>">Home</a>
                <li class="active dropdown"><a href="<?= base_url('blog') ?>">Blogs</a>

                </li>
                <li class="dropdown"><a class="dropdown-toggle" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">All Exhibitions</a>
                  <ul class="dropdown-menu">
                    <li><a href="<?= base_url('upcoming'); ?>"">Upcoming Exhibitions</a></li>
                    <li><a href=" <?= base_url('ongoing'); ?>"">Ongoing Exhibitions</a></li>
                    <li><a href="<?= base_url('completed'); ?>"">Completed Exhibitions</a></li>
                    <li><a href=" <?= base_url('exhibitions'); ?>"">All Exhibitions</a></li>
                    <!-- <li><a href="single-<?= base_url('event'); ?>"">Event Detail Page</a></li> -->
                  </ul>
                </li>
                <!-- <li class="dropdown"><a class="dropdown-toggle" href="event.php" role="button" data-bs-toggle="dropdown">All Event</a>
                <ul class="dropdown-menu">
                  <li><a href="upcoming.php">Upcoming Event</a></li>
                  <li><a href="ongoing.php">Ongoing Event</a></li>
                  <li><a href="expired.php">Expired Event</a></li>
                  <li><a href="featured.php">Featured Event</a></li>
                  <li><a href="single-event.php">Event Detail Page</a></li>
                </ul>
              </li> -->
                <li class="dropdown"><a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Pages</a>
                  <ul class="dropdown-menu">
                    <li><a href="<?= base_url('about'); ?>">About Us</a></li>
                      <li><a href="<?= base_url('contact'); ?>">Contact Us</a></li>
                  </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Gallery</a>
                  <ul class="dropdown-menu">
                    <li><a href="<?= base_url('gallery') ?>">Gallery</a></li>
                    <li><a href="<?= base_url('video') ?>">Video Gallery</a></li>
                  </ul>
                </li>
                <!-- <li class="dropdown">
                  <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"> Blog </a>
                  <ul class="dropdown-menu">
                    <li><a href="blog-left-sidebar.php">Blog Left Sidebar</a></li>
                    <li><a href="blog-right-sidebar.php">Blog Right Sidebar</a></li>
                    <li><a href="blog.php">Blog Grid Style</a></li>
                    <li><a href="blog-detail.php">Blog Single</a></li>
                  </ul>
                </li> 
                <li class=" dropdown">
                  <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Elements </a>
                  <ul class="dropdown-menu">
                    <li><a href="pricing.php">Pricing</a></li>
                    <li><a href="schedule.php">Schedule</a></li>
                    <li><a href="speakers.php">Speakers</a></li>
                    <li><a href="sponsors.php">Sponsors</a></li>
                    <li><a href="testimonials.php">Testimonials</a></li>
                    <li><a href="venue.php">Venue</a></li>
                  </ul>
                </li> -->
                <li><a href="<?= base_url('user/login'); ?>"> <i class="fa-regular fa-user"></i>
                    <?= (isset($_SESSION['userName'])) ? $_SESSION['userName'] : ''; ?></a></li>
                <li><a href="<?= base_url('cart'); ?>"> <i class="fa-solid fa-cart-shopping"></i></a></li>
              </ul>
            </div>
          </nav>
          <!-- Navigation end -->
        </div>
      </div>
    </div>
  </header>
  <!-- /Header -->