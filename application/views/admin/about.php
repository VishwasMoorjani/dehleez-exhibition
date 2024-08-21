<?php $this->load->view('admin/head'); ?>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">About Data</h5>
                </center>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="about" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <?php

                                if ($pagecontent['image'] != "") {
                                    $img = $pagecontent['image'];
                                ?>
                                    <div class="input-group input-group-static m-2">
                                        <img src="<?php echo base_url('/assets/front/images/' . $img); ?>" height="50px" srcset="">
                                    </div>
                                    <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg('image')">Remove Image</div>
                                <?php } else { ?>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="image" accept="image/*" required />
                                    </div>
                                <?php } ?>
                                <?php
                                if (!empty($_SESSION['success_msg'])) {
                                    echo '<p class="status-msg success">' . $success_msg . '</p>';
                                } elseif (!empty($_SESSION['error_msg'])) {
                                    echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row mt-3">

                            <div class="col-12 col-sm-12 mt-3 mt-sm-0">
                                <label for="content">Page Data</label>
                                <div class="input-group input-group-static m-2">
                                    <textarea name="content" id="" cols="100" rows="10"><?php echo $pagecontent['content']; ?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
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
    function removeimg(link) {
        $.ajax({
            url: "<?= base_url('admin/removeabout/'); ?>" + link, //the page containing php script
            type: "post", //request type,
            success: function(result) {
                if (result == "done") {
                    location.reload();
                }
            }
        });
    }
    CKEDITOR.replace('content');
</script>
<?php $this->load->view('admin/footer'); ?>