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
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <input type="hidden" name="link" value="<?= $cat['link'] ?>">
                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Exhibition Title *</label>
                                    <input class="form-control" type="text" name="name" id="name" value="<?= $cat['name'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="venue">Exhibition Venue *</label>
                                    <input class="form-control" type="text" name="venue" id="venue" value="<?= $cat['venue'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="start_date">Start Date *</label>
                                    <input class="form-control" type="date" name="start_date" id="start_date" value="<?= $cat['start_date'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="end_date">End Date *</label>
                                    <input class="form-control" type="date" name="end_date" id="end_date" value="<?= $cat['end_date'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="email">Email *</label>
                                    <input class="form-control" type="email" name="email" id="email" value="<?= $cat['email'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="phone">Phone Number *</label>
                                    <input class="form-control" type="number" name="phone" id="phone" value="<?= $cat['phone'] ?>" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="description">Description</label>
                                <div class="input-group input-group-static m-2">
                                    <textarea class="form-control" id="description" name="description"><?php echo $cat['description']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <label for="image">Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($cat['image'] != "") {
                                        $img = $cat['image'];
                                    ?>
                                        <div class="input-group input-group-static m-2">
                                            <img src="<?php echo base_url('/assets/front/images/' . $img); ?>" height="50px" srcset="">
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
                            <div class="col-12 col-sm-6">
                                <label for="featured_image">Featured Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($cat['featured_image'] != "") {
                                        $img = $cat['featured_image'];
                                    ?>
                                        <div class="input-group input-group-static m-2">
                                            <img src="<?php echo base_url('/assets/front/images/' . $img); ?>" height="50px" srcset="">
                                        </div>
                                        <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removefeatured_image()">Remove Image</div>
                                    <?php } else { ?>
                                        <div class="input-group input-group-static m-2">
                                            <input type="file" name="featured_image" accept="image/*" required />
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
                        <div class="row" style="padding: 0px 30px">
                            <div class="col-4 input-group-static form-check form-switch">
                                <input class="form-control form-check-input" type="checkbox" id="featured" name="featured" <?= $cat['featured'] != "" ? 'checked' : '';
                                                                                                                            ?>>
                                <label class="form-check-label" for="featured">Featured</label>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-20 mt-5">Submit</button>
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
    // CKEDITOR.replace('description');
    // dropContainer.ondragover = dropContainer.ondragenter = function(evt) {
    //     evt.preventDefault();
    // };

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

    function removeimg() {
        <?php $link = $cat['link'];  ?>
        $.ajax({
            url: "<?= base_url('admin/removeimg/' . $link); ?>", //the page containing php script
            type: "post", //request type,
            success: function(result) {
                if (result == "done") {
                    location.reload();
                }
            }
        });
    }
    function removefeatured_image() {
        <?php $link = $cat['link'];  ?>
        $.ajax({
            url: "<?= base_url('admin/removefeatured_image/' . $link); ?>", //the page containing php script
            type: "post", //request type,
            success: function(result) {
                if (result == "done") {
                    location.reload();
                }
            }
        });
    }
</script>
<script>
    CKEDITOR.replace('description');
</script>
<?php $this->load->view('admin/footer'); ?>