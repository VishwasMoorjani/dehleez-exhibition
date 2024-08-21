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



<!-- orderlist start-->
<section class="orderlist">
    <div class="container">
        <p class="account__welcome--text">Hello, Vishwas Moorjani welcome to your dashboard!</p>
        <div class="row">

            <div class="col-md-3">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title h3 mb-20">My Profile</h2>
                    <ul class="account__menu list-unstyled">
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
                <div class="account__wrapper">
                    <div class="account__content">
                        <h2 class="account__content--title h3 mb-20">Orders History</h2>
                        <div class="account__table--area">
                            <div class="aiz-user-panel">
                                <div class="aiz-titlebar mt-2 mb-4 noPrint">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                            <span class="h3">Order ID: order_L6Ke9qIZdXkJxU</span>
                                            <a href="javascript:window.print()" style="float: right;"><i
                                                    class="fa fa-print" aria-hidden="true"></i></a>

                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-1 Print" style="padding:0px">
                                    <div class="card-body">
                                        <table class="table-borderless table" style="margin-bottom: 0rem;">
                                            <td>
                                                <img src="assets/front/images/logo.png" width="30%"><br />
                                                Order ID: order_L6Ke9qIZdXkJxU<br />
                                                Order date: 2023-01-20 11:56:17<br />
                                                GST No: 08AUUPS4089H1ZP
                                            </td>
                                            <td>
                                                <h5 class="h5 mb-0">kuldeep Handicraft</h5>
                                                <p style="font-size:13px; font-weight: 300; margin-bottom:0px">
                                                    sales@bindalgems.com</p>
                                                <p style="font-size:13px; font-weight: 300; margin-bottom:0px">
                                                    +91-9352462524</p>
                                                <p style="font-size:13px; font-weight: 300; margin-bottom:0px">5177 ,
                                                    Regron Ki Kothi Ka Rasta
                                                    Nawab ka Choraha , Ghatgate Bazar
                                                    Jaipur-302003 Rajasthan India</p>
                                            </td>
                                        </table>
                                    </div>
                                </div>
                                <div class="card mb-1" style="padding:0px">
                                    <div class="card-header">
                                        <table class="table-borderless table noPrint" style="margin-bottom: 0rem;">
                                            <td>
                                                <h5 class="h6 mb-0">Order Id: order_L6Ke9qIZdXkJxU</h5>
                                            </td>
                                            <td>
                                                <h5 class="h6 mb-0">Order date: 2023-01-20 11:56:17</h5>
                                            </td>
                                        </table>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="table-responsive">
                                                    <table class="table-borderless table">
                                                        <tbody class="address">
                                                            <td>
                                                                <h4>Bill To:</h4>
                                                                <p
                                                                    style="columns: 1; font-size:13px; color:#7b809a; line-height: 1.625; font-weight: 400;">
                                                                    <strong>FIRSTNAME</strong> :
                                                                    Vishwas<br /><strong>LASTNAME</strong> :
                                                                    Test<br /><strong>FULLADDRESS</strong> : 5177 ,
                                                                    Regron Ki Kothi Ka Rasta
                                                                    Nawab ka Choraha , Ghatgate Bazar
                                                                    Jaipur-302003 Rajasthan India

                                                                    <br /><strong>EMAIL</strong> :
                                                                    vishwasmoorjani02@gmail.com<br /><strong>PHONENO</strong>
                                                                    : 9982899977<br /><strong>CITY</strong> :
                                                                    21<br /><strong>POSTALCODE</strong> : 302033<br />
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <h4>Ship To:</h4>
                                                                <p
                                                                    style="columns: 1; font-size:13px; color:#7b809a; line-height: 1.625; font-weight: 400;">
                                                                    <strong>FIRSTNAME</strong> :
                                                                    Vishwas<br /><strong>LASTNAME</strong> :
                                                                    Test<br /><strong>FULLADDRESS</strong> :1041 , 2 nd
                                                                    Floor , Sitaram Ji Ki Gali
                                                                    Jadiyon Ka Rasta , Johri Bazarr
                                                                    Jaipur-302003 Rajasthan India

                                                                    <br /><strong>EMAIL</strong> :
                                                                    vishwasmoorjani02@gmail.com<br /><strong>PHONENO</strong>
                                                                    : 9982899977<br /><strong>CITY</strong> :
                                                                    21<br /><strong>POSTALCODE</strong> : 302033<br />
                                                                </p>
                                                            </td>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-1 noPrint" style="padding:0px">
                                    <div class="card-header">
                                        <h5 class="h6 mb-0">Special Note</h5>
                                    </div>
                                    <div class="card-body">
                                        <p style="font-size:13px; font-weight: 300;" class="m-2"> </p>
                                    </div>
                                </div>
                                <div class="card mb-1 noPrint" style="padding:0px">
                                    <div class="card-header">
                                        <h5 class="h6 mb-0">Payment Method</h5>
                                    </div>
                                    <div class="card-body">
                                        <span style="font-size:20px; font-weight:600;">Cash on Delivery</span>
                                    </div>
                                </div>
                                <div class="card mb-1 noPrint" style="padding:0px">
                                    <div class="card-header">
                                        <h5 class="h6 mb-0">Tracking Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <span style="font-size:20px; font-weight:600;">Tracking Id :</span><span
                                            style="font-size:13px; font-weight: 300;" class="m-2"></span><br />
                                        <span style="font-size:20px; font-weight:600;">Tracking URL :</span><span
                                            style="font-size:13px; font-weight: 300;" class="m-2"><a href=""></a></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card" style="padding:0px">
                                            <div class="card-header">
                                                <h5 class="h6 mb-0">Order Details</h5>
                                            </div>
                                            <div class="card-body" style="overflow: auto;">
                                                <table class="aiz-table table footable footable-1 breakpoint-xl">
                                                    <thead>
                                                        <tr class="footable-header">
                                                            <th class="footable-first-visible"
                                                                style="display: table-cell;">
                                                                #</th>
                                                            <th class="noPrint" style="display: table-cell;">Product
                                                                Image
                                                            </th>
                                                            <th style="display: table-cell;">Product Name</th>
                                                            <th style="display: table-cell;">Quantity</th>
                                                            <th style="display: table-cell;">Price</th>
                                                            <th style="display: table-cell;">GST</th>
                                                            <th style="display: table-cell;">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="footable-first-visible"
                                                                style="display: table-cell;">
                                                                1</td>
                                                            <td class="noPrint" style="display: table-cell;">
                                                                <img src="assets/front/images/category1.jpg"
                                                                    width=150px />
                                                            </td>
                                                            <td>
                                                                925 STERLING SILVER FINE BANGLE <br />
                                                                AJ-11680<br />
                                                                Size: XL<br />
                                                            </td>
                                                            <td style="display: table-cell;">
                                                                1 </td>
                                                            <td style="display: table-cell;">
                                                                ₹ 983.18 </td>
                                                            <td style="display: table-cell;">
                                                                ₹ 215.82 </td>
                                                            <td style="display: table-cell;">
                                                                ₹ 1199 </td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <b class="fs-15">Order Amount</b>
                                            </div>
                                            <div class="card-body pb-0">
                                                <table class="table-borderless table">
                                                    <tbody>
                                                        <tr>
                                                            <td class="w-50 fw-600">Subtotal</td>
                                                            <td class="text-right">
                                                                <span class="strong-600">₹ 983.18</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">GST</td>
                                                            <td class="text-right">
                                                                <span class="text-italic">₹ 215.82</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">Shipping</td>
                                                            <td class="text-right">
                                                                <span class="text-italic">₹ 100</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">Discount</td>
                                                            <td class="text-right">
                                                                <span class="text-italic">
                                                                    ₹ 0</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="w-50 fw-600">Total</td>
                                                            <td class="text-right">
                                                                <strong><span>₹ 1299</span></strong>
                                                            </td>

                                                        </tr>
                                                        <tr class="Print">
                                                            <td class="w-50 fw-600"> </td>
                                                            <td class="text-right">
                                                                <strong><span> One thousand two hundred
                                                                        ninety-nine</span></strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

    </div>
</section>



<?php include('footer.php'); ?>