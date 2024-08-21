<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>
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
                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Exhibition Title *</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="venue">Exhibition Venue *</label>
                                    <input class="form-control" type="text" name="venue" id="venue" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="start_date">Start Date *</label>
                                    <input class="form-control" type="date" name="start_date" id="start_date" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="end_date">End Date *</label>
                                    <input class="form-control" type="date" name="end_date" id="end_date" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="email">Email *</label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="phone">Phone Number *</label>
                                    <input class="form-control" type="number" name="phone" id="phone" required>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <label for="description">Description</label>
                                <div class="input-group input-group-static m-2">
                                    <textarea class="form-control" name="description"></textarea>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Image</label>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="image" accept="image/*" required />
                                        <p>(Image Size Should be 800*400)</p>
                                    </div>
                                    <?php
                                    if (!empty($_SESSION['success_msg'])) {
                                        echo '<p class="status-msg success">' . $success_msg . '</p>';
                                    } elseif (!empty($_SESSION['error_msg'])) {
                                        echo '<p class="status-msg error">' . $_SESSION['error_msg'] . '</p>';
                                    }
                                    ?>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="image">Featured Image</label>
                                    <div class="input-group input-group-static m-2">
                                        <input type="file" name="featured_image" accept="image/*" required />
                                        <p>(Image Size Should be 800*400)</p>
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
                        </div>
                        <div class="row" style="padding: 0px 30px">
                            <div class="col-4 input-group-static form-check form-switch">
                                <input class="form-control form-check-input" type="checkbox" id="featured" name="featured">
                                <label class="form-check-label" for="featured">Featured</label>
                            </div>
                        </div>
                        <div class="row">
                            <button type="submit" name="submit" class="btn btn-primary w-20 mt-5">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    CKEDITOR.replace('description');
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
<script>
    CKEDITOR.replace('content');
</script>
<?php $this->load->view('staff/footer'); ?>