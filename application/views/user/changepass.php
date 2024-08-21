<?php
$title = "Pranshi Creations";
$description = "";
$keyword = "";
include('header.php'); ?>


<!-- heading -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">Change Password</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>


<!-- forgot -->
<section id="forgot">
    <div class="container">
        <h2>FORGOT PASSWORD</h2>
        <p>Please enter your code:</p>

        <form class="mb-3 row justify-content-center" method="post">
            <div class="col-12">
                <input type="email" name="email" placeholder="Email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" class="form-control" required>
            </div>
            <div class="col-12">
                <input type="text" name="resetcode" placeholder="Reset Code" class="form-control" required>
            </div>
            <div class="col-12">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
            </div>
            <div class="col-12">
                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" required>
            </div>
            <?php
            if (!empty($_SESSION['success_msg'])) {
                echo '<p class="status-msg success">' . $_SESSION['success_msg'] . '</p>';
            } elseif (!empty($_SESSION['error_msg'])) {
                echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
            }
            ?>
            <!-- <div class="forgot"><a href="<?= base_url('user/forgot_password') ?>">Forgot password?</a></div> -->

            <div class="col-12">


                <button type="submit" class="view w-100">CHANGE PASSWORD</button>
                <!-- <a href="" class="view w-100">Recover</a> -->
            </div>
        </form>
        <?php 
            if(isset($_SESSION['email'])){
        ?>
        <form action="<?= base_url('user/change_password') ?>" method="post">
            <input type="hidden" name="email" placeholder="Email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : '' ?>" class="form-control" required>
            <button type="submit" class="view w-100" name="resendcode">Resend code</button>
        </form>
        <?php } ?>

        <p>Remember your password? <a href="<?= base_url('user/login') ?>" class="back">Back to login</a></p>

    </div>
</section>


<!-- footer -->

<?php include('footer.php'); ?>