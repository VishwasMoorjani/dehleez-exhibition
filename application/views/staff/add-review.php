<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Review Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <input type="hidden" name="date_added" value="<?php echo date("Y-m-d"); ?>">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Name *</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                                <!-- <div class="input-group input-group-static m-2">
                                    <label for="rating">Review Rating</label>
                                    <input class="form-control" type="number" name="rating" min="1" max="5" value="5" id="rating" >
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <label for="post">Message</label>
                                <div class="input-group input-group-static m-2">
                                    <textarea class="form-control" name="message"></textarea>
                                </div>
                            </div>
                            <div class="input-group input-group-static m-2">
                                <label for="image">Review Image</label>
                                <div class="input-group input-group-static m-2">
                                    <input type="file" name="image" accept="image/*" required />
                                </div>
                                <?php
                                if (!empty($_SESSION['success_msg'])) {
                                    echo '<p class="status-msg success">' . $success_msg . '</p>';
                                } elseif (!empty($_SESSION['error_msg'])) {
                                    echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                }
                                ?>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-20 mt-5">Submit</button>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    CKEDITOR.replace('post');
</script>
<?php $this->load->view('staff/footer'); ?>