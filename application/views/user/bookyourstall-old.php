<?php include('header.php'); ?>





<!-- Banners -->
<section id="banner" class="banner-section">
    <!-- Banner Tagline -->
    <div class="banner-fixed">
        <div class="container">
            <div style="background: url(<?= base_url('assets/front/images/' . $exhibition->image) ?>) repeat 0 0;" class="banner-content">
                <div class="content">
                    <div class="banner-tagline text-center">
                        <h1><?= $exhibition->name ?></h1>
                        <ul class="gt-information">
                            <li><i class="fa fa-clock-o"></i><span><?= $exhibition->start_date ?></span> </li>
                            <li><i class="fa fa-map-marker"></i><span><?= $exhibition->venue ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Banners Tagline -->



    <div class="dark-overlay"></div>
</section>
<!-- /Banners -->

<section id="blueprint">
    <div class="container">
        <div class="row">

            <div class="col-12">
                <div class="img">
                    <img src="<?= base_url('assets/front/images/' . $exhibition->featured_image) ?>" alt="">
                </div>
            </div>

            <div class="col-12">
                <div class="content">
                    <input type="hidden" id="exhibition-id" value="<?= $exhibition->id; ?>">
                    <?php $count  = 1;
                    foreach ($stalls as $stall) {
                        foreach (json_decode($stall['stalls']) as $stal) {

                            if (in_array($stal, $bookedstalls)) { ?>
                                <div class="stall form-check" style="background:grey; color:black;">
                                    <input style="" disabled data-exhibition="<?= $stall['exhibition'] ?>" data-stall="<?= $stal ?>" data-price="<?= $stall['price']; ?>" data-id="<?= $stall['id']; ?>" class="stall-checkbox form-check-input" type="checkbox" id="stall-<?= ++$count; ?>">
                                    <label class="form-check-label" for="stall-<?= $count; ?>">
                                        Stall: <?= $stal; ?><br />
                                        Size:<?= $stall['size']; ?><br />
                                        Price: <?= $stall['price']; ?><br />
                                    </label>

                                </div>
                            <?php  } else { ?>

                                <div class="stall form-check" style="background:radial-gradient(white,<?= $stall['color'] ?>); color:black;">
                                    <input data-exhibition="<?= $stall['exhibition'] ?>" data-stall="<?= $stal ?>" data-price="<?= $stall['price']; ?>" data-id="<?= $stall['id']; ?>" class="stall-checkbox form-check-input" type="checkbox" id="stall-<?= ++$count; ?>">
                                    <label class="form-check-label" for="stall-<?= $count; ?>">

                                        Stall: <?= $stal; ?><br />
                                        Size:<?= $stall['size']; ?><br />
                                        Price: <?= $stall['price']; ?><br />
                                    </label>

                                </div>
                    <?php }
                        }
                    } ?>

                    <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                        <label class="form-check-label" for="flexCheckChecked">
                            Checked checkbox
                        </label>
                    </div> -->

                </div>
            </div>

            <div class="col-lg-4">
                <div class="row justify-content-center">

                    <div class="col-lg-12 col-md-9 col-12">
                        <div class="shoppinginr">
                            <h4>COUPON CODE</h4>
                            <p class="low">Low prices. Big discounts. Get more for less.</p>
                            <form role="search" class="row" action="" method="post">
                                <div class="col-12">
                                    <input type="hidden" name="hiddenField" id="hiddenField">
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
                                        <td id="total-amount"></td>
                                        <td id="total-amount"><?php if (isset($coupon)) { echo ($total); } ?></td>
                                        <!-- <td><?= $_SESSION['currency']['symbol'] . " " . $this->cart->total() * $_SESSION['currency']['price'] . "    "; ?></td> -->
                                    </tr>


                                    <?php if (isset($coupon)) { ?>
                                        <tr>
                                            <!-- <th>hello</th> -->
                                            <th>DISCOUNT (<?= $coupon['name'] ?>)</th>
                                            <td>- ₹ <?php
                                                        if ($coupon['type'] == 'fixed') {
                                                    $discount = $coupon['value'];
                                                    $this->session->set_userdata('discount', $discount);
                                                    echo $discount;
                                                    } else if ($coupon['type'] == 'percentage') {
                                                        $discount = ($total) * $coupon['value'] * 0.01;
                                                        if ($discount > $coupon['max_dis']) {
                                                        $discount = $coupon['max_dis'];
                                                        }
                                                        $this->session->set_userdata('discount', $discount);
                                                        echo $discount;
                                                    } else {
                                                        $this->session->set_userdata('discount', '0');
                                                        echo '0';
                                                    } 
                                                    ?></td>
                                        </tr>
                                    <?php } ?>
                                    <tr>
                                        <th>GRAND TOTAL </th>
                                        <!-- <td>
                                            <div class="total-amount">
                                                <h2>Total Amount: $<span id="total-amount">0</span></h2>
                                            </div>
                                        </td> -->
                                        <td><?php if (isset($coupon)) { echo ($total - $_SESSION['discount']); } ?></td>
                                        <!-- <td><?php // $_SESSION['currency']['symbol'] . " " . ($this->cart->total() + $shipping_charge - $_SESSION['discount']) * $_SESSION['currency']['price'] . "    "; 
                                            ?></td> -->
                                    </tr>
                                </tbody>
                            </table>

                            <button id="pay-button" class="btn btn-primary">Pay Now</button>
                            <a href="contact.php" class="make">MAKE ENQUIRY</a>
                            <a href="<?= base_url('checkout') ?>" class="make">PROCEED CHECOKUT</a>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</section>


