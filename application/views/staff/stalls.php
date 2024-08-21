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
              <h5 class="mb-0"><?=$title?></h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <a href="<?=base_url('staff/addstall/'.$link);?>" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New stall</a>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">stall</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <?php 
                        if (!in_array('editstall', $this->Global['permissions'])) {
                          // $this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
                          // redirect('staff/dashboard');
                        } else {
                      ?>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($stalls as $stall) { ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?=$stall['name']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <?php if ($stall['status'] == 1) { ?>
                        <a href="<?=base_url('staff/deactivate/stalltype/'. $stall['link']); ?>"><span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($stall['status'] == 0) { ?>
                        <a href="<?=base_url('staff/activate/stalltype/'. $stall['link']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactive</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle">
                    <?php 
                        if (!in_array('editstall', $this->Global['permissions'])) {
                          // $this->session->set_flashdata('error_msg', 'You don\'t have permission to access this');
                          // redirect('staff/dashboard');
                        } else {
                      ?>
                      <a href="<?=base_url('staff/editstall/'. $stall['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit exhibition">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?=base_url('staff/stallog/stalltype/'. $stall['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete exhibition">
                        <i class="fas fa-trash" aria-hidden="true"></i> Delete
                      </a>
                      <?php } ?>
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
          data.columnDelimiter = "|";
        }
        dataTableSearch.export(data);
      });
    });
  };
</script>