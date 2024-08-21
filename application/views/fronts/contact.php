<?php include('header.php'); ?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact Us</h1>
            </div>
        </div>
    </div>
</section>
<section class="contact-area">
    <div class="container">
        <div class="contact-body align-items-stretch" data-aos="fade-up">
            <div class="row">
                <div class="col-md-6">
                    <div class="hcontact-address">
                        <h3>Contact Info</h3>
                        <div class="contact-address-body">
                            <p><i class="fa-solid fa-location-dot"></i><span> First Floor, Shree Raj Tower 269, 2nd,<br>
                                    Mahavir Nagar, Maharani Farm,<br> Jaipur-302018 Rajasthan</span></p>
                            <p><i class="fa fa-envelope"></i><span><a
                                        href="mailto:info@gdigitalindia.com">info@gdigitalindia.com </a></span></p>
                            <p><i class="fa fa-phone"></i><span><a href="tel:919116175152">+91 9116175152</a></span></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="hcontact-form">
                        <h3>Get In Touch</h3>
                        <form action="<?=base_url('enquiry');?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="email" class="form-label">Email Id</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="phone" class="form-label">Mobile No.</label>
                                        <input type="tel" name="mobile" id="phone" class="form-control" max="10"
                                            pattern="[6789][0-9]{9}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-2">
                                        <label for="mode" class="form-label">Select Course Mode</label>
                                        <select name="service" class="form-select" id="mode"
                                            aria-label="Select Course Mode">
                                            <option selected disabled>Select</option>
                                            <option value="Online Digital Marketing Course">Online Digital Marketing
                                                Course
                                            </option>
                                            <option value="Offline Digital Marketing Course">Offline Digital Marketing
                                                Course</option>
                                            <option value="Offline Digital Marketing Internship">Offline Digital
                                                Marketing
                                                Internship</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label for="problem" class="form-label">Message</label>
                                        <textarea name="message" id="message" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-1">
                                        <button type="submit" class="submit-btn" name="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-md-12">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d396.40671508066526!2d75.78200224210211!3d26.852285941377456!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x396db558853b6eb9%3A0x8ad5f896d983963f!2sG%20Digital%20India%20%E2%9C%85!5e0!3m2!1sen!2sin!4v1712205311958!5m2!1sen!2sin"
                        width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

        </div>

    </div>
</section>


<?php include('footer.php'); ?>