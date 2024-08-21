<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Blog Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <input type="hidden" name="link" value="<?=$blog['link']; ?>">
                                <div class="input-group input-group-static m-2">
                                    <label for="post_title">Blog Title *</label>
                                    <input class="form-control" type="text" name="post_title" value="<?= $blog['post_title'] ?>" id="post_title" required>
                                </div>
                                <!-- <div class="input-group input-group-static m-2">
                                    <label for="blogger_name">Blogger Name</label>
                                    <input class="form-control" type="text" name="blogger_name" value="<?= $blog['blogger_name'] ?>" id="blogger_name" >
                                </div> -->
                            </div>
                            <!-- <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <label for="category">Category</label>
                                <div class="input-group input-group-static m-2">
                                    <select name="category" id="category" class="form-control chosen-select"  required>
                                        <?php foreach ($categories as $category) { ?>
                                        <option value="<?= $category['link'] ?>" <?=($category['link'] == $blog['category'])?'selected':''?>><?= $category['name'] ?></option>
                                        <?php  } ?>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="input-group input-group-static m-2">
                                    <label for="metatitle">Blog Meta Title *</label>
                                    <input class="form-control" type="text" name="metatitle" id="metatitle" value="<?= $blog['metatitle'] ?>" required>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="metadescription">Blog Meta Description *</label>
                                    <input class="form-control" type="text" name="metadescription" id="metadescription" value="<?= $blog['metadescription'] ?>" required>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="metakeywords">Blog Meta Keywords *</label>
                                    <input class="form-control" type="text" name="metakeywords" id="metakeywords" value="<?= $blog['metakeywords'] ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <label for="post">Description</label>
                                <div class="input-group input-group-static m-2">
                                    <textarea class="form-control" name="post"><?= $blog['post'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <label for="image">Blog Image</label>
                                <div class="input-group input-group-static m-2">
                                    <?php if ($blog['image'] != "") {
                                        $img = $blog['image'];
                                    ?>
                                        <div class="input-group input-group-static m-2">
                                            <img src="<?=base_url('/assets/front/images/' . $img); ?>" height="50px" srcset="">
                                        </div>
                                        <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg()">Remove Image</div>
                                    <?php } else { ?>
                                        <div class="input-group input-group-static m-2">
                                            <input type="file" name="image" accept="image/*" required />
                                            <p>(Image Size Should be 800*400)</p>

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
    CKEDITOR.replace('post');
</script>

<script>
    function removeimg() {
        <?php $link = $blog['link'];  ?>
        $.ajax({
            url: "<?=base_url('staff/removeblog/'.$link); ?>", //the page containing php script
            type: "post", //request type,
            success: function(result) {
                if (result == "done") {
                    location.reload();
                }
            }
        });
    }
</script>
<?php $this->load->view('staff/footer'); ?>