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
              <h5 class="mb-0">Sponsors</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <a href="addbrands" class="btn bg-gradient-primary btn-sm mb-0">+&nbsp; New Sponsors Image</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="sliders-list">
              <thead>
                <tr>
                  <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slider Title</th> -->
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                  <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Slider Link</th> -->
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($sliders as $slider) { ?>
                  <tr>
                    <!-- <td>
                      <p class="text-xs font-weight-bold mb-0"><?php echo $slider['title']; ?></p>
                    </td> -->
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div>
                          <img src="<?php echo base_url('assets/front/images/' . $slider['image']) ?>" class="w-50 border-radius-lg" alt="user1">
                        </div>
                      </div>
                    </td>
                    <!-- <td>
                      <p class="text-xs font-weight-bold mb-0"><?php echo $slider['url']; ?></p>
                    </td> -->
                    <td class="align-middle text-center text-sm">
                      <?php if ($slider['status'] == 1) { ?>
                        <a href="<?= base_url('admin/deactivate/brands/' . $slider['link']); ?>"><span class="badge badge-sm bg-gradient-success">Active</span></a>
                      <?php } elseif ($slider['status'] == 0) { ?>
                        <a href="<?= base_url('admin/activate/brands/' . $slider['link']); ?>"><span class="badge badge-sm bg-gradient-secondary">Deactive</span></a>
                      <?php } ?>
                    </td>
                    <td class="align-middle">
                      <a href="<?= base_url('admin/editbrand/' . $slider['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                        <i class="fas fa-edit"></i>Edit
                      </a>&nbsp;
                      <a href="<?= base_url('admin/delete/brands/' . $slider['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
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
  if (document.getElementById('sliders-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#sliders-list", {
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