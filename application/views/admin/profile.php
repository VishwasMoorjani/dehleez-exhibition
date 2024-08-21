<?php include("head.php"); ?>
<?php include("header.php"); ?>

<body class="g-sidenav-show bg-gray-200">

    <div class="main-content position-relative max-height-vh-100 h-100">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-1 px-3">
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">

            <div class="card card-body mx-3 mx-md-4 ">
                <div class="row gx-4 mb-2">

                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                <?=$users['firstname'].' '.$users['lastname']?>
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                <!--CEO / Co-Founder-->
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                        <div class="nav-wrapper position-relative end-0">
                            <ul class="nav nav-pills nav-fill p-1" role="tablist">


                                <li class="nav-item">
                                    <a class="nav-link mb-0 px-0 py-1 " data-bs-toggle="tab"
                                        href="<?=base_url('admin/bookstallsforuser/'.$users['id']);?>" role="tab"
                                        aria-selected="false">
                                        <i class="material-icons text-lg position-relative">booking</i>
                                        <span class="ms-1">Book Stall Now</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="row">

                        <div class="col-12 col-xl-12">
                            <div class="card card-plain h-100">

                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Mobile:</strong> &nbsp; <?=$users['phone'];?></li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Email:</strong> &nbsp; <?=$users['email'];?></li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Wallet
                                            Balance :</strong> &nbsp; <?=$users['wallet'];?></li>


                                    <form class="row inr my-3" action="<?=base_url('admin/editwallet');?>"
                                        method="post">

                                        <div class="col-md-4">
                                            <input type="hidden" name="id" value="<?=$users['id'];?>" />
                                            <input class="form-control border px-3" name="wallet" type="number"
                                                step="0.01" placeholder="Enter amount to be debited  *" required />
                                        </div>

                                        <div class="col-md-4">
                                            <input class="form-control border px-3" name="remark" type="text"
                                                placeholder="Enter remark*" required />
                                        </div>

                                        <div class="col-md-4">
                                            <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                                                type="submit" name="debit">Debit </button>
                                        </div>

                                    </form>


                                    <form class="row inr" action="<?=base_url('admin/editwallet');?>" method="post">

                                        <div class="col-md-4">
                                            <input type="hidden" name="id" value="<?=$users['id'];?>" />
                                            <input class="form-control border px-3" name="wallet" type="number"
                                                step="0.01" placeholder="Enter amount to be credited *" required />
                                        </div>

                                        <div class="col-md-4">
                                            <input class="form-control border px-3" name="remark" type="text"
                                                placeholder="Enter remark*" required />
                                        </div>

                                        <div class="col-md-4">
                                            <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                                                type="submit" name="credit">Credit </button>
                                        </div>

                                    </form>

                                </ul>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h5 class="mb-0">Order History</h5>
                            </div>
                            <div class="ms-auto my-auto mt-lg-0 mt-4">
                                <div class="ms-auto my-auto">
                                    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1"
                                        data-type="csv" type="button" name="button">Export</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive">
                            <table class="table table-flush" id="contacts-list">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Id</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Stall Number</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Exhibition Name</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Price</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Booking Date</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                $count = 1;
                foreach ($orders as $contact) { ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $count++; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $contact['stall_number']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php foreach ($exhibitions as $exhibition) {
                                    if ($contact['exhibition_id'] == $exhibition['id']) {
                                    echo $exhibition['name'];
                                    }
                                } 
                            ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $contact['price']; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $contact['booking_date']; ?>
                                            </p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">
                                                <?php
                                $today = date('Y-m-d');
                                foreach ($exhibitions as $exhibition) {
                                  if ($contact['exhibition_id'] == $exhibition['id']) {
                                    if($exhibition['start_date'] > $today ){ echo "upcoming"; }
                                    elseif($exhibition['start_date'] < $today && $exhibition['end_date'] > $today){ echo "Ongoing"; }
                                    elseif($exhibition['end_date'] < $today){ echo "Completed"; } 
                                  }
                                }
                            ?>
                                            </p>
                                        </td>
                                        <td>
                                            <?php 
                        $today = date('Y-m-d');
                            foreach ($exhibitions as $exhibition) {
                                if ($contact['exhibition_id'] == $exhibition['id']) {
                                    if($exhibition['start_date'] > $today ){ ?>
                                            <a onclick="return confirm('Are you sure to delete item?')?window.location.href='<?= base_url('admin/cancelorder/' . $contact['id']); ?>':false;"
                                                class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                                data-original-title="Delete exhibition">
                                                <i class="fas fa-trash" aria-hidden="true"></i> Cancel Booking
                                            </a>
                                            <?php
                                    }
                                }
                            }
                        ?>

                                            <!-- <a class="btn btn-dark" href="<?= base_url('admin/contactdetails/' . $contact['id']); ?>">View Message</a> -->
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card header -->
                    <div class="card-header pb-0">
                        <div class="d-lg-flex">
                            <div>
                                <h3>My Transcations</h3>
                                <div class="table-responsive">
                                    <table class="table ">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>S. No</th>
                                                <th>Transcation Id</th>
                                                <th>Total Amount</th>
                                                <th>Remark</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                            $count = 1;
                            foreach ($transcations as $transcation) { ?>
                                            <tr style="text-align: center;">
                                                <td><?= $count; ?></td>
                                                <td><?= $transcation['transcation_id']; ?></td>
                                                <td><?= $transcation['amount']; ?></td>
                                                <td style="text-wrap: pretty;"><?php
                                        if ($transcation['remark'] == "Referral Amount") {
                                                    echo $transcation['remark'] . ' of <b>' . $transcation['amount'];
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
                                                    echo 'Refund of stall number <b>' . $transcation['stall_number'] . '</b> of exhibition <b> ' . $exhibition['name'] . '</b> '.$transcation['remark'];
                                                }
                                            }
                                        } else { ?>
                                                    <?= $transcation['remark']; ?>
                                                    <?php } ?></td>
                                            </tr>
                                            <?php
                                $count++;
                            } ?>

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


    <script src="<?=base_url('admin/assets/js/core/popper.min.js')?>"></script>
    <script src="<?=base_url('admin/assets/js/core/bootstrap.min.js')?>"></script>
    <script src="<?=base_url('admin/assets/js/plugins/perfect-scrollbar.min.js')?>"></script>
    <script src="<?=base_url('admin/assets/js/plugins/smooth-scrollbar.min.js')?>"></script>
    <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?=base_url('admin/assets/js/material-dashboard.min.js?v=3.0.4')?>"></script>
</body>

</html>