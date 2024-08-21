<?php include('header.php'); ?>
<!-- Banners -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">Event Industry Latest Updates</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Banners -->


<!-- cart -->

<section id="cart">
    <div class="container">
        <h3>Cart</h3>
        <div class="row rowmn">

            <div class="col-lg-8">
                <div class="row cartrow">
                    <?php
                    if ($this->cart->total_items() > 0) {
                        // echo "<pre>";
                        // print_r($cartItems);
                        // die();
                        foreach ($cartItems as $cartItem) {
                    ?>
                            <div class="col-md-9">
                                <ul class="list-unstyled d-flex gap-3">
                                    <li>
                                        <h6><?= $exhibitionss->name ?></h6>
                                    
                                        <h6><?= $cartItem['name'] ?></h6>
                                    </li>
                                    <li class="remove-1">
                                        <a onclick="return confirm('Are you sure to delete item?')?window.location.href='<?= base_url('home/removeItem/' . $cartItem["rowid"]); ?>':false;"><i class="fa-solid fa-trash-can"></i> Remove</a>
                                    </li>
                                </ul>
                            </div>

                            <hr>
                    <?php
                        }
                    } ?>

                    <!--<hr>-->

                    <ul class="continue d-flex list-unstyled justify-content-between">
                        <li><a href="<?= base_url(); ?>"><i class="fa fa-reply"></i> Continue Shopping</a></li>
                        <li> <a href="<?= base_url('home/emptycart'); ?>"><i class="fa-regular fa-trash-can"></i> Clear Shopping Cart</a></li>
                    </ul>

                </div>
            </div>

            <div class="col-lg-4">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-md-9 col-12">
                        <div class="shoppinginr">
                            <h4>COUPON CODE</h4>
                            <p class="low">Low prices. Big discounts. Get more for less.</p>
                            <form role="search" class="row" action="cart" method="post">
                                <div class="col-12">
                                    <input class="form-control" name="coupon_discount" type="search" placeholder="Discount Code" aria-label="Search">
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="apply b-0">APPLY</button>
                                    <!-- <a href="#" class="apply">APPLY</a> -->
                                    <a href="#" class="apply" data-bs-toggle="modal" data-bs-target="#exampleModal">Offer Section </a>
                                    <?php
                                    if (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                    }
                                    ?>
                                </div>
                            </form>

                        </div>
                    </div>

                    <div class="col-lg-12 col-md-9 col-12">
                        <div class="shoppinginra">
                            <table>
                                <tbody>
                                    <tr>
                                        <th>SUBTOTAL</th>
                                        <!-- <td><?= '₹' .  $this->cart->total(); ?></td> -->
                                        <td><?= $this->cart->total(); ?></td>
                                    </tr>

                                    <?php if (isset($coupon)) { ?>
                                        <tr>
                                            <th>DISCOUNT (<?= $coupon['name'] ?>)</th>
                                            <td>- ₹ <?php if ($coupon['type'] == 'fixed') {
                                                        $discount = $coupon['value'];
                                                        $this->session->set_userdata('discount', $discount);
                                                        echo $discount;
                                                    } else if ($coupon['type'] == 'percentage') {
                                                        $discount = $this->cart->total() * $coupon['value'] * 0.01;
                                                        if ($discount > $coupon['max_dis']) {
                                                            $discount = $coupon['max_dis'];
                                                        }
                                                        $this->session->set_userdata('discount', $discount);
                                                        echo $discount;
                                                    } else {
                                                        $this->session->set_userdata('discount', '0');
                                                        echo '0';
                                                    } ?></td>
                                        </tr>
                                    <?php } ?>
                                    
                                    <tr>
                                        <th>GST(<?=$gst?>%)</th>
                                        <td><?= ($this->cart->total()-$_SESSION['discount'])*($gst/100) ?></td>
                                    </tr>
                                    
                                    <tr>
                                        <th>GRAND TOTAL </th>
                                        <!-- <td><?= '₹' . ($this->cart->total() + $shipping_charge - $_SESSION['discount']); ?></td> -->
                                        <td><?= ($this->cart->total() - $_SESSION['discount'])*(1+($gst/100)); ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- <a href="contact.php" class="make">MAKE ENQUIRY</a> -->
                            <a href="<?= base_url('checkout') ?>" class="make">PROCEED CHECOKUT</a>

                        </div>
                    </div>

                </div>
            </div>



        </div>
</section>








<?php include('footer.php'); ?>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal-content-1">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Offer Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <table class="table table-responsive">

                    <thead>
                        <tr style="text-align:center;">
                            <th>S.NO</th>
                            <th>COUPON CODE</th>
                            <th>DISCOUNT</th>
                            <th>Minimum Order Value</th>
                            <th>ACTION</th>
                        </tr>


                    </thead>

                    <tbody>
                        <?php $i = 1;
                        foreach ($coupons as $coupon) { ?>
                            <tr style="text-align:center;">
                                <td>
                                    <?= $i; ?>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0" id="coupon-code-<?=$i;?>"><?= $coupon['name']; ?></p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">Upto
                                        <?php if ($coupon['type'] == "fixed") {
                                            echo ("₹");
                                        }
                                        echo $coupon['value'];
                                        if ($coupon['type'] == "percentage") {
                                            echo ("%");
                                        }  ?>
                                        off</p>
                                </td>
                                <td>
                                    <p class="text-xs font-weight-bold mb-0">₹<?= $coupon['min_amt']; ?></p>
                                </td>
                                <td>
                                   <i onclick="myFunction('<?= $coupon['name']; ?>')" class="fa fa-clipboard"></i>
                                </td>
                            </tr>
                        <?php
                        $i++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>

<script>
function myFunction(data) {
  // Use the Clipboard API to copy text
  navigator.clipboard.writeText(data).then(function() {
    // Alert the copied text
    alert("Copied the text: " + data);
  }).catch(function(err) {
    console.error('Could not copy text: ', err);
  });
}
</script>