<?php include('footer.php'); ?>

<!-- <script>
    let totalAmount = 0;

    document.addEventListener('DOMContentLoaded', function() {
        const stalls = document.querySelectorAll('.stall');
        stalls.forEach(stall => {
            stall.addEventListener('click', function() {
                const price = parseFloat(this.getAttribute('data-price'));
                totalAmount += price;
                document.getElementById('total-amount').innerText = totalAmount.toFixed(2);
            });
        });
    });
</script> -->

<!-- <script>
    let totalAmount = 0;

    function bookStall(stallId, price) {
        totalAmount += price;
        document.getElementById('total-amount').innerText = totalAmount;

        // Submit the booking form
        document.getElementById('stall-id').value = stallId;
        document.getElementById('booking-form').action = '<?= site_url('stalls/book'); ?>/' + stallId;
        document.getElementById('booking-form').submit();
    }
</script> -->


<script>
    let totalAmount = 0;

    $(document).ready(function() {

        window.onload = function() {
            // Enable checkboxes after the page has fully loaded
            $('.stall-checkbox').prop('disabled', false);
            const checkboxes = $('.stall-checkbox');
            const exhibitionId = $('#exhibition-id').val();

            checkboxes.on('change', function() {
                const price = parseFloat($(this).data('price'));
                const stallNumber = $(this).data('stall');
                const checkbox = $(this);

                if (!isNaN(price)) {
                    // Check if the stall is already booked
                    $.ajax({
                        url: "<?= base_url('user/check_stall_availability'); ?>",
                        type: "POST",
                        data: {
                            stall_number: stallNumber,
                            exhibition_id: exhibitionId
                        },
                        cache: false,
                        success: function(dataResult) {
                            const response = JSON.parse(dataResult);
                            if (response.available) {
                                // If available, update the total amount
                                if (checkbox.is(':checked')) {
                                    totalAmount += price;
                                } else {
                                    totalAmount -= price;
                                }
                                $('#total-amount').text(totalAmount.toFixed(2));
                                var hiddenField = document.getElementById('hiddenField');

                                // Set its value
                                hiddenField.value = totalAmount;
                            } else {
                                // If not available, show alert and uncheck the box
                                alert('This stall is already booked.');
                                checkbox.prop('checked', false);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Error checking availability:', error);
                        }
                    });
                } else {
                    console.error('Invalid price:', $(this).data('price'));
                }
            });
        };
    });
</script>


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
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>




            </div>
        </div>
    </div>
</div>





<script>
    var endDate = "<?php echo date("F d, Y", strtotime($exhibition->start_date)); ?>";
    console.log(endDate);
    $('.countdown.styled').countdown({
        date: endDate,
        render: function(data) {
            $(this.el).html("<div class='countdown-amount'>" + this.leadingZeros(data.days, 2) + " <span class='countdown-period'>Days</span></div><div class='countdown-amount'>" + this.leadingZeros(data.hours, 2) + " <span class='countdown-period'>Hours</span></div><div class='countdown-amount'>" + this.leadingZeros(data.min, 2) + " <span class='countdown-period'>Minutes</span></div><div class='countdown-amount'>" + this.leadingZeros(data.sec, 2) + " <span class='countdown-period'>Seconds</span></div>");
        }
    });
</script>