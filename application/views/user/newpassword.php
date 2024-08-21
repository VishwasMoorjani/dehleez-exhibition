<?php include('header.php'); ?>


<!-- heading -->
<section class="inner-pages text-center">
  <div class="container">
    <div class="white_text div_zindex">
      <h1 class="page_title">CREATE NEW PASSWORD</h1>
    </div>
  </div>
  <div class="dark-overlay"></div>
</section>



<!-- password -->
<section id="password">
  <div class="container">
    <h2>CREATE NEW PASSWORD</h2>
    <p>Please enter your new password:</p>
    <p><?php echo $this->session->flashdata('success_msg'); ?></p>
    <p><?php echo $this->session->flashdata('error_msg'); ?></p>
    <form class="mb-3 row justify-content-center" method="post" action="">
      <div class="col-12">
        <input type="password" name="oldpassword" placeholder="Old Password" class="form-control" required>
      </div>
      <div class="col-12">
        <input type="password" name="password" placeholder="New Password" class="form-control" required>
      </div>

      <div class="col-12">
        <input type="password" name="confirmpassword" placeholder="Confirm password" class="form-control" required>
      </div>

      <!-- <div class="forgot"><a href="forgot.php">Forgot password?</a></div> -->

      <div class="col-12">
        <!-- <a href="login.php" class="view w-100">Continue to Login</a> -->
        <button type="submit" class="view w-100" name="submit">Change Password</button>
      </div>
    </form>

    <!-- <p>Don't have an account ? <a href="register.php">Register</a></p> -->

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

<?php include('footer.php'); ?>