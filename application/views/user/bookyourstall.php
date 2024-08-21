<?php include('header.php'); ?>

<div class="header-bg" style="background-color: #000; padding: 44px 0;"></div>

<!-- Banners -->
<section id="blueprint">
    <div class="banner-fixed">
        <div class="container">
            <!--<h3>Sitemap Blueprint</h3>-->
            <div class="row">

            <div class="col-md-6 col-12">
                <div class="row inr">
                    
                    <div class="col-lg-12">
                     <h4>Exhibition Site Plan</h4>
                        <div class="zoom-gallery">
                            <div data-slide-id="zoom" class="zoom-gallery-slide active">
                                <a href="<?= base_url('assets/front/images/' . $exhibition->featured_image) ?>" class="MagicZoom" id="zoom-v">
                                    <img src="<?= base_url('assets/front/images/' . $exhibition->featured_image) ?>" style="height:450px; width:100%" />
                                </a>
                            </div>  
                        </div> 
                    </div>
                    
                    <div class="col-lg-12">
                      <h4 style="font-size:30px">Exhibition Location</h4>
                        <div class="map">
                         <iframe width="100%" height="450" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=<?= $exhibition->venue ?>+(<?= $exhibition->name ?>)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
                        </div>  
                    </div>
                    
                </div>
            </div> 
            
            <div class="col-lg-6">
            <h4 style="font-size:30px" class="text-center">Select Stall For <span style="color:red">Booking</span></h4>
                <form action="" method="post">
                    <?php //if($this->cart->total_items() > 0){ ?>
                    <button type="submit" name="submit" id="proceedtopayment" style="position:fixed; bottom:0px; left:0px; right:0px; padding:10px 0px; font-size:16px;display:none;" class="btn btn-danger w-20 mt-5">Proceed To Payment</button>
                    <?php //} ?>
                    <div class="content">
                        <?php $count  = 1;
                        foreach ($stalls as $stall) {
                            foreach (json_decode($stall['stalls']) as $stal) {
                                if (in_array($stal, $bookedstalls)) { ?>
                                    <div class="stall form-check " style="background:red; color:black !important;">
                                        <input disabled data-exhibition="<?= $stall['exhibition'] ?>" data-stall="<?= $stal ?>" data-price="<?= $stall['price']; ?>" data-id="<?= $stall['id']; ?>" class="stall-checkbox form-check-input" type="checkbox" id="stall-<?= ++$count; ?>">
                                        <label class="form-check-label" for="stall-<?= $count; ?>">
                                            Stall: <?= $stal; ?><br />
                                            Size:<?= $stall['size']; ?><br />
                                            Price: <?= $stall['price']; ?><br />
                                            Sold Out
                                        </label>
                                    </div>
                                <?php  } else {
                                ?>
                                    <div class="stall form-check" style="background:radial-gradient(white,<?= $stall['color'] ?>); color:black !important;">
                                        <input type="hidden" name="exhibitionid" value="<?= $exhibition->id; ?>">
                                        <input class="stall-checkbox form-check-input" name="stalls[]" type="checkbox" onclick="toggleButton()" value="<?= $stal ?>" id="stall-<?= ++$count; ?>">
                                        <label class="form-check-label" for="stall-<?= $count; ?>">

                                            Stall: <?= $stal; ?><br />
                                            Size:<?= $stall['size']; ?><br />
                                            Price: <?= $stall['price']; ?><br />
                                            <b style="color: green;">Available</b>
                                            
                                        </label>
                                    </div>
                        <?php }
                            }
                        } ?>
                    </div>
                    
                </form>
            </div>
            


            </div>
        </div>
    </div>

    <!-- <div class="dark-overlay"></div> -->
</section>
<!-- <section id="banner" class="banner-section">
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

    <div class="dark-overlay"></div>
</section> -->
<!-- /Banners -->

<!--<section id="blueprint" class="pt-0">
    <div class="container">
        <div class="row">
           
            <div class="col-12">
            <h4 class="text-center">Stall Details</h4>
                <form action="" method="post">
                    <div class="content">
                        <?php $count  = 1;
                        foreach ($stalls as $stall) {
                            foreach (json_decode($stall['stalls']) as $stal) {
                                if (in_array($stal, $bookedstalls)) { ?>
                                    <div class="stall form-check" style="background:red; color:black !important;">
                                        <input disabled data-exhibition="<?= $stall['exhibition'] ?>" data-stall="<?= $stal ?>" data-price="<?= $stall['price']; ?>" data-id="<?= $stall['id']; ?>" class="stall-checkbox form-check-input" type="checkbox" id="stall-<?= ++$count; ?>">
                                        <label class="form-check-label" for="stall-<?= $count; ?>">
                                            Stall: <?= $stal; ?><br />
                                            Size:<?= $stall['size']; ?><br />
                                            Price: <?= $stall['price']; ?><br />
                                            Sold Out
                                        </label>
                                    </div>
                                <?php  } else {
                                ?>
                                    <div class="stall form-check" style="background:radial-gradient(white,<?= $stall['color'] ?>); color:black !important;">
                                        <input type="hidden" name="exhibitionid" value="<?= $exhibition->id; ?>">
                                        <input class="stall-checkbox form-check-input" name="stalls[]" type="checkbox" value="<?= $stal ?>" id="stall-<?= ++$count; ?>">
                                        <label class="form-check-label" for="stall-<?= $count; ?>">

                                            Stall: <?= $stal; ?><br />
                                            Size:<?= $stall['size']; ?><br />
                                            Price: <?= $stall['price']; ?><br />
                                            <b style="color: green;">Available</b>
                                            
                                        </label>
                                    </div>
                        <?php }
                            }
                        } ?>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary w-20 mt-5">Proceed To Payment Page</button>
                </form>
            </div>
        </div>
    </div>
