<?php include('header.php'); ?>


<!-- heading -->
<section id="heading">
    <div class="container">
        <h2>Cart</h2>
        <p><a href="<?= base_url(); ?>"><i class="fa-solid fa-house"></i> Home</a> <i class="fa-solid fa-angles-right"></i> Cart
        </p>
    </div>
</section>



<!-- cart -->

<section id="cart">
    <div class="container">
        <h3>Cart</h3>
        <div class="row rowmn">

            <div class="col-lg-8">
                <div class="row cartrow">
                <?php
                $shipping_charge = 0;
                if ($this->cart->total_items() > 0) {
                foreach ($cartItems as $cartItem) {
                    $shipping_charge = $shipping_charge + ($cartItem["shipping_charge"] +($cartItem["shipping_charge"]* ($cartItem["qty"]-1)*0.3));
                ?>
                        <div class="col-md-9">
                            <ul class="list-unstyled d-flex gap-3">
                                <li><a href="<?=base_url('product/'.$cartItem['link'])?>"><img src="<?= base_url("assets/front/images/".$cartItem['image']); ?>" width="140" alt=""></a></li>
                                <li>
                                    <h6><a href="<?=base_url('product/'.$cartItem['link'])?>"><?=$cartItem['name']?></a></h6>
                                    <p>Size : <?=$cartItem['options']['size']?></p>
                                    <p>Quantity : <?=$cartItem['qty']?></p>
                                    <p>Price : <?=$_SESSION['currency']['symbol'].' '.$cartItem['price']*$cartItem['qty']* $_SESSION['currency']['price']?></p>
                                    <a onclick="return confirm('Are you sure to delete item?')?window.location.href='<?= base_url('home/removeItem/' . $cartItem["rowid"]); ?>':false;"><i class="fa-solid fa-trash-can"></i> Remove</a> &nbsp; | &nbsp; <a href="#"><i class="fa-regular fa-heart"></i> Move to wish list</a>
                                </li>
                            </ul>
                        </div>

                        <hr>
                    <?php }
                    $_SESSION['shipping_charge'] = $shipping_charge;
                } ?>
                    <!-- <div class="col-md-3">
                        <div class="price">
                            <div class="qty-input">
                                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                <input class="product-qty" type="number" name="product-qty" min="0" max="100" value="1">
                                <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                            </div>
                            <p><span>₹1299</span> ₹1099</p>
                            <article>You save 15%</article>
                        </div>
                    </div>                 -->

                    <!-- <div class="col-md-3">
                        <div class="price">
                            <div class="qty-input">
                                <button class="qty-count qty-count--minus" data-action="minus" type="button">-</button>
                                <input class="product-qty" type="number" name="product-qty" min="0" max="100" value="1">
                                <button class="qty-count qty-count--add" data-action="add" type="button">+</button>
                            </div>
                            <p><span>₹1299</span> ₹1099</p>
                            <article>You save 15%</article>
                        </div>
                    </div> -->

                    <hr>

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
                                        <td><?= $_SESSION['currency']['symbol'] . " " . $this->cart->total() * $_SESSION['currency']['price'] . "    "; ?></td>
                                    </tr>

                                    <tr>
                                        <th>SHIPPING</th>
                                        <!-- <td><?= '₹' .  $shipping_charge; ?></td> -->
                                        <td><?= $_SESSION['currency']['symbol'] . " " . $shipping_charge * $_SESSION['currency']['price'] . "    "; ?></td>
                                    </tr>
                                    <?php if (isset($coupon)) { ?>
                                    <tr>
                                        <th>DISCOUNT (<?=$coupon['name']?>)</th>
                                        <td>- ₹ <?php if ($coupon['type'] == 'fixed') {
                                    $discount = $coupon['value'];
                                    $this->session->set_userdata('discount', $discount);
                                    echo $_SESSION['currency']['symbol'].' '.$discount* $_SESSION['currency']['price'];
                                    } else if ($coupon['type'] == 'percentage') {
                                        $discount = ($this->cart->total() + $shipping_charge) * $coupon['value'] * 0.01;
                                        if ($discount > $coupon['max_dis']) {
                                        $discount = $coupon['max_dis'];
                                        }
                                        $this->session->set_userdata('discount', $discount);
                                        echo $_SESSION['currency']['symbol'].' '.$discount* $_SESSION['currency']['price'];
                                    } else {
                                        $this->session->set_userdata('discount', '0');
                                        echo '0';
                                    } ?></td>
                                    </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>GRAND TOTAL </th>
                                        <!-- <td><?= '₹' . ($this->cart->total() + $shipping_charge - $_SESSION['discount']); ?></td> -->
                                        <td><?= $_SESSION['currency']['symbol']." ".($this->cart->total() + $shipping_charge - $_SESSION['discount']) * $_SESSION['currency']['price']; ?></td>
                                    </tr>
                                </tbody>
                            </table>

                            <a href="contact.php" class="make">MAKE ENQUIRY</a>
                            <a href="<?=base_url('checkout')?>" class="make">PROCEED CHECOKUT</a>

                        </div>
                    </div>

                </div>
            </div>

        </div>
</section>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Offer Section</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <table class="table">

                    <thead>
                        <tr style="text-align:center;">
                            <th>S.NO</th>
                            <th>COUPON CODE</th>
                            <th>DISCOUNT</th>
                            <th>DISCOUNT</th>
                            <th>DISCOUNT</th>
                        </tr>


                    </thead>

                    <tbody>
                    <?php $i = 1;
                            foreach ($coupons as $coupon) { ?>
                        <tr style="text-align:center;">
                            <td>
                                <?= $i++ ?>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0"><?= $coupon['name']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">Upto
                                    <?php if ($coupon['type'] == "fixed") { echo ("₹"); } echo $coupon['value']; if ($coupon['type'] == "percentage") { echo ("%");}  ?>
                                    off</p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">₹<?= $coupon['min_amt']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">₹<?= $coupon['min_amt']; ?></p>
                            </td>
                            <td>
                                <p class="text-xs font-weight-bold mb-0">₹598849</p>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include('footer.php'); ?>