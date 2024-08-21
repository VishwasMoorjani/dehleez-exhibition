<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
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
              <input type="hidden" name="user_id" value="<?=$user_id?>">
              <input type="hidden" name="wallet" id="wallet" value="<?=$price['wallet']?>">
              <input type="hidden" name="final_wallet" id="final_wallet" value="0">
              <input type="hidden" name="wallet_deduction" id="wallet_deduction" value="0">
              <input type="hidden" name="price" id="price" value="0" >
              <input type="hidden" name="qty" id="qty" value="0">
              <input type="hidden" name="totalAmount" id="totalAmount" value="0">
              
              
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

              <div class="col-12 col-sm-12">
                <label for="stallnumber">Stall Number</label>
                <div class="input-group input-group-static m-2">
                  <select name="stall_number[]" id="stallnumber" class="form-control" multiple required>

                  </select>
                </div>
              </div>
              
            <div class="col-12 col-sm-12 d-flex">
                <label for="wallet" class="w-50">SubTotal</label>
                <div class="input-group input-group-static m-2 w-50">
                    ₹ <span id="subtotal">0</span>
                </div>
            </div>
            <hr>
            <div class="col-12 col-sm-12 d-flex">
                <span class="w-50">Wallet Balance</span>
                <div class="input-group input-group-static m-2 w-50">
                    ₹ <span><?=$price['wallet']?></span>
                </div>
            </div>
            <hr>  
            <div class="col-12 col-sm-12 d-flex">
                <span class="w-50">Discount</span>
                <div class="input-group input-group-static m-2 w-50">
                    <input type="number" class="form-control" name="discount" id="discount" value="0" >
                </div>
            </div>
            <hr>
            
            
            <div class="col-12 col-sm-12 d-flex">
                <span  class="w-50">Use Wallet</span>
                <div class="input-group input-group-static m-2 w-50">
                    <input type="checkbox" name="isChecked" id="isChecked" >
                </div>
            </div>
            <hr>
            <div class="col-12 col-sm-12 d-flex">
                <span class="w-50">Total Balance</span>
                <div class="input-group input-group-static m-2 w-50">
                     ₹ <span id="result">0</span>
                </div>
            </div>
            <hr>
           
            
             <div class="col-12 col-sm-12">
                <label for="modeofpayment">Mode Of Payment</label>
                <div class="input-group input-group-static m-2">
                    <select name="modeofpayment" id="modeofpayment" class="form-control" required>
                        <option disabled>Select Payment Mode</option>
                        <option value="Cash">Cash</option>
                        <option value="UPI">UPI</option>
                        <option value="Net Banking">Net Banking</option>
                        <option value="Cheque">Cheque</option>
                        <option value="Other">Other</option>
                    </select>
                    <!--<input name="modeofpayment" id="modeofpayment" type="text" class="form-control" required>-->
                  </select>
                </div>
              </div>
              <div class="col-12 col-sm-12">
                <label for="remark">Remak</label>
                <div class="input-group input-group-static m-2">
                    <textarea name="remark" id="remark" class="form-control" required></textarea>
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
        url: "<?=base_url('admin/getstalls');?>",
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
    //   
      var stall = this.value;
      // console.log(stall);
      $.ajax({
        url: "<?=base_url('admin/getonestalls');?>",
        type: "POST",
        data: {
          stall: stall
        },
        cache: false,
        success: function(dataResult) {
          $("#stallnumber").html(dataResult);
           console.log(dataResult);
           
        $.ajax({
            url: "<?=base_url('admin/getonestallsprice');?>",
            type: "POST",
            data: {
              stall: stall
            },
            cache: false,
            success: function(dataResult) {
                
                document.getElementById('price').value = dataResult;
            //   $("#price").html(dataResult);
            //   console.log(dataResult);
            let price = dataResult;
            }
        });
           
           
           
        }
      });


    });
  });
</script>
<script>
  $(document).ready(function() {
    $('#stallnumber').on('change', function() {
        const selectBox = document.getElementById('stallnumber');
        const selectedOptions = Array.from(selectBox.selectedOptions);
        const numberOfSelectedValues = selectedOptions.length;
        document.getElementById('qty').value = numberOfSelectedValues;
        document.getElementById('totalAmount').value = numberOfSelectedValues*document.getElementById('price').value;
        document.getElementById('subtotal').innerText = `${document.getElementById('totalAmount').value}`;
        document.getElementById('result').innerText = `${document.getElementById('totalAmount').value}`;
        const checkboxs = document.getElementById('isChecked');
        checkboxs.checked = false;
    });
    
    
    
    document.getElementById('isChecked').addEventListener('change', function() {
      const isChecked = this.checked;
      if (isChecked) {
         input1 = parseFloat(document.getElementById('totalAmount').value);
         input2 = parseFloat(document.getElementById('wallet').value);
         discount = parseFloat(document.getElementById('discount').value);
        console.log(discount);
        if(discount > 0){
            input1 -= discount;
        }
        if(input2 == 0)
        {
            result = input1;
        }
        if(input2 < input1)
        {
            input1 -= input2;
            result = input1;
            document.getElementById('wallet_deduction').value = input2;
            input2 = 0;
            document.getElementById('final_wallet').value = input2;
        }
        if(input2 > input1){
            input2 -= input1;
            document.getElementById('wallet_deduction').value = input1;
            input1 = 0;
            result = input1;
            document.getElementById('final_wallet').value = input2;
        }
        document.getElementById('result').innerText = `${result}`;
      } else {
        document.getElementById('result').innerText = `${document.getElementById('totalAmount').value}`;
      }
    });
  });
</script>



<script>
  document.addEventListener('DOMContentLoaded', function() {
    const inputField = document.getElementById('wallet');
    const checkbox = document.getElementById('isChecked');

    // Function to check the input value and disable/enable the checkbox
    function checkInputValue() {
      const inputValue = parseFloat(inputField.value);
      
      if (inputValue === 0) {
        checkbox.disabled = true;
      } else {
        checkbox.disabled = false;
      }
    }

    // Check the input value on page load
    checkInputValue();

    // Add event listener to check the input value when it changes
    inputField.addEventListener('input', checkInputValue);
  });
</script>





<?php $this->load->view('admin/footer'); ?>