<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Product Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="addsliders" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="title">Slider Title</label>
                                    <input class=" form-control" type="text" name="title" id="title" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="venue">Venue</label>
                                    <input class=" form-control" type="text" name="venue" id="venue" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="date_added">Date</label>
                                    <input class="form-control" type="text" name="title1" id="title1" required>
                                </div>
                            </div>
                            <!-- <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="subheading">Slider SubHeading</label>
                                    <input class=" form-control" type="text" name="subheading" id="subheading" required>
                                </div>
                            </div> -->
                            <!-- <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="heading">Slider Heading</label>
                                    <input class="form-control" type="text" name="heading" id="heading" required>
                                </div>
                            </div> -->
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Image</label>
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
                            <!-- <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                <div class="input-group input-group-static m-2">
                                    <label for="url">Slider Link</label>
                                    <input class=" form-control" type="text" name="url" id="link" required>
                                </div>
                            </div> -->
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
    function calculatediscount() {
        let mrp = document.getElementById('mrp').value;
        let sale = document.getElementById('sale').value;
        let discount = (mrp - sale) / mrp * 100;
        document.getElementById('discount').value = discount;
    }
    jQuery(document).ready(function() {
        ImgUpload();
    });

    function ImgUpload() {
        var imgWrap = "";
        var imgArray = [];

        $('.upload__inputfile').each(function() {
            $(this).on('change', function(e) {
                imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                var maxLength = $(this).attr('data-max_length');

                var files = e.target.files;
                var filesArr = Array.prototype.slice.call(files);
                var iterator = 0;
                filesArr.forEach(function(f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
                            if (imgArray[i] !== undefined) {
                                len++;
                            }
                        }
                        if (len > maxLength) {
                            return false;
                        } else {
                            imgArray.push(f);

                            var reader = new FileReader();
                            reader.onload = function(e) {
                                var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                imgWrap.append(html);
                                iterator++;
                            }
                            reader.readAsDataURL(f);
                        }
                    }
                });
            });
        });

        $('body').on('click', ".upload__img-close", function(e) {
            var file = $(this).parent().data("file");
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i].name === file) {
                    imgArray.splice(i, 1);
                    break;
                }
            }
            $(this).parent().parent().remove();
        });
    }
</script>
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
<?php $this->load->view('admin/footer'); ?>