<?php
$title = "Pranshi Creations";
$description = "";
$keyword = "";
include('header.php');?>



<!-- heading -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">Register</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>



  <!-- register -->
  <section id="register">
    <div class="container">
      <h2>REGISTER</h2>
      <p>Please fill in the information below:</p>
      <p><?php echo $this->session->flashdata('error_msg'); ?></p>
      <form class="mb-3 row justify-content-center" method="post">
        <div class="col-12">
          <input type="text" name="firstname" placeholder="First Name" class="form-control" required>
        </div>
        <div class="col-12">
          <input type="text" name="lastname" placeholder="Last Name" class="form-control" required>
        </div>

        <div class="col-12">
          <input type="number" name="phone" placeholder="Phone" pattern="[7896][0-9]{9}" class="form-control" required>
        </div>

        <div class="col-12">
          <input type="email" name="email" placeholder="Email" class="form-control" required>
        </div>
        
        <div class="col-12">
          <input type="text" name="gst" placeholder="GST (optional)" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" class="form-control">
        </div>

        <div class="col-12">
          <input type="password" name="password" placeholder="Password" class="form-control" required>
        </div>
        <div class="col-12">
          <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" required>
        </div>

        <!-- <div class="forgot"><a href="#">Forgot password?</a></div> -->

        <div class="col-12">
          <button type="submit" name="registerSubmit" class="view w-100">Create my account</button>
        </div>
      </form>

      <p>have an account ? <a href="<?=base_url('user/login');?>">Log in</a></p>

      <!-- <ul class="list-unstyled">
        <li class="justify-content-between d-flex align-items-center facebook">
          <a href="#">Sign in with Facebook</a> <i class="fa-brands fa-facebook-f"></i>
        </li>
        <li class="justify-content-between d-flex align-items-center google">
          <a href="#">Sign in with Google</a> <i class="fa-brands fa-google"></i>
        </li>
        <li class="justify-content-between d-flex align-items-center twitter ">
          <a href="#">Sign in with Twitter</a> <i class="fa-brands fa-twitter"></i>
        </li>
      </ul> -->

    </div>
  </section>


  <!-- footer -->

  <?php include('footer.php');?>