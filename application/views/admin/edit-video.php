<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Gallery Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">

            <form class="multisteps-form__form" method="post" action="editvideogallery" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                    <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <div class="input-group input-group-static m-2">
                                        <label for="name">Youtube Key</label>
                                        <input type="hidden" name="link" value="<?php echo $slider['link']; ?>">
                                        <input class="form-control" type="text" value="<?php echo $slider['image']; ?>" name="image" id="name" required>
                                        <p>(Example = https://www.youtube.com/watch?v=<b>ggD6STayK7s</b>)</p>
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

    function removeimg() {
        <?php $link = $slider['link'];  ?>
        $.ajax({
            url: "removeslider/<?= $link ?>", //the page containing php script
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