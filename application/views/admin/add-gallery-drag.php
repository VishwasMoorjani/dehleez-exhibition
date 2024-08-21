<?php $this->load->view('admin/head'); ?>
<link rel="stylesheet" type="text/css" href="<?=base_url(); ?>assets/admin/css/dropzone.min.css" />
<script type="text/javascript" src="<?=base_url(); ?>assets/admin/js/dropzone.min.js"></script>
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
            <form action="<?=base_url('admin/dragDropUploadGallery/'); ?>" class="dropzone">
            </form>
            <div class="row" >
                <?php
            if (!empty($sliders)) {
                foreach ($sliders as $row) {
                    //$filePath = base_url('assets/front/images/uploads/'. $row);
                    $image = $row['image'];
            ?>
            <div class="col-lg-2 col-md-3 m-2">
                 <img src="<?=base_url('assets/front/images/'. $row['image']); ?>" width="150px" height="140px" />
                 <hr>
                    <a class="btn btn-primary" href="<?=base_url('admin/removegalleryimages/'.$image.'/'.$row['id']);?>" role="button">Remove Image</a>
            </div>
                   
                <?php
                }
            } else {
                ?>
            </div>
            
                <p>No file(s) found...</p>
            <?php } ?>
        </div>
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
<?php $this->load->view('admin/footer'); ?>