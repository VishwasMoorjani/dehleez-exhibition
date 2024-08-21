<?php include("head.php"); ?>
<?php include("header.php"); ?>


<!-- End Navbar -->
<div class="container-fluid py-4">
   <div class="row">
    <div class="col-12">
      <div class="card">
          
        <div class="card-header p-3">
          <div class="d-lg-flex">
            <div>
              <h5 class="mb-0"><?=$title?></h5>
            </div>
            <!--<div class="ms-auto my-auto mt-lg-0 mt-4">-->
            <!--  <div class="ms-auto my-auto">-->
            <!--    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Book Now</button>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>
      </div>
    </div>
   </div>
</div>

<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header p-3">
          <div class="d-lg-flex">
            <div>
              <h5 class="mb-0">Booked Stalls</h5>
            </div>
            <!--<div class="ms-auto my-auto mt-lg-0 mt-4">-->
            <!--  <div class="ms-auto my-auto">-->
            <!--    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Book Now</button>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>

        <div class="card-body p-3">
          <ul class="list-unstyled d-flex gap-3 flex-wrap justify-content-center">
            <?php
            usort($exhibitions, function ($a, $b) {
              return $a['stall_number'] <=> $b['stall_number'];
            });
            foreach ($exhibitions as $contact) {
              if ($contact['user_id'] != 0) {
            ?>
                <li><a class="border p-2" data-bs-toggle="modal" data-bs-target="#exampleModal" href="#" data-bs-date="<?= $contact['booking_date']; ?>" data-bs-price="<?= $contact['price']; ?>" data-bs-stall_number="<?= $contact['stall_number']; ?>" data-bs-exhibition="<?php foreach ($allexhibitions as $exhibition) {
                      if ($contact['exhibition_id'] == $exhibition['id']) {
                        echo $exhibition['name'];
                      }
                    } ?>" data-bs-username="<?php foreach ($customers as $customer) {
                    if ($contact['user_id'] == $customer['id']) {
                      echo $customer['firstname'];
                    }
                  } ?>" data-bs-phone="<?php foreach ($customers as $customer) {
                    if ($contact['user_id'] == $customer['id']) {
                      echo $customer['phone'];
                    }
                  } ?>" data-bs-email="<?php foreach ($customers as $customer) {
                  if ($contact['user_id'] == $customer['id']) {
                    echo $customer['email'];
                  }
                } ?>" data-link="<?= base_url('staff/profile/' . $contact['user_id']) ?>">
                    <?= $contact['stall_number']; ?></a></li>
            <?php }
            }  ?>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>



<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header pb-0">
          <div class="d-lg-flex">
            <div>
              <h5 class="mb-0">Offline Booked Stalls</h5>
            </div>
            <!--<div class="ms-auto my-auto mt-lg-0 mt-4">-->
            <!--  <div class="ms-auto my-auto">-->
            <!--    <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Book Now</button>-->
            <!--  </div>-->
            <!--</div>-->
          </div>
        </div>

        <div class="card-body p-3 ">
          <ul class="list-unstyled d-flex gap-3 flex-wrap justify-content-center">
            <?php foreach ($exhibitions as $contact) {
              if ($contact['user_id'] == 0) {
            ?>
                <li><a class="border p-2" href="#"><?= $contact['stall_number'] ?></a></li>
            <?php }
            } ?>
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- End Navbar -->
<div class="container-fluid py-4">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header pb-0">
          <div class="d-lg-flex">
            <div>
              <h5 class="mb-0">Available Stalls</h5>
            </div>
            <!--<div class="ms-auto my-auto mt-lg-0 mt-4">
              <div class="ms-auto my-auto">
                <button class="btn btn-outline-primary btn-sm export mb-0 mt-sm-0 mt-1" data-type="csv" type="button" name="button">Book Now</button>
              </div>
            </div>-->
          </div>
        </div>

        <div class="card-body p-3 ">
          <ul class="list-unstyled d-flex gap-3 flex-wrap justify-content-center">

            <?php $count  = 1;
            foreach ($stalls as $stall) {
              foreach (json_decode($stall['stalls']) as $stal) {
                if (in_array($stal, $bookedstalls)) { ?>
                  <!--<div class="stall form-check" style="background:red; color:black !important;">
                                        <input disabled data-exhibition="<?= $stall['exhibition'] ?>" data-stall="<?= $stal ?>" data-price="<?= $stall['price']; ?>" data-id="<?= $stall['id']; ?>" class="stall-checkbox form-check-input" type="checkbox" id="stall-<?= ++$count; ?>">
                                        <label class="form-check-label" for="stall-<?= $count; ?>">
                                            Stall: <?= $stal; ?><br />
                                            Size:<?= $stall['size']; ?><br />
                                            Price: <?= $stall['price']; ?><br />
                                            Sold Out
                                        </label>
                                    </div>-->
                <?php  } else {
                ?>
                  <!--<div class="stall form-check" style="background:radial-gradient(white,<?= $stall['color'] ?>); color:black !important;">
                                        <input type="hidden" name="exhibitionid" value="<?= $exhibition->id; ?>">
                                        <input class="stall-checkbox form-check-input" name="stalls[]" type="checkbox" value="<?= $stal ?>" id="stall-<?= ++$count; ?>">
                                        <label class="form-check-label" for="stall-<?= $count; ?>">

                                            Stall: <?= $stal; ?><br />
                                            Size:<?= $stall['size']; ?><br />
                                            Price: <?= $stall['price']; ?><br />
                                            <b style="color: green;">Available</b>
                                            
                                        </label>
                                    </div>-->
                  <!--<li><a class="border p-2" href="<?= base_url('admin/book_stalls_online/' . $stall['exhibition'] . '/' . $stal . '/' . $stall['price']); ?>"> <?= $stal; ?></a></li> -->
                  <li><a class="border p-2" href="#"> <?= $stal; ?></a></li>
                  <!--<li><a class="border p-2" href="#"><?= $stal; ?></a></li> -->
            <?php }
              }
            } ?>









            <!--<li><a class="border p-2" href="#">33</a></li>   -->
          </ul>
        </div>

      </div>
    </div>
  </div>
