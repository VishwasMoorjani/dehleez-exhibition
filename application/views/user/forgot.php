<?php
$title = "Pranshi Creations";
$description = "";
$keyword = "";
include('header.php'); ?>


<!-- heading -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">Forgot Password</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>


<!-- forgot -->
<section id="forgot">
  <div class="container">
    <h2>FORGOT PASSWORD</h2>
    <p>Please enter your email:</p>

    <form class="mb-3 row justify-content-center" method="post">
      <div class="col-12">
        <input type="email" name="email" placeholder="Email" class="form-control" required>
      </div>
      <?php
      if (!empty($_SESSION['success_msg'])) {
        echo '<p class="status-msg success">' . $_SESSION['success_msg'] . '</p>';
      } elseif (!empty($_SESSION['error_msg'])) {
        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
      }
      ?>

      <div class="col-12">
        <button type="submit" class="view w-100" name="submit">SEND PASSWORD</button>
        <!-- <a href="" class="view w-100">Recover</a> -->
      </div>
    </form>

    <p>Remember your password? <a href="<?=base_url('user/login')?>" class="back">Back to login</a></p>

  </div>
</section>


<!-- footer -->

<?php include('footer.php'); ?>