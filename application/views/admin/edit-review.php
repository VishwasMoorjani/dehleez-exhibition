<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
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
                                <input type="hidden" name="id" value="<?php echo $review['id']; ?>">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Review Title *</label>
                                    <input class="form-control" type="text" name="name" value="<?= $review['name'] ?>" id="name" required>
                                </div>
                                <!-- <div class="input-group input-group-static m-2">
                                    <label for="rating">Rating</label>
                                    <input class="form-control" type="number" name="rating" min="1" max="5" value="<?= $review['rating'] ?>" id="rating" >
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <label for="message">Message</label>
                                <div class="input-group input-group-static m-2">
                                    <textarea class="form-control" name="message"><?= $review['message'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="image">Review Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($review['image'] != "") {
                                        $img = $review['image'];
                                    ?>
                                        <div class="input-group input-group-static m-2">
                                            <img src="<?php echo base_url('assets/front/images/' . $img); ?>" height="50px" srcset="">
                                        </div>
                                        <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg()">Remove Image</div>
                                    <?php } else { ?>
                                        <div class="input-group input-group-static m-2">
                                            <input type="file" name="image" accept="image/*" required />
                                        </div>
                                    <?php } ?>

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
                        <button type="submit" name="submit" class="btn btn-primary mt-5">Submit</button>
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
    CKEDITOR.replace('message');
</script>

<script>
    function removeimg() {
        <?php $link = $review['id'];  ?>
        $.ajax({
            url: "<?=base_url('admin/removereviews/'.$link)?>", //the page containing php script
            type: "post", //request type,
            success: function(result) {
                if (result == "done") {
                    location.reload();
                }
            }
        });
    }
</script>
<?php $this->load->view('admin/footer'); ?>