</div>

</main>

<?php include("footer.php"); ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--modal-->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booked Stall Detail</h5>
        <!--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
        <a id="dynamicLink" href="#" class="btn btn-primary m-0">View Profile</a>
      </div>
      <div class="modal-body">
        <div class="row gap-2">
          <div class="col-md-12">
            <p class="border-bottom px-2"><a id="dynamicLinks" href="#" class="username" href="#"></a></p>
          </div>
          <div class="col-md-12">
            <p class="phone border-bottom px-2"></p>
          </div>
          <div class="col-md-12">
            <p class="email border-bottom px-2"></p>
          </div>
          <div class="col-md-12">
            <p class="exhibition border-bottom px-2"></p>
          </div>
          <div class="col-md-12">
            <p class="stall_number border-bottom px-2"></p>
          </div>
          <div class="col-md-12">
            <p class="price border-bottom px-2"></p>
          </div>
          <div class="col-md-12">
            <p class="date border-bottom px-2"> </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary m-0" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  var exampleModal = document.getElementById('exampleModal')
  exampleModal.addEventListener('show.bs.modal', function(event) {
    // Button that triggered the modal
    var button = event.relatedTarget
    // Extract info from data-bs-* attributes
    var recipient = button.getAttribute('data-bs-price')
    var exhibition = button.getAttribute('data-bs-exhibition')
    var stall_number = button.getAttribute('data-bs-stall_number')
    var date = button.getAttribute('data-bs-date')
    var username = button.getAttribute('data-bs-username')
    var phone = button.getAttribute('data-bs-phone')
    var email = button.getAttribute('data-bs-email')
    var link = button.getAttribute('data-link'); // Extract info from data-* attributes

    // If necessary, you could initiate an AJAX request here
    // and then do the updating in a callback.
    //
    // Update the modal's content.
    var modalprice = exampleModal.querySelector('.price')
    var modalexhibition = exampleModal.querySelector('.exhibition')
    var modalstall_number = exampleModal.querySelector('.stall_number')
    var modaldate = exampleModal.querySelector('.date')
    var modalusername = exampleModal.querySelector('.username')
    var modalphone = exampleModal.querySelector('.phone')
    var modalemail = exampleModal.querySelector('.email')
    var modallink = exampleModal.querySelector('#link')

    //   var modalBodyInput = exampleModal.querySelector('.modal-body input')

    modalprice.textContent = 'Price ' + recipient
    modalexhibition.textContent = 'Exhibition name : ' + exhibition
    modalstall_number.textContent = 'Stall Number : ' + stall_number
    modaldate.textContent = 'Booking Date : ' + date
    modalusername.textContent = 'Name : ' + username
    modalphone.textContent = 'Phone No. : ' + phone
    modalemail.textContent = 'Email : ' + email
    //   modalBodyInput.value = recipient



    //  var button = $(event.relatedTarget); // Button that triggered the modal
    // var link = button.data('link'); // Extract info from data-* attributes
    console.log(link)
    var modal = $(this);
    modal.find('#dynamicLink').attr('href', link);
    modal.find('#dynamicLinks').attr('href', link);
  })
</script>




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