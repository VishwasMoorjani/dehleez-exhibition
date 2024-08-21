<?php $this->load->view('admin/head'); ?>
<?php $this->load->view('admin/header'); ?>
<div class="container-fluid py-4 mt-5">
    <div class="card">
        <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <center>
                    <h5 class="font-weight-bolder text-white">Coupon Information</h5>
                </center>
            </div>
        </div>
        <div class="card-body">
            <form class="multisteps-form__form" method="post" action="editcoupon" enctype="multipart/form-data">

                <div class="pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                    <input type="hidden" name="id" value="<?= $coupon['id'] ?>">

                    <div class="multisteps-form__content">
                        <div class="row mt-3">
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="name">Coupon Code *</label>
                                    <input class="form-control" type="text" name="name" value="<?= $coupon['name'] ?>" id="name" required>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="category">Coupon Type</label>
                                    <select class="form-control" name="type" id="" required>
                                        <option value="<?= $coupon['type'] ?>"><?= $coupon['type'] ?></option>
                                        <option value="percentage">Percentage</option>
                                        <option value="fixed">Fixed</option>
                                        <option value="usd">USD</option>
                                    </select>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="quantity">Minimum Amount</label>
                                    <input class=" form-control" type="number" name="min_amt" value="<?= $coupon['min_amt'] ?>" id="min_amt" >
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="input-group input-group-static m-2">
                                    <label for="quantity">Quantity</label>
                                    <input class=" form-control" type="number" name="quantity" value="<?= $coupon['quantity'] ?>" required>
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="quantity">Value</label>
                                    <input class=" form-control" type="number" name="value" placeholder="0.00" min="0.00" step="0.001" title="Currency" value="<?= $coupon['value'] ?>">
                                </div>
                                <div class="input-group input-group-static m-2">
                                    <label for="quantity">Maximum Discount</label>
                                    <input class=" form-control" type="number" name="max_dis" value="<?= $coupon['max_dis'] ?>" required>
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

<?php $this->load->view('admin/footer'); ?>