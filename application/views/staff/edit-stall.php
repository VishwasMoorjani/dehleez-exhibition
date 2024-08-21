<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<style>
    .fs-dropdown .fs-options{display: flex; flex-wrap: wrap;}
</style>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Stall Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="" enctype="multipart/form-data">
                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <input type="hidden" name="link" value="<?=$stall->link?>">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Name *</label>
                                    <input class="form-control" type="text" name="name" id="name" value="<?=$stall->name?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="color">Color *</label>
                                    <input class="form-control" type="color" name="color" id="color" value="<?=$stall->color?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="size">Size *</label>
                                    <input class="form-control" type="text" name="size" id="size" value="<?=$stall->size?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="price">Price *</label>
                                    <input class="form-control" type="number" name="price" id="price" value="<?=$stall->price?>" required>
                                </div>
                            </div>
                          
                            <div class="col-12 col-sm-12">
                                <label for="stalls">stalls</label>
                                <div class="input-group input-group-static m-2">
                                    <select name="stalls[]" id="stalls" class="form-control chosen-select" multiple required>
                                        <option value="">Select Category</option>
                                        <?php foreach ($stalls as $thisstall) { ?>
                                            <!--<option <?php foreach($bookedstalls as $booked){ if($booked['stall_number'] == $thisstall){ echo 'disabled selected'; } } ?> value="<?= $thisstall ?>" <?php if (strpos($stall->stalls,$thisstall) !== false) { echo 'selected';} ?>><?= $thisstall ?></option>-->
                                                <option value="<?= $thisstall ?>" <?php if (in_array($thisstall,json_decode($stall->stalls))) { echo 'selected'; } ?>><?= $thisstall ?></option>

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
<?php $this->load->view('admin/footer'); ?>