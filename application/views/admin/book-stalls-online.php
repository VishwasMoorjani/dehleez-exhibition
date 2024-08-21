<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
  <div class="card">
    <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
      <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
        <center>
          <h5 class="font-weight-bolder text-white">Book Stall</h5>
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
              <input type="hidden" name="booked_by" value="3">
              <div class="col-12 col-sm-6">
                <label for="user">Select User</label>
                <div class="input-group input-group-static m-2">
                  <select name="user_id" id="user" class="form-control chosen-select" required>
                    <option value="">Select User</option>
                    <?php
                    $today = date("Y-m-d");
                    foreach ($users as $user) {
                      if ($exhibitions->start_date >= $today) {
                    ?>
                        <option value="<?= $user['id'] ?>">Name: <?= $user['firstname'] ?></option>
                    <?php  
                    }
                    } ?>
                  </select>
                </div>
              </div>
              
              <div class="col-12 col-sm-6">
                <label for="wallet">Wallet</label>
                <div class="input-group input-group-static m-2">
                    <input type="number" name="wallet" id="wallet" class="form-control" readonly>
                    
                </div>
              </div>
              <div class="col-12 col-sm-6">
                <label for="remark">Remak</label>
                <div class="input-group input-group-static m-2">
                    <textarea name="remark" id="remark" class="form-control"></textarea>
                </div>
              </div>
            <div class="col-12 col-sm-6">
                <label for="wallet_payment">Use Wallet Amount</label>
                <div class="input-group input-group-static m-2">
                    <input type="chechkbox" name="wallet_payment" class="form-control" readonly>
                    
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
    $('#user').on('change', function() {
      var user = this.value;
      // console.log(exhibition);
      $.ajax({
        url: "<?=base_url('admin/getwalletamount')?>",
        type: "POST",
        data: {
          user: user
        },
        cache: false,
        success: function(dataResult) {
            $('#wallet').val(dataResult); 
        //   $("#wallet").html(dataResult);
           console.log(dataResult);
        }
      });


    });
  });
</script>

// <script>
//   $(document).ready(function() {
//     $('#stalls').on('change', function() {
//       var stall = this.value;
//       // console.log(stall);
//       $.ajax({
//         url: "getonestalls",
//         type: "POST",
//         data: {
//           stall: stall
//         },
//         cache: false,
//         success: function(dataResult) {
//           $("#stallnumber").html(dataResult);
//           // console.log(dataResult);
//         }
//       });


//     });
//   });
// </script>

<?php $this->load->view('admin/footer'); ?>