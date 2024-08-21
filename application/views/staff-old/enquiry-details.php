<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">View Enquiry</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Name *</label>
                                    <input class="form-control" value="<?= $message['name']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="sku">Email</label>
                                    <input class=" form-control" value="<?= $message['email']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="quantity">Phone No</label>
                                    <input class="form-control" value="<?= $message['contact']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="sku">Request For</label>
                                    <input class=" form-control" value="<?= $message['requestfor']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <!-- <div class="col-12 col-sm-4">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Whatsapp *</label>
                                    <input class="form-control" value="<?= $message['whatsapp']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="input-group input-group-static m-2">
                                    <label for="sku">City</label>
                                    <input class=" form-control" value="<?= $message['address']; ?>" readonly>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <label for="shortdescription">Message</label>
                            <div class="input-group input-group-static m-2">
                                <textarea class="form-control" rows="10" readonly><?= $message['message']; ?></textarea>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    CKEDITOR.replace('shortdescription');
    CKEDITOR.replace('description');
    CKEDITOR.replace('additionalinfo');
    CKEDITOR.replace('customcontent');
    CKEDITOR.config.width = '100%';
</script>

<?php $this->load->view('staff/footer'); ?>