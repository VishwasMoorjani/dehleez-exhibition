<?php $this->load->view('staff/head'); ?>
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<?php $this->load->view('staff/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white"><?=$pagecontent['title']?> Data</h5>
                </center>
            </div>
        </div>
        <div class="card-body">

            <form method="post" action="<?=$pagecontent['name']?>" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-12 mt-3 mt-sm-0">
                                <label for="content">Page Data</label>
                                <div class="input-group input-group-static m-2">
                                    <textarea name="content" id="" cols="100" rows="10"><?=$pagecontent['content']; ?></textarea>
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
    CKEDITOR.replace( 'content' );  
</script>
<?php $this->load->view('staff/footer'); ?>