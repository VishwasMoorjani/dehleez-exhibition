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
              <h5 class="mb-0">Order History</h5>
            </div>
            <div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Export</button>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body px-0 pb-0">
          <div class="table-responsive">
            <table class="table table-flush" id="contacts-list">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stall Number</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Exhibition Name</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Booking Date</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orders as $contact) { ?>
                  <tr>
                    <td>
                      <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm"><?= $contact['id']; ?></h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $contact['stall_number']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?php foreach ($exhibitions as $exhibition) {
                                                                  if ($contact['exhibition_id'] == $exhibition['id']) {
                                                                    echo $exhibition['name'];
                                                                  }
                                                                } ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $contact['price']; ?></p>
                    </td>
                    <td>
                      <p class="text-xs font-weight-bold mb-0"><?= $contact['booking_date']; ?></p>
                    </td>
                    <td>
                      <a href="<?= base_url('staff/cancelorder/' . $contact['id']); ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Delete exhibition">
                        <i class="fas fa-trash" aria-hidden="true"></i> Cancel Booking
                      </a>
                      <!-- <a class="btn btn-dark" href="<?= base_url('staff/contactdetails/' . $contact['id']); ?>">View Message</a> -->
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
  if (document.getElementById('contacts-list')) {
    const dataTableSearch = new simpleDatatables.DataTable("#contacts-list", {
      searchable: true,
      fixedHeight: false,
      perPage: 20,
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