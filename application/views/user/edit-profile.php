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

            <div class="col-md-9">
                <div class="myaawwinra">
                    <h3>Edit Account Details</h3>
                    <form class="row g-3"  method="post">
                        <div class="col-md-12 position-relative">
                            <!-- <label for="validationTooltip01" class="form-label">First name</label> -->
                            <input type="text" name="firstname" class="form-control" value="<?=$account['firstname']?>" required>
                        </div>

                        <div class="col-md-12 position-relative">
                            <!-- <label for="validationTooltip02" class="form-label">Last name</label> -->
                            <input type="text" name="lastname" class="form-control" value="<?=$account['lastname']?>" required>
                        </div>

                        <div class="col-md-12 position-relative">
                            <!-- <label for="validationTooltip02" class="form-label">Last name</label> -->
                            <input type="text" name="phone" pattern="[7896][0-9]{9}" class="form-control" value="<?=$account['phone']?>"
                                required>
                        </div>
                        
                        <div class="col-md-12 position-relative">
                            <!-- <label for="validationTooltip02" class="form-label">Last name</label> -->
                            <input type="text" name="gst" pattern="^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$" placeholder="GST (optional)" class="form-control" value="<?=$account['gst']?>">
                        </div>

                        <div class="col-md-12 position-relative">
                            <!-- <label for="validationTooltip02" class="form-label">Last name</label> -->
                            <input type="text" class="form-control" value="<?=$account['email']?>" required disabled>
                        </div>
                        <button type="submit" name="AccountSubmit" class="upto">Update Profile</button>
                    </form>

                    <!-- <a href="#" class="upto">Update Profine</a> -->
                </div>
            </div>
        </div>
    </div>
</section>



<?php include('footer.php'); ?>