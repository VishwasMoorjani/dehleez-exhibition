<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($metatitle)?$metatitle:'G Digital India')?></title>
    <meta name="description" content="<?=(isset($metadesc)?$metadesc:'G Digital India')?>">
    <meta name="keywords" content="<?=(isset($metakeyword)?$metakeyword:'G Digital India')?>">
    <link rel="icon" type="image/x-icon" href="<?=base_url('assets/front/images/favicon.png');?>">
    <meta name="robots" content="index, follow" />

    <meta name="googlebot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="bingbot" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="yahoobot" content=" index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1 /" />
    <meta name="msnbot" content=" index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1/" />
    <meta name="allow-search" content="yes" />
    <meta name="distribution" content="global" />
    <meta name="revisit-after" content="3 days" />
    <meta name="copyright" content="Copyright 2024  Digital Shiksha.com" />
    <meta name="publisher " content="Digital Shiksha" />
    <meta name="author" content="Digital Shiksha" />
    <meta name="rating" content="safe for kids" />
    <meta name="language" content="english" />
    <meta name="Reply-to" content=" info@gdigitalindia.com" />
    <meta name="document-type" content="Public" />
    <meta name="geo.region" content="IN" />
    <meta name="State" content="Rajasthan" />
    <meta name="City" content="Jaipur" />
    <meta name="geo.placename" content="Digital Shiksha" />
    <meta name="geo.position" content="26.8521007,75.7820389" />
    <meta name="ICBM" content="26.8521007,75.7820389" />

    <link rel="canonical" href="<?='https://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']?>" />
    <!-- link style start -->
    <link rel="stylesheet" href="<?=base_url('assets/front/css/bootstrap.min.css');?>"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?=base_url('assets/front/css/aos.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/front/css/magnific-popup.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/front/css/owl.carousel.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/front/css/style.css');?>">

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "EducationalOrganization",
        "name": "Digital Shiksha",
        "url": "https://www.digital-shiksha.com/",
        "logo": "https://www.digital-shiksha.com/<?=base_url('assets/front/images/logo.png');?>",
        "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "+91 9116175152",
            "contactType": "customer service",
            "areaServed": "IN",
            "availableLanguage": "en"
        },
        "sameAs": [
            "https://www.facebook.com/people/DigitalShiksha/61557704254637/",
            "https://www.instagram.com/digitalshikshajaipur/"
        ]
    }
    </script>



    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Digital Shiksha",
        "image": "https://www.digital-shiksha.com/<?=base_url('assets/front/images/get-jobs.webp');?>",
        "@id": "",
        "url": "https://www.digital-shiksha.com/",
        "telephone": "+91 9116175152",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "First Floor, Shree Raj Tower 269, 2nd, Mahavir Nagar, Maharani Farm",
            "addressLocality": "Jaipur",
            "postalCode": "302018",
            "addressCountry": "IN"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": 26.8521007,
            "longitude": 75.7820389
        },
        "sameAs": [
            "https://www.facebook.com/people/DigitalShiksha/61557704254637/",
            "https://www.instagram.com/digitalshikshajaipur/"
        ]
    }
    </script>

    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-P53CSNSL');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Meta Pixel Code -->
    <script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1138099467388222');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1138099467388222&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code-->

</head>

<body>

    <header>

        <header id="masthead" class="site-header">

            <div class="masthead">

                <nav class="navbar bg-light navbar-expand-lg">
                    <div class="container">
                        <a class="navbar-brand" href="<?=base_url();?>"><img
                                src="<?=base_url('assets/front/images/logo.png');?>"></a>
                        <!-- <form class="d-flex top-search" role="search">
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn h-search" type="submit"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </form> -->



                        <div class="nvingatin-offi offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a href="<?=base_url();?>"><img
                                            src="<?=base_url('assets/front/images/logo.png');?>"></a></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-start ms-auto">
                                    <li class="nav-item dropdown" id="myDropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-graduation-cap"></i> Digital Marketing </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item dropdown dropend" id="myDropdown"><a class="nav-link"
                                                    href="<?=base_url('classroom-course');?>"> Classroom Course</a></li>
                                            <li class="nav-item dropdown dropend" id="myDropdown"> <a class="nav-link"
                                                    href="<?=base_url('online-course');?>">Online Course</a></li>
                                        </ul>
                                    </li>

                                    <li class="nav-item"><a class="nav-link" href="<?=base_url();?>">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url('about');?>">About</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url('student-stories');?>">Student
                                            Stories</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url('blog');?>">Blog</a></li>
                                    <li class="nav-item"><a class="nav-link" href="<?=base_url('contact');?>">Contact Us</a></li>
                                </ul>

                            </div>
                        </div>

                        <div class="enrollcontact">
                            <a class="enroll" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="fa-solid fa-paper-plane"></i> Enroll Now</a>
                            <a class="headercontactno" href="tel:+919116175152"><i class="fas fa-phone-alt"
                                    aria-hidden="true"></i> +91 9116175152</a>
                        </div>

                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                    </div>
                </nav>


            </div>

            <div id="tophead">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 top-header align-items-center">
                            <div class="tophead-contact">
                                <h4>Next Digital Marketing Batch - 15 April 2024</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>

    </header>