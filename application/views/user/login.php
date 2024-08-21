<?php
$title = "Pranshi Creations";
$description = "";
$keyword = "";
include('header.php');?>


<!-- heading -->
<section id="heading">
    <div class="container">
      <h2>Login</h2>
        <p><a href="<?=base_url();?>"><i class="fa-solid fa-house"></i> Home</a> <i class="fa-solid fa-angles-right"></i> Login</p>
    </div>
</section>


  <!-- login -->
  <section id="login">
    <div class="container">
      <h2>LOGIN</h2>
      <p>Please enter your e-mail and password:</p>

      <form class="mb-3 row justify-content-center">
        <div class="col-12">
          <input type="email" name="email" placeholder="Email" class="form-control" required>
        </div>

        <div class="col-12">
          <input type="password" name="password" placeholder="password" class="form-control" required>
        </div>

        <div class="forgot"><a href="forgot.php">Forgot password?</a></div>

        <div class="col-12">
          <a href="myaccount.php" class="view w-100">LOGIN</a>
        </div>
      </form>

      <p>Don't have an account ? <a href="register.php">Register</a></p>
 
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