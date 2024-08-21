<?php include('header.php'); ?>


<!-- heading -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">My Wallet</h1>
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
                <h3>My Transcations</h3>
                <!--<div class="table-responsive">
                    <table class="table ">
                        <thead class="table-light">
                            <tr style="text-align: center;">
                                <th>Wallet Balance</th>
                                <?php foreach ($wallet as $order) { ?>
                                    <th>₹ <?= $order['wallet'] ?></th>
                                <?php } ?>
                            </tr>
                        </thead>

                    </table>
                </div>-->

                <!--<h3>Refer And Earn</h3>
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="table-light">
                            <tr style="text-align: center;">
                                <th>Referral Link</th>
                                <?php //foreach ($wallet as $order) { 
                                ?>
                                <th><input style="height: 35px;" type="text" disabled class="form-control" value="<?= base_url('register/' . $referral_id); ?>" id="referral_link"></th>
                                <th><i onclick="myFunction()" class="fa fa-clipboard"></i></th>
                                <?php //} 
                                ?>
                            </tr>
                        </thead>

                    </table>
                </div>-->

                <!--<h3>My Transcations</h3>-->
                <div class="table-responsive">
                    <table class="table ">
                        <thead class="table-light">
                            <tr style="text-align: center;">
                                <th>S. No</th>
                                <!--<th>Transcation Id</th>-->
                                <!-- <th>Exhibition Id</th> -->
                                <!-- <th>Stall Number</th> -->
                                <th>Total Amount</th>
                                <th>Mode Of Payment</th>
                                <th>Remark</th>
                                <th>Date</th>
                                <!-- <th>Actions</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $count = 1;
                            foreach ($transcations as $transcation) { ?>
                                <tr style="text-align: center;">
                                    <td><?= $count; ?></td>
                                    <!--<td><?= $transcation['transcation_id']; ?></td>-->
                                    <!-- <td><?= $transcation['exhibition_id']; ?></td> -->
                                    <!-- <td><?= $transcation['stall_number']; ?></td> -->
                                    <td><?= number_format($transcation['amount'],2); ?></td>
                                    <td><?= $transcation['modeofpayment']; ?></td>
                                    <td><?php
                                        if ($transcation['remark'] == "Referral Amount") {
                                            // foreach ($exhibitions as $exhibition) {
                                                // if ($transcation['exhibition_id'] == $exhibition['id']) {
                                                    echo $transcation['remark'] . ' of <b>' . $transcation['amount'];
                                                // }
                                            // }
                                        }
                                        elseif ($transcation['remark'] == "Booked Stall") {
                                            foreach ($exhibitions as $exhibition) {
                                                if ($transcation['exhibition_id'] == $exhibition['id']) {
                                                    echo $transcation['remark'] . ' number <b>' . $transcation['stall_number'] . '</b> of exhibition <b> ' . $exhibition['name'] . '</b>';
                                                }
                                            }
                                        }
                                         elseif (!empty($transcation['exhibition_id']) && !empty($transcation['stall_number'])) {
                                            foreach ($exhibitions as $exhibition) {
                                                if ($transcation['exhibition_id'] == $exhibition['id']) {
                                                    echo 'Refund of stall number <b>' . $transcation['stall_number'] . '</b> of exhibition <b> ' . $exhibition['name'] . '</b>' . $transcation['remark'];
                                                }
                                            }
                                        } else { ?>
                                            <?= $transcation['remark']; ?>
                                        <?php } ?></td>
                                     <td><?php $date=date_create($transcation['date_added']); echo date_format($date,"d-m-Y"); ?></td> 
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

                            <!-- </tbody> -->
                    </table>
                </div>
            </div>


        </div>
    </div>




</section>

<?php include('footer.php'); ?>
<script>
    function myFunction() {
        // Get the text field
        var copyText = document.getElementById("referral_link");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        navigator.clipboard.writeText(copyText.value);

        // Alert the copied text
          alert("Referral Link Copied ");
    }
</script>