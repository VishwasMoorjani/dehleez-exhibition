<!-- footer start -->
<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-md-6 col-lg-3">
                <div class="footer-col">
                    <h3 class="footer-title">About Us</h3>
                    <p><b>Digital Shiksha</b> provides you maximum opportunities to earn digital marketing trends which
                        assist
                        you to mould a considerable career in Digital Marketing....
                        <a class="f-read" href="<?=base_url('about');?>">Read More</a>
                    </p>
                </div>
            </div>

            <div class="col-md-6 col-lg-2">
                <div class="footer-col">
                    <h3 class="footer-title">Quick Links</h3>
                    <ul class="footer-menu">
                        <li>
                            <a href="<?=base_url();?>">
                                <i class="fa fa-angle-right"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url('about');?>">
                                <i class="fa fa-angle-right"></i>
                                About Us
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url('student-stories');?>">
                                <i class="fa fa-angle-right"></i>
                                Students Stories
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url('contact');?>">
                                <i class="fa fa-angle-right"></i>
                                Contact Us
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="footer-col">
                    <h3 class="footer-title">Digital Marketing</h3>
                    <ul class="footer-menu">
                        <li>
                            <a href="<?=base_url('online-course');?>">
                                <i class="fa fa-angle-right"></i>
                                Online Course
                            </a>
                        </li>
                        <li>
                            <a href="<?=base_url('classroom-course');?>">
                                <i class="fa fa-angle-right"></i>
                                Classroom Course
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-md-6 col-lg-4">
                <div class="footer-col">
                    <h3 class="footer-title">
                        Get In Touch
                    </h3>
                    <ul class=" address">
                        <li>
                            <p><i class="fa-solid fa-location-dot"></i>
                                First Floor, Shree Raj Tower 269, 2nd,
                                Mahavir Nagar, Maharani Farm,
                                Jaipur-302018 Rajasthan
                            </p>
                        </li>
                        <li>
                            <a href="tel:9116175152">
                                <i class="fa fa-phone"></i>
                                +91 9116175152
                            </a>
                        </li>
                        <li><a href="mailto:info@gdigitalindia.com">
                                <i class="fa fa-envelope"></i>
                                info(@)gdigitalindia.com </a>
                        </li>
                    </ul>

                    <ul class="footer-social-link">
                        <li><a target="_blank" href="https://www.facebook.com/people/DigitalShiksha/61557704254637/"
                                rel="nofollow" class="facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/digitalshikshajaipur/" rel="nofollow"
                                class="instagram"><i class="fa-brands fa-instagram"></i></a></li>
                        <!--<li><a target="_blank" href="https://twitter.com/gdigitalindia" class="twitter"><i class="fa-brands fa-twitter"></i></a></li>-->
                        <!--<li><a target="_blank" href="https://www.linkedin.com/" class="linkedin"><i-->
                        <!--            class="fab fa-linkedin-in"></i></a></li>-->
                        <!--<li><a target="_blank" href="#" class="youtube"><i class="fa-brands fa-youtube"></i></a></li>-->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- footer end -->


<!-- copy right start -->
<div class="copy-right">
    <div class="container">
        <div class="copy-right-text">
            <p><a href="https://www.gdigitalindia.com/" rel="nofollow" target="_blank">
                    <img src="<?=base_url('assets/front/images/gdilogo.png');?>" alt="">
                </a></p>
        </div>
    </div>
</div>
<!-- copy right end -->

<!-- whatsapp start -->
<div class="socialcontact">
    <div class="quickcontact">
        <a href="tel:+919116175152" target="_blank">
            <img src="<?=base_url('assets/front/images/call.webp');?>"></a>
    </div>
    <div class="quickcontact1">
        <a href="https://wa.me/919116175152" rel="nofollow" target="_blank">
            <img src="<?=base_url('assets/front/images/whatsapp.webp');?>"></a>
    </div>
</div>


<a href="<?=base_url('download-brochure');?>" target="_blank" class="brochuredownload">Brochure Download</a>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Book Your Seat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="hcontact-form">
                    <p>Please, let us know any why you want to learn digital marketing & what you want to achieve after
                        completing this course?</p>
                    <form action="<?=base_url('enquiry');?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="email" class="form-label">Email Id</label>
                                    <input type="email" name="email" id="email" class="form-control" required="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="mode" class="form-label">Select Course Mode</label>
                                    <select name="service" class="form-select" id="mode" aria-label="Select Course Mode">
                                        <option selected disabled>Select</option>
                                        <option value="Online Digital Marketing Course">Online Digital Marketing Course
                                        </option>
                                        <option value="Offline Digital Marketing Course">Offline Digital Marketing
                                            Course</option>
                                        <option value="Offline Digital Marketing Internship">Offline Digital Marketing
                                            Internship</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="phone" class="form-label">Mobile No.</label>
                                    <input type="tel" name="mobile" id="phone" class="form-control" max="10"
                                        pattern="[6789][0-9]{9}" required="">
                                </div>
                            </div>
                            <!--<div class="col-md-12">-->
                            <!--    <div class="mb-2">-->
                            <!--        <label for="address" class="form-label">Address</label>-->
                            <!--        <input type="text" name="address" id="address" class="form-control" required="">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-6">-->
                            <!--    <div class="mb-2">-->
                            <!--        <label for="city" class="form-label">City</label>-->
                            <!--        <input type="text" name="city" id="city" class="form-control" required="">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-6">-->
                            <!--    <div class="mb-2">-->
                            <!--        <label for="state" class="form-label">State</label>-->
                            <!--        <input type="text" name="state" id="state" class="form-control" required="">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-6">-->
                            <!--    <div class="mb-2">-->
                            <!--        <label for="country" class="form-label">Country</label>-->
                            <!--        <input type="text" name="country" id="country" class="form-control" required="">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="col-md-6">-->
                            <!--    <div class="mb-2">-->
                            <!--        <label for="zip" class="form-label">Zip/Postal Code</label>-->
                            <!--        <input type="text" name="zip" id="zip" class="form-control" required="">-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="col-12">
                                <div class="mb-2">
                                    <label for="message" class="form-label">Message</label>
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
    </div>
</div>


<!-- whatsapp end -->


<!-- bottom to top button -->
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-angle-up"></i></button>
<!-- bottom to top button end -->



<!-- script start -->
<script src="<?=base_url('assets/front/js/aos.js');?>"></script>
<script src="<?=base_url('assets/front/js/bootstrap.bundle.min.js');?>"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="<?=base_url('assets/front/js/jquery.min.js');?>"></script>
<script src="<?=base_url('assets/front/js/magnific-popup.min.js');?>"></script>
<script src="<?=base_url('assets/front/js/owl.carousel.min.js');?>"></script>
<script src="<?=base_url('assets/front/js/main.js');?>"></script>
<!-- script end -->

<script>
document.addEventListener("DOMContentLoaded", function() {
    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown) {
            everydropdown.addEventListener('hidden.bs.dropdown', function() {
                // after dropdown is hidden, then find all submenus
                this.querySelectorAll('.submenu').forEach(function(everysubmenu) {
                    // hide every submenu as well
                    if (everysubmenu.style.display == 'block') {
                        everysubmenu.style.display = 'block';
                    } else {
                        everysubmenu.style.display = 'none';
                    }
                });
            })
        });

        document.querySelectorAll('.dropdown-menu a').forEach(function(element) {
            element.addEventListener('click', function(e) {
                let nextEl = this.nextElementSibling;
                if (nextEl && nextEl.classList.contains('submenu')) {
                    // prevent opening link if link needs to open dropdown
                    e.preventDefault();
                    if (nextEl.style.display == 'block') {
                        nextEl.style.display = 'none';
                    } else {
                        nextEl.style.display = 'block';
                    }

                }
            });
        })
    }
});
</script>

<script>
AOS.init();
</script>

<script>
let dropdowns = document.querySelectorAll('.dropdown-toggle')
dropdowns.forEach((dd) => {
    dd.addEventListener('click', function(e) {
        var el = this.nextElementSibling
        el.style.display = el.style.display === 'block' ? 'none' : 'block'
    })
})
</script>


<script>
(function(w, d) {
    w.CollectId = "66140406cb2e778c67125083";
    var h = d.head || d.getElementsByTagName("head")[0];
    var s = d.createElement("script");
    s.setAttribute("type", "text/javascript");
    s.async = true;
    s.setAttribute("src", "https://collectcdn.com/launcher.js');?>");
    h.appendChild(s);
})(window, document);
</script>



</body>

</html>