<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>

<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Staff Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-sm-6"><label for="">Name:</label></div>
                            <div class="col-sm-6">
                                <div class="input-group input-group-static">
                                    <input class="form-control" name="name" type="text">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label for="staff_type">Staff Role</label>
                            </div>
                            <div class="col-sm-6">
                                <div class="input-group input-group-static">
                                    <select name="role" class="form-control" id="staff_type" required="">
                                        <option value="" selected disabled>Please select a Role</option>
                                        <?php foreach($roles as $role) { ?>
                                        <option value="<?=$role['role_name']?>"><?=$role['role_name']?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6"><label for="">Email:</label></div>
                            <div class="col-sm-6">
                                <div class="input-group input-group-static">
                                    <input class="form-control" name="email" type="text" value="">
                                </div>
                            </div>

                            <div class="col-sm-6"><label for="">Password:</label></div>
                            <div class="col-sm-6">
                                <div class="input-group input-group-static">
                                    <input class="form-control" name="password" type="password" value="">
                                </div>
                            </div>

                            <div class="col-sm-6"><label for="">Mobile No:</label></div>
                            <div class="col-sm-6">
                                <div class="input-group input-group-static">
                                    <input class="form-control" name="phone" type="text" value="">
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
                            var html =
                                "<div class='upload__img-box'><div style='background-image: url(" +
                                e.target.result + ")' data-number='" + $(
                                    ".upload__img-close").length + "' data-file='" + f
                                .name +
                                "' class='img-bg'><div class='upload__img-close'></div></div></div>";
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

function removeimg() {
    <?php $link = $staff['link'];  ?>
    $.ajax({
        url: "removeimg/<?= $link ?>", //the page containing php script
        type: "post", //request type,
        success: function(result) {
            if (result == "done") {
                location.reload();
            }
        }
    });
}

function removepdf() {
    <?php $link = $staff['link'];  ?>
    $.ajax({
        url: "removepdf/<?= $link ?>", //the page containing php script
        type: "post", //request type,
        success: function(result) {
            if (result == "done") {
                location.reload();
            }
            console.log(result);
        }
    });
}
</script>
<script>
CKEDITOR.replace('shortdescription');
CKEDITOR.replace('description');
CKEDITOR.replace('gemsstones');
CKEDITOR.config.width = '100%';
</script>
<?php $this->load->view('staff/footer'); ?>
<script>
$(document).ready(function() {
    $('#category').on('change', function() {
        var category_id = this.value;
        $.ajax({
            url: "getsubcategory",
            type: "POST",
            data: {
                category_id: category_id
            },
            cache: false,
            success: function(dataResult) {
                $("#sub_category").html(dataResult);
            }
        });


    });
});
</script>