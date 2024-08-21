<?php $this->load->view('staff/head'); ?>
<?php $this->load->view('staff/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Global Settings</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4 col-sm-4">Name</div>
                <div class="col-4 col-sm-4">Value</div>
                <div class="col-4 col-sm-4">Submit</div>
            </div>
            <!-- <form class="multisteps-form__form" method="post" action="editsettings" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="headerlogo" hidden>
                        <h5>Header Logo</h5>
                    </div>
                    <div class="col-4 col-sm-4">
                        <?php if ($this->Global['headerlogo'] != "") {
                            $img = $this->Global['headerlogo'];
                        ?>
                            <div class="input-group input-group-static m-2">
                                <img src="<?php //echo base_url('/assets/front/' . $img); ?>" height="50px" srcset="">
                            </div>
                            <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg()">Remove Image</div>
                        <?php } else { ?>
                            <div class="input-group input-group-static m-2">
                                <input type="file" name="value" accept="image/*" required />
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings" enctype="multipart/form-data">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="footerlogo" hidden>
                        <h5>Footer Logo</h5>
                    </div>
                    <div class="col-4 col-sm-4"><?php if ($this->Global['footerlogo'] != "") {
                                                    $img = $this->Global['footerlogo'];
                                                ?>
                            <div class="input-group input-group-static m-2">
                                <img src="<?php //echo base_url('/assets/front/' . $img); ?>" height="50px" srcset="">
                            </div>
                            <div class="btn btn-primary m-2" style="border-radius:0.5rem" onclick="removeimg()">Remove Image</div>
                        <?php } else { ?>
                            <div class="input-group input-group-static m-2">
                                <input type="file" name="value" accept="image/*" required />
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form> -->
            <!-- <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="topdata" hidden>
                        <h5>Top Data</h5>
                    </div>
                    <div class="col-4 col-sm-4"><textarea name="value" rows="6" cols="30"><?=strip_tags($this->Global['topdata']); ?></textarea></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form> -->
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="footercontent" hidden>
                        <h5>Footer Content</h5>
                    </div>
                    <div class="col-4 col-sm-4"><textarea name="value" rows="6" cols="30"><?=strip_tags($this->Global['footercontent']); ?></textarea></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="address" hidden>
                        <h5>Address</h5>
                    </div>
                    <div class="col-4 col-sm-4"><textarea name="value" rows="6" cols="30"><?=strip_tags($this->Global['address']); ?></textarea></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">                    
                        <input type="text" name="name" value="mobile" hidden>
                        <h5>Mobile</h5>
                    </div>

                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?=($this->Global['mobile']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">                    
                        <input type="text" name="name" value="mobile2" hidden>
                        <h5>Alternate Mobile</h5>
                    </div>

                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?=($this->Global['mobile2']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                        <input type="text" name="name" value="email" hidden>
                        <h5>Email</h5>
                    </div>
                    <div class="col-4 col-sm-4"><input type="text" name="value" value="<?=($this->Global['email']); ?>" id=""></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <h2>Home Banner Content</h2>
            <br>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="banner_title" hidden>
                        <i aria-hidden="true">Banner Title</i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['banner_title']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="banner_content" hidden>
                        <h5>Banner Content</h5>
                    </div>
                    <div class="col-4 col-sm-4"><textarea name="value" rows="6" cols="30"><?=strip_tags($this->Global['banner_content']); ?></textarea></div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <h2>Social Links</h2>
            <br>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="facebook" hidden>
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['facebook']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="twitter" hidden>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['twitter']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="instagram" hidden>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['instagram']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="youtube" hidden>
                        <i class="fa fa-youtube-play" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['youtube']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="whatsapp" hidden>
                    <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['whatsapp']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <!-- <h2>Counters</h2>
            <br>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="experience" hidden>
                        <i aria-hidden="true">Experience</i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['experience']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="satisfied_customer" hidden>
                        <i aria-hidden="true">Satisfied Customer</i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['satisfied_customer']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="success" hidden>
                        <i aria-hidden="true">Success</i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['success']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>
            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="team" hidden>
                    <i aria-hidden="true">Team</i>
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['team']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form> -->

            <form class="multisteps-form__form" method="post" action="editsettings">
                <div class="row mt-2">
                    <div class="col-4 col-sm-4">
                    <input type="text" name="name" value="gmblink" hidden>
                        <i class="fa fa-google" aria-hidden="true"></i> (Google My Business)
                    </div>
                    <div class="col-4 col-sm-4">
                        <input type="text" name="value" value="<?=($this->Global['gmblink']); ?>" id="">
                    </div>
                    <div class="col-4 col-sm-4"><button type="submit" name="submit" class="btn btn-primary">Submit</button></div>
                </div>
                <hr style=" color: #000; opacity: 100%;border-style: inset;border-width: 1px;">
            </form>


        </div>
    </div>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<?php $this->load->view('staff/footer'); ?>