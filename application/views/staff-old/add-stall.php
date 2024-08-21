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
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="" enctype="multipart/form-data">
                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Name *</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="color">Color *</label>
                                    <input class="form-control" type="color" name="color" id="color" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="size">Size *</label>
                                    <input class="form-control" type="text" name="size" id="size" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="price">Price *</label>
                                    <input class="form-control" type="number" name="price" id="price" required>
                                </div>
                            </div>


                            <div class="col-12 col-sm-6">
                                <label for="stalls">stalls</label>
                                <div class="input-group input-group-static m-2">
                                    <select name="stalls[]" id="stalls" class="form-control chosen-select" multiple required>
                                        <option value="">Select Category</option>
                                        <?php foreach ($stalls as $stall) { ?>
                                            <option value="<?= $stall ?>"><?= $stall ?></option>
                                        <?php  } ?>
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
    CKEDITOR.replace('description');
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
    CKEDITOR.replace('content');
</script>
<?php $this->load->view('staff/footer'); ?>