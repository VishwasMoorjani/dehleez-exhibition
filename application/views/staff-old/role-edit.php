<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Roles Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <input type="hidden" name="link" value="<?=$cat['link'] ?>">
                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Role Name *</label>
                                    <input class="form-control" type="text" value="<?=$cat['role_name'] ?>"
                                        name="role_name" id="name" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <h6>Permissions</h6>
                            <div class="row">
                                <div class="col-6"><label for="">Select/Deselect All</label></div>
                                <div class="col-6"><input type="checkbox" id="allcheck" onchange="allchecks()"></div>
                            </div>
                            <?php foreach($allpermissions as $permission){ ?>
                            <div class="row">
                                <div class="col-6"><label
                                        for="<?=$permission['link']?>"><?=$permission['name']?></label></div>
                                <div class="col-6"><input type="checkbox" name="permissions[]"
                                        value="<?=$permission['link']?>" id="<?=$permission['link']?>"
                                        <?=(in_array($permission['link'], $userpermissions))?'checked':''?>></div>
                            </div>
                            <?php } ?>
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
    <?php $link = $cat['link'];  ?>
    $.ajax({
        url: "<?=base_url('staff/removeimg/roomtype/'.$link.'/image');?>", //the page containing php script
        type: "post", //request type,
        success: function(result) {
            if (result == "done") {
                location.reload();
            }
        }
    });
}

function allchecks() {
    if ($("#allcheck").is(':checked')) {
        $('input:checkbox').prop('checked', true);
    } else {
        $('input:checkbox').prop('checked', false);
    }
}
</script>
<?php $this->load->view('staff/footer'); ?>