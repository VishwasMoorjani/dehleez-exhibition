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
              <h5 class="mb-0">All Logs</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <!-- <a href="<?=base_url('admin/addstall/'.$link);?>" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New stall</a> -->
                <!-- <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button> -->
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="products-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Logs</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Log</th>
                  <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php foreach ($logs as $stall) { ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?=$stall['user']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?=$stall['remark']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <!-- <td class="align-middle text-center text-sm">
                      <?php if ($stall['status'] == 1) { ?>
                        <a href="<?=base_url('admin/deactivate/stalltype/'. $stall['link']); ?>"><span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($stall['status'] == 0) { ?>
                        <a href="<?=base_url('admin/activate/stalltype/'. $stall['link']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactive</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle">
                      <a href="<?=base_url('admin/editstall/'. $stall['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit exhibition">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?=base_url('admin/stallog/stalltype/'. $stall['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete exhibition">
                        <i class="fas fa-trash" aria-hidden="true"></i> Delete
                      </a> -->
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