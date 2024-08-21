<?php include('header.php'); ?>


<!-- heading -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">Checkout</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>



<!-- checkout -->
<section id="checkout">
    <div class="container">
        <div class="row">

            <div class="col-md-5">
                <div class="checoctinra">
                    <h4>REVIEW YOUR ORDER</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th>Stalls</th>
                                    <th>QTY</th>
                                    <th>AMOUNT</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($cartItems as $cartItem) { ?>
                                    <tr>
                                        <td><span class="moon"><?= $cartItem['name'] ?></span>
                                        </td>
                                        <td>
                                            <span class="qty">QTY: <?= $cartItem['qty'] ?></span>
                                        </td>
                                        <td><?= $cartItem['price'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <div class="col-md-7">
                <div class="checoctinr">
                    <h4>Payment Method</h4>
                    <div class="table-responsive">
                        <table class="table ">
                            <thead class="table-light">
                                <tr>
                                    <th class="wiiii">SUBTOTAL</th>
                                    <td><?= $this->cart->total(); ?></td>
                                </tr>

                                <tr>
                                    <th class="wiiii">DISCOUNT</th>
                                    <!-- <td>₹<?= $_SESSION['discount']; ?></td> -->
                                    <td><?= $_SESSION['discount']; ?></td>
                                </tr>
                                
                                <tr>
                                    <th class="wiiii">GST(<?=$gst?>%)</th>
                                    <td><?= ($this->cart->total()-$_SESSION['discount'])*($this->Global['gst']/100); ?></td>
                                </tr>

                                <tr>
                                    <th class="wiiii">GRAND TOTAL</th>
                                    <!-- <td>₹<?= $_SESSION['totalAmount'] ?></td> -->
                                    <td><?= $_SESSION['totalAmount']; ?></td>
                                </tr>
                                
                                    <?php //if ($wallet[0]['wallet'] < $_SESSION['totalAmount']) { ?>
                                    
                                    <form action="<?= base_url('user/paywithwallet') ?>" method="post">
                                        <?php if ($wallet[0]['wallet'] != 0) { ?>
                                            <tr>
                                                <th>Wallet Balance</th>
                                                <th><input type="checkbox" name="usewallet" id="usewallet"> <label for="usewallet">₹ <?= $wallet[0]['wallet'] ?></label></th>
                                            </tr>
                                        <?php } ?>
                                        
                                        <tr>
                                            <th>GRAND TOTAL</th>
                                            <th id="grandtotal">₹<?= $_SESSION['totalAmount'] ?></th>
                                        </tr>
                                        
                                        <tr>
                                            <th></th>
                                            
                                            <th><button type="submit" class=" btn btn-danger">PAY NOW</button></th>
                                        </tr>
                                        <!--<form action="<?= base_url('user/addmonettowallet') ?>" method="post">-->
                                        <!--    <th>-->
                                        <!--        <div class="col-md-12">-->
                                        <!--            <input type="number" name="wallet" class="form-control" placeholder="Enter Amount" required>-->
                                        <!--        </div>-->
                                                
                                        <!--    </th>-->
                                            <!-- <th><a href="<?= base_url('user/addmonettowallet') ?>" class="btn pay">ADD MONEY TO WALLET</a></th> -->
                                        <!--    <th><button name="addmoney" class="btn pay">ADD MONEY TO WALLET</button></th>-->
                                        <!--</form>-->
                                    </form>
                                    <?php //} else { ?>
                                        <!--<th><a href="<?=base_url('user/paywithwallet')?>" class="pay">PAY NOW WITH WALLET</a></th>-->
                                        <!--<th><a href="#" class="pay">PAY NOW </a></th>-->
                                    <?php //} ?>
                                
                            </thead>
                        </table>
                    </div>






                </div>
            </div>

        </div>
    </div>
</section>


<!-- billing -->

<!-- <section id="billing">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <div class="checoctinr">
                    <h3>BILLING DETAILS</h3>


                    <form class="from row g-3 needs-validation" novalidate>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Same as Shipping address
                            </label>
                        </div>



                        <div class="col-md-6">
                            <label for="validationCustom01" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Full Name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom04" class="form-label">Country</label>
                            <select class="form-select" id="validationCustom04" required>
                                <option selected disabled value="">Select Country</option>
                                <option>Albania</option>
                                <option>Albania</option>
                                <option>Albania</option>
                                <option>Albania</option>
                                <option>Albania</option>
                                <option>Albania</option>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="validationCustom03" class="form-label">Address</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="Address" required>
                        </div>


                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                        </div>


                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">State</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="State" required>
                        </div>
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">Mobile</label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Mobile" required>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom05" class="form-label">Email</label>
                            <input type="email" class="form-control" id="validationCustom05" placeholder="Email" required>
                        </div>

                        <button class="btn btn6" type="submit">Save Billing Address</button>


                    </form>


                </div>
            </div>
        </div>

    </div>
</section> -->





<?php include('footer.php'); ?>

<?php if(isset($razorpay)){?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  var options = {
    "key": "<?= RAZOR_KEY_ID ?>", // Enter the Key ID generated from the Dashboard
    "amount": <?= $order['amount'] ?>, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "<?=sitename?>",
    "description": "",
    "image": "<?= base_url('assets/front/images/logo.webp') ?>",
    "order_id": "<?= $order['id'] ?>", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "callback_url": "<?= base_url('user/paymentStatus'); ?>",
    "prefill": {
      "name": "<?= $order['name'] ?>",
      "email": "<?= $order['email'] ?>",
      "contact": "<?= $order['phoneno'] ?>"
    },
    "notes": {},
    "theme": {
      "color": "#000"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
</script>
<?php } ?>

<script>

$(document).ready(function() {
    $('#usewallet').change(function() {
        if (this.checked) {
            
            var totalAmount = <?= $_SESSION['totalAmount'] ?>;
            var walletBalance = <?= $wallet[0]['wallet'] ?>;
            var grandTotal = totalAmount.toFixed(2) - walletBalance.toFixed(2);
            
            if (grandTotal < 0) {
                grandTotal = 0;
            }
            
            document.getElementById('grandtotal').innerHTML = '₹' + grandTotal.toFixed(2);
            // document.getElementById('grandtotal').innerHTML = '₹' + (<?= $_SESSION['totalAmount'] ?> - <?= $wallet[0]['wallet'] ?>);
        }
        else{
            document.getElementById('grandtotal').innerHTML = '₹'+(<?=$_SESSION['totalAmount'] ?>).toFixed(2);
        }
    });
});
</script>