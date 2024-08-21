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
              <h5 class="mb-0">Offline Booked Stalls</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <a href="<?= base_url('staff/bookstalls'); ?>" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; Book Now</a>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stall Number</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Exhibition</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Remarks</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Booked By</th>
                  <!--<th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th> -->
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $today = date("Y-m-d");
                foreach ($stalls as $stall) {
                ?>
                  <tr>
                  <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $stall['id']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $stall['stall_number']; ?></h6>
                        </div>
                      </div>
                    </td>
                    
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?php
                                                    foreach ($exhibitions as $exhibition) {
                                                      if($stall['exhibition_id'] == $exhibition['id']){ echo $exhibition['name']; }
                                                    } ?></h6>
                        </div>
                      </div>
                    </td>
                    
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $stall['remark']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <?php if ($stall['booked_by'] == 1) { ?>
                        <a href="<?= base_url('staff/deactivate/exhibition/' . $stall['id']); ?>"><span class="badge badge-sm bg-gradient-success">Online Booked</span></a>
                      <?php } elseif ($stall['booked_by'] == 2) { ?>
                        <a href="<?= base_url('staff/activate/exhibition/' . $stall['id']); ?>"><span class="badge badge-sm bg-gradient-secondary">Offline Booked</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url('staff/delete/booked-stalls/' . $stall['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Add Images">
                        <i class="fas fa-image"></i>Cancel Booking
                      </a>&nbsp;
                      <!-- <a href="<?= base_url('staff/bookstalls/' . $stall['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Add Images">
                        <i class="fas fa-image"></i>Avaliable Stalls
                      </a>&nbsp; -->
                      <!-- <a href="<?= base_url('staff/stalls/' . $stall['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Add Images">
                        <i class="fas fa-image"></i>Stalls
                      </a>&nbsp; -->
                      <!-- <a href="<?= base_url('staff/addimages/' . $stall['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Add Images">
                        <i class="fas fa-image"></i>Images
                      </a>&nbsp;
                      <a href="<?= base_url('staff/editexhibition/' . $stall['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit exhibition">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?= base_url('staff/delete/exhibition/' . $stall['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete exhibition">
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