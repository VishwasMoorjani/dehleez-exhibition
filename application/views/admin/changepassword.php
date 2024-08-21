<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>

<div class="container-fluid py-4">
    <form action="" method="post">
        <div class="card mt-4" id="password">
            <div class="card-header">
                <h5>Change Password</h5>
            </div>
            <div class="card-body pt-0">
                <input type="hidden" name="id" value="<?=$staff['id']?>">
                <div class="input">
                    <label class="form-label">Email</label>
                    <div class="input-group input-group-outline">
                        <input type="email" class="form-control" value="<?=$staff['email']?>" disabled>
                    </div>
                </div>

                <div class="input">
                    <label class="form-label">New password</label>
                    <div class="input-group input-group-outline">
                        <input type="password" name="password" class="form-control">
                    </div>
                    <?php echo form_error('password'); ?>
                </div>
                <div class="input">
                    <label class="form-label">Confirm New password</label>
                    <div class="input-group input-group-outline">
                        <input type="password" name="confirmpassword" class="form-control">
                    </div>
                    <?php echo form_error('confirmpassword'); ?>
                </div>
                
                <?php
                if (!empty($_SESSION['success_msg'])) {
                    echo '<p style="color:#0F0">' . $_SESSION['success_msg'] . '</p>';
                } elseif (!empty($_SESSION['error_msg'])) {
                    echo '<p style="color:#F00">' . $_SESSION['error_msg'] . '</p>';
                }
                ?>
                <div class="row">
                    <h5 class="mt-2">Password requirements</h5>
                    <p class="text-muted mb-2">
                        Please follow this guide for a strong password:
                    </p>
                    <ul class="text-muted ps-4 mb-0 float-start">
                        <li>
                            <span class="text-sm">One special characters</span>
                        </li>
                        <li>
                            <span class="text-sm">Min 6 characters</span>
                        </li>
                        <li>
                            <span class="text-sm">One number (2 are recommended)</span>
                        </li>
                        <li>
                            <span class="text-sm">Change it often</span>
                        </li>
                    </ul>
                </div>
                <button class="btn bg-gradient-dark btn-sm float-start" type="submit">Update password</button>

            </div>
        </div>
    </form>

</div>
</main>
<?php $this->load->view('admin/footer'); ?>