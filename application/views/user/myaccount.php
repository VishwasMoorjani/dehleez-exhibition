<?php include('header.php'); ?>


<!-- heading -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">My Acount</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>


<!-- account -->
<section id="account">
    <div class="container">
        <div class="row g-0">

            <div class="col-md-3">
                <div class="myaawwinr">
                    <h3>My Profile</h3>
                    <ul class="hhhshs list-unstyled">
                        <li><a href="<?=base_url('user/myaccount');?>">My Account</a></li>
                        <li><a href="<?=base_url('user/editprofile');?>">Edit Profile</a></li>
                        <li><a href="<?=base_url('upcoming');?>">Upcoming Exhibition</a></li>                        
                        <li><a href="<?= base_url('user/order_history/' . $account['id']) ?>">My Orders</a></li>
                        <li><a href="<?= base_url('user/wallet') ?>">My Wallet</a></li>
                        <li><a href="<?= base_url('user/transcation') ?>">My Transcation</a></li>
                        <li><a href="<?= base_url('user/calender') ?>">Exhibition Calender</a></li>
                        <!-- <li><a href="<?= base_url('user/wishlist'); ?>">Wishlist</a></li> -->
                        <li><a href="<?= base_url('user/changepassword') ?>">Change Password</a></li>
                        <li><a href="<?= base_url('user/logout') ?>">Log Out</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-9 d-flex justify-content-center align-items-center">
                <div class="myaawwinra text-center">
                    <h2>Welcome To <span style="color:red">Dahleez</span></h2>
                    <p><a href="<?=base_url('upcoming');?>"><b>Click here to book upcoming exhibitions</b></a></p>
                    <a href="<?=base_url('upcoming');?>" class="btn btn-danger m-3" style="border-radius:5px">Upcoming Exhibitions</a>
                    

                    <!-- <a href="#" class="upto">Update Profine</a> -->
                </div>
            </div>
        </div>
    </div>
</section>



<?php include('footer.php'); ?>