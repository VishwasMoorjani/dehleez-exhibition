<?php include("head.php"); ?>
<?php include("header.php"); ?>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <!-- Card header -->
        <div class="card-header pb-0">
          <div class="d-lg-flex">
            <div>
              <h5 class="mb-0">All Coupons</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <a href="addcoupon" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Coupon</a>
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="coupons-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">S.No</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Coupon code</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Coupon Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Value</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($coupons as $coupon) { ?>
                  <tr>
                    <td>
                        <?=$i++?>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?=$coupon['name']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?=$coupon['type']; ?></p>
                    </td>
                    <td>
                    <p class="text-xs font-weight-bold mb-0"><?php if($coupon['type'] == "fixed"){ echo("₹"); } if($coupon['type'] == "usd"){ echo ("$"); } echo $coupon['value']; if($coupon['type'] == "percentage"){ echo ("%"); }  ?></p>
                    </td> 
                    <td class="align-middle text-center text-sm">
                      <?php if ($coupon['status'] == 1) { ?>
                        <a href="<?= base_url('staff/deactivate/coupons/' . $coupon['id']); ?>"><span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($coupon['status'] == 0) { ?>
                        <a href="<?= base_url('staff/activate/coupons/' . $coupon['id']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactive</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url('staff/editcoupon/' . $coupon['name']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?= base_url('staff/delete/coupons/' . $coupon['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-trash" aria-hidden="true"></i> Delete
                      </a>
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
</main>



<?php include("footer.php"); ?>

<!--   Core JS Files   -->
<script>
  if (document.getElementById('coupons-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#coupons-list", {
      searchable: true,
      fixedHeight: false,
      perPage: 20
    });

    document.querySelectorAll(".export").forEach(function(el) {
      el.addEventListener("click", function(e) {
        var type = el.dataset.type;

        var data = {
          type: type,
          filename: "material-" + type,
        };

        if (type === "csv") {
          data.columnDelimiter = ",";
        }

        dataTableSearch.export(data);
      });
    });
  };
</script>