</section>-->

<!-- <section id="blueprint">
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
                                    <input disabled data-exhibition="<?= $stall['exhibition'] ?>" data-stall="<?= $stal ?>"  data-price="<?= $stall['price']; ?>" data-id="<?= $stall['id']; ?>" class="stall-checkbox form-check-input" type="checkbox" id="stall-<?= ++$count; ?>">
                                    <label class="form-check-label" for="stall-<?= $count; ?>">
                                        Stall: <?= $stal; ?><br />
                                        Size:<?= $stall['size']; ?><br />
                                        Price: <?= $stall['price']; ?><br />
                                    </label>
                                </div>
                            <?php  } else {
                            ?>
                                <div class="stall form-check" style="background:radial-gradient(white,<?= $stall['color'] ?>); color:black;">
                                    <input data-exhibition="<?= $stall['exhibition'] ?>" <?php foreach ($cartItems as $cartItem) {
                                                                                                if ($cartItem['exhibitionId'] == $exhibition->id && $cartItem['id'] ==  $exhibition->id . "-" . $stal) {
                                                                                                    echo "checked";
                                                                                                } else {
                                                                                                    echo "";
                                                                                                }
                                                                                            }  ?> data-stall="<?= $stal ?>" data-price="<?= $stall['price']; ?>" data-id="<?= $stall['id']; ?>" class="stall-checkbox form-check-input" type="checkbox" id="stall-<?= ++$count; ?>">
                                    <label class="form-check-label" for="stall-<?= $count; ?>">

                                        Stall: <?= $stal; ?><br />
                                        Size:<?= $stall['size']; ?><br />
                                        Price: <?= $stall['price']; ?><br />
                                    </label>
                                </div>
                    <?php }
                        }
                    } ?>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row justify-content-center">
                <?= "<pre>"; ?>
                            <?= print_r($this->cart->contents()); ?>


                    <div class="col-lg-12 col-md-9 col-12">
                        <div class="shoppinginra">
                            <a href="<?= base_url('cart') ?>" class="make">PROCEED CHECOKUT</a>
                            <a href="<?= base_url('cart') ?>" class="make">Add To Cart</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section> -->


<?php include('footer.php'); ?>

<script>
function toggleButton() {
    const checkboxes = document.querySelectorAll('input[name="stalls[]"]');
    const button = document.getElementById('proceedtopayment');
    
    let checked = false;
    checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
            checked = true;
        }
    });

    button.style.display = checked ? 'block' : 'none';
}
</script>

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
                            exhibition_id: exhibitionId,
                            price: price
                        },
                        cache: false,
                        success: function(dataResult) {
                            const response = JSON.parse(dataResult);
                            if (response.available) {
                                // If available, update the total amount
                                if (checkbox.is(':checked')) {
                                    // totalAmount += price;
                                    // console.log(stallNumber);
                                    // console.log(exhibitionId);
                                    // console.log(response);
                                } else {
                                    // totalAmount -= price;
                                }
                                // $('#total-amount').text(totalAmount.toFixed(2));
                                // var hiddenField = document.getElementById('hiddenField');

                                // Set its value
                                // hiddenField.value = totalAmount;
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
                    // console.error('Invalid price:', $(this).data('price'));
                }
            });
        };
    });
</script>
<!-- <script>
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
                            exhibition_id: exhibitionId,
                            price: price
                        },
                        cache: false,
                        success: function(dataResult) {
                            const response = JSON.parse(dataResult);
                            if (response.available) {
                                // If available, update the total amount
                                if (checkbox.is(':checked')) {
                                    totalAmount += price;
                                    console.log(stallNumber);
                                    console.log(exhibitionId);
                                    console.log(response);
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
</script> -->


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

<script>
$(document).ready(function(){
  $("div").click(function(){
    $(".form-check").addClass("intro");
  });
});
</script>

<script>
$(document).ready(function(){
  $("div").click(function(){
    $(".form-check").removeClass("intro");
  });
});
</script>

<script>
    $('.form-check-label').on('click', function() {
        $(this).closest('.stall').toggleClass('active');
        // $('#proceedtopayment').removeClass('disabled');
    });
</script>