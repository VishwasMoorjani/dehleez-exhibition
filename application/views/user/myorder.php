<?php include('header.php'); ?>


<!-- heading -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">My Orders</h1>
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
                <h3>Orders History</h3>
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="table-light">
                            <tr style="text-align: center;">
                                <th>S No.</th>
                                <th>Booking Date</th>
                                <th>Payment Status</th>
                                <th>Total Amount (inc. GST)</th>
                                <th>Stall No</th>
                                <th>Exhibition</th>
                                <th>Ex. Start Date</th>
                                <th>Ex. End Date</th>
                                <!--<th>Actions</th>-->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $count = 1;
                            foreach(array_reverse($orders) as $order){ ?>
                            <tr style="text-align: center;">
                                <td><?=$count;?></td>
                                <td><?=$order['booking_date']?></td>
                                <td>Completed</td>
                                <td><?=number_format($order['price'],2)?></td>
                                <td><?=$order['stall_number']?></td>
                                <td><?=$order['exhibition_name']?></td>
                                <td><?=$order['start_date']?></td>
                                <td><?=$order['end_date']?></td>
                                <!--<td class="btn2"><a href="orderlist.php">View</a></td>-->
                            </tr>
                            <?php 
                            $count++;
                            } ?>

                            <!-- <tr style="text-align: center;">
                                <td>2</td>
                                <td>May 10, 2018</td>
                                <td>Processing</td>
                                <td>₹174017.00 For 1 Item</td>
                                <td>Kurta</td>
                                <td class="btn2"><a href="orderlist.php">View</a></td>
                            </tr>

                            <tr style="text-align: center;">
                                <td>3</td>
                                <td>May 10, 2018</td>
                                <td>Processing</td>
                                <td>₹174017.00 For 1 Item</td>
                                <td>Kurta</td>
                                <td class="btn2"><a href="orderlist.php">View</a></td>
                            </tr> -->

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>



<?php if($this->session->flashdata('success_msg')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="position: fixed; bottom: 20px; right: 20px; z-index: 1050;">
        <?php echo $this->session->flashdata('success_msg'); ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <script>
        setTimeout(function() {
            bootstrap.Alert.getOrCreateInstance(document.querySelector(".alert")).close();
        }, 5000);
    </script>
<?php endif; ?>
</section>



<?php include('footer.php'); ?>