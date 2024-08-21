<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>
<div class="container-fluid py-4 mt-5">
  <div class="card">
    <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <center>
          <h5 class="font-weight-bolder text-white">Exhibition Information</h5>
        </center>
      </div>
    </div>
    <?php
    $today = date("Y-m-d");
    ?>
    <div class="card-body">
      <form class="multisteps-form__form" method="post" action="" enctype="multipart/form-data">
        <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
          <div class="multisteps-form__content">
            <div class="row mt-3">
              <input type="hidden" name="booking_date" value="<?= $today; ?>">
              <input type="hidden" name="booked_by" value="<?=$_SESSION['staffEmail']?>">
              <div class="col-12 col-sm-6">
                <label for="exhibitions">Exhibitions</label>
                <div class="input-group input-group-static m-2">
                  <select name="exhibition_id" id="exhibitions" class="form-control chosen-select" required>
                    <option value="">Select Exhibition</option>
                    <?php
                    $today = date("Y-m-d");
                    foreach ($exhibitions as $exhibition) {
                      if ($exhibition['start_date'] >= $today) {
                    ?>
                        <option value="<?= $exhibition['id'] ?>"><?= $exhibition['name'] ?></option>
                    <?php  }
                    } ?>
                  </select>
                </div>
              </div>

              <!-- <div class="col-12 col-sm-6">
                <label for="stalls">Stalls</label>
                <div class="input-group input-group-static m-2">
                  <select class="form-control chosen-select" name="stalls" id="stalls" required>

                  </select>
                </div>
              </div> -->


              <div class="col-12 col-sm-6">
                <label for="stalls">stalls</label>
                <div class="input-group input-group-static m-2">
                  <select name="stall_id" id="stalls" class="form-control" required>

                  </select>
                </div>
              </div>

              <div class="col-12 col-sm-6">
                <label for="stallnumber">Stall Number</label>
                <div class="input-group input-group-static m-2">
                  <select name="stall_number[]" id="stallnumber" class="form-control" multiple required>

                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <label for="remark">Remak</label>
                <div class="input-group input-group-static m-2">
                    <textarea name="remark" id="remark" class="form-control"></textarea>
                  </select>
                </div>
              </div>

            </div>
            <div class="row">
              <button type="submit" name="submit" class="btn btn-primary w-20 mt-5">Submit</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
    evt.preventDefault();
  };
  dropContainer.ondrop = function(evt) {
    // pretty simple -- but not for IE :(
    images.files = evt.dataTransfer.files;
    // If you want to use some of the dropped files
    const dT = new DataTransfer();
    dT.items.add(evt.dataTransfer.files[0]);
    dT.items.add(evt.dataTransfer.files[3]);
    images.files = dT.files;
    evt.preventDefault();
  };
</script>


<script>
  $(document).ready(function() {
    $('#exhibitions').on('change', function() {
      var exhibition = this.value;
      // console.log(exhibition);
      $.ajax({
        url: "getstalls",
        type: "POST",
        data: {
          exhibition: exhibition
        },
        cache: false,
        success: function(dataResult) {
          $("#stalls").html(dataResult);
          // console.log(dataResult);
        }
      });


    });
  });
</script>

<script>
  $(document).ready(function() {
    $('#stalls').on('change', function() {
      var stall = this.value;
      // console.log(stall);
      $.ajax({
        url: "getonestalls",
        type: "POST",
        data: {
          stall: stall
        },
        cache: false,
        success: function(dataResult) {
          $("#stallnumber").html(dataResult);
          // console.log(dataResult);
        }
      });


    });
  });
</script>

<?php $this->load->view('staff/footer'); ?>