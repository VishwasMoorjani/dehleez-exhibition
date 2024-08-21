<?php include('header.php'); ?>

<!-- Banners -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">Contact Us</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Banners -->

<!-- Ongoing Event -->
<section class="our_articles single_article">
    <div class="container">
        <div class="row">

            <div class="col-sm-6">
                <h5 class="cfrom-title">Let's get in touch</h5>
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" name="name" placeholder="Enter Your Name" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="Enter Your Email" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" placeholder="Enter Your subject" class="form-control"
                                    required>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" name="message" placeholder="Enter Your Message"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group checkbox">
                                <input type="checkbox" name="accept-this-1" value="1" aria-invalid="false"
                                    required><span>Check here to consent to this website storing my information so
                                    they can respond.</span>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <input type="submit" name="contactus" value="Contact Us" class="btn btn-primary">
                        </div>

                    </div>
                </form>
            </div>
            <div class="col-sm-6">
                <div class="g-map-m">
                    <div id="js-gmap" class="gmap js-gmap">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14230.861279658253!2d75.7377182!3d26.9125285!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db56b8d307365%3A0xf768195652f73d82!2sDahleez%20Kurti%20Jaipur!5e0!3m2!1sen!2sin!4v1721033132523!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<!-- / Ongoing Event -->


<?php include('footer.php'); ?>