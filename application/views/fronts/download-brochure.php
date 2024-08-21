<?php include('header.php'); ?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1> <b>Download Brochure</b></h1>
            </div>
        </div>
    </div>
</section>

<div class="pricelistdownload">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="freeform">
                    <h2><span class="downloadlist">Download Brochure</span> of Full Course Details </h2>

                    <div class="form-title"> Enter your mobile number to get the brochure on your whatsapp</div>
                    <form method="post" name="newsletter" action="<?=base_url('brochuredownload');?>">
                        <div class="mb-4 mt-3">
                            <input name="name" type="text" class="form-control" required="" id="name"
                                placeholder="Your Name">
                        </div>
                        <div class="mb-4 mt-3">
                            <input name="mobile" type="tel" class="form-control" pattern="[7896][0-9]{9}"
                                title="please enter 10 digit mobile number" required="" id="phone"
                                placeholder="Your 10 Digit WhatsApp No.">
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn brochurebtn btn-block">Download
                                Brochure</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>




<?php include('footer.php'); ?>