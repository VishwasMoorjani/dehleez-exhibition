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
              <h5 class="mb-0">All <?= $title ?></h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <a href="<?=base_url('staff/addstaff');?>" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Staff</a>
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="products-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mobile</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($staff as $user) { ?>
                  <tr>
                    <td>
                      <div>
                        <h6 class="mb-0 text-sm"><?=$user['name']; ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <div>
                        <h6 class="mb-0 text-sm"><?=$user['email']; ?></h6>
                      </div>
                    </td>
                    <td class="align-middle text-center">
                      <span class="text-secondary text-xs font-weight-bold"><?=($user['phone']); ?></span>
                    </td>                    
                    <td class="align-middle text-center text-sm">
                      <?php if ($user['status'] == 1) { ?>
                        <a href="<?= base_url('staff/deactivate/staff/' . $user['id']); ?>">
                        <span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($user['status'] == 0) { ?>
                        <a href="<?= base_url('staff/activate/staff/' . $user['id']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactivate</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <!--<a href="<?= base_url('staff/stafflogs/' . $user['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">-->
                      <!--  <i class="fas fa-history" aria-hidden="true"></i> Logs-->
                      <!--</a>&nbsp;-->
                      <a href="<?= base_url('staff/changepassword/' . $user['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-key "></i> Change Password
                      </a>&nbsp;
                      <a href="<?= base_url('staff/editstaff/' . $user['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?= base_url('staff/delete/staff/' . $user['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-trash" aria-hidden="true"></i> Delete
                      </a>                      
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
</main>



<?php include("footer.php"); ?>

<!--   Core JS Files   -->
<script>
  if (document.getElementById('products-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#products-list", {
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