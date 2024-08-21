<?php include('header.php'); ?>


<!-- heading -->
<section id="heading">
    <div class="container">
        <h2>My Account</h2>
        <p><a href="<?=base_url();?>"><i class="fa-solid fa-house"></i> Home</a> <i class="fa-solid fa-angles-right"></i> My
            Account
        </p>
    </div>
</section>


<!-- account -->
<section id="account">
    <div class="container">
        <div class="row g-0">

            <div class="col-md-4">
                <div class="myaawwinr">
                    <h3>My Profile</h3>
                    <ul class="hhhshs list-unstyled">
                        <li><a href="myaccount.php">My Account</a></li>
                        <li><a href="myorder.php">My Orders</a></li>
                        <li><a href="my<?=base_url('user/wishlist');?>">Wishlist</a></li>
                        <li><a href="login.php">Log Out</a></li>
                    </ul>
                </div>
            </div>


            <div class="col-md-8 wishlist">
                <h3>Orders History</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead class="table-light">
                            <tr style="text-align: center;">
                                <th></th>
                                <th></th>
                                <th>Product</th>
                                <th>Price</th>
                                <!-- <th>Stock Status</th> -->
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($wishlist as $wishlists){ ?>
                            <tr style="text-align: center; vertical-align: middle;">
                                <td><a href="#" class="delet"><i class="fa-solid fa-trash-can"></i></a></td>
                                <td><a href="#" class="imgsc"><img src="<?=base_url('assets/front/images/'.$wishlists['image']);?>" width="50"
                                            alt=""></a></td>
                                <td><a href="#"><?=base_url('name')?></a></td>
                                <td>₹<?=base_url('mrp')?></td>
                                <!-- <td>In Stock</td> -->
                                <td class="btn2"><a href="#"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</a></td>
                            </tr>
                            <?php } ?>

                            <!-- <tr style="text-align: center; vertical-align: middle;">
                                <td><a href="#" class="delet"><i class="fa-solid fa-trash-can"></i></a></td>
                                <td><a href="#" class="imgsc"><img src="assets/front/images/category1.jpg" width="50"
                                            alt=""></a></td>
                                <td><a href="#">Peplum Kurta</a></td>
                                <td>₹1620</td>
                                <td>In Stock</td>
                                <td class="btn2"><a href="#"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</a></td>
                            </tr> -->

                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>




</section>



<?php include('footer.php'); ?>