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
                <a href="<?= base_url('staff/addexhibition'); ?>" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Exhibition</a>
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
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Exhibition</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Start Date</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">End Date</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($exhibitions as $exhibition) { ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="<?= base_url('assets/front/images/' . $exhibition['image']) ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $exhibition['name']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $exhibition['start_date']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $exhibition['end_date']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <?php if ($exhibition['status'] == 1) { ?>
                        <a href="<?= base_url('staff/deactivate/exhibition/' . $exhibition['link']); ?>"><span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($exhibition['status'] == 0) { ?>
                        <a href="<?= base_url('staff/activate/exhibition/' . $exhibition['link']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactive</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url('staff/stalls/' . $exhibition['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Add Images">
                        <i class="fas fa-image"></i>Stalls
                      </a>&nbsp;
                      <a href="<?= base_url('staff/booked/' . $exhibition['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Add Images">
                        <i class="fas fa-image"></i>Booked Stalls
                      </a>&nbsp;
                      <a href="<?= base_url('staff/addimages/' . $exhibition['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Add Images">
                        <i class="fas fa-image"></i>Images
                      </a>&nbsp;
                      <a href="<?= base_url('staff/editexhibition/' . $exhibition['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit exhibition">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?= base_url('staff/delete/exhibition/' . $exhibition['link']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete exhibition">
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
          data.columnDelimiter = "|";
        }
        dataTableSearch.export(data);
      });
    });
  };
</script>