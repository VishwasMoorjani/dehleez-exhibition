<?php include("head.php"); ?>
<?php include("header.php"); ?>
<style>
	td {
		text-align: left;
	}

	.card-body {
        padding-top: 0px !important; 
	}

	.table thead th {
		padding: 3px;
	}

	@media(max-width:450px) {
		.address>tr {
			display: grid;
		}

		.address>tbody>tr {
			display: grid;
		}
	}

	@media print {
		.Print {
			display: contents;
		}
	}
</style>
<div class="aiz-user-panel container-fluid py-4" style="font-size:20px;">
	<div class="aiz-titlebar mt-2 mb-4 noPrint">
		<div class="row align-items-center">
			<div class="col-md-12">
				<span class="h3">Order ID: <?= $order['order_id'] ?></span>
				<a href="javascript:window.print()" style="float: right;">Print Invoice <i class="fa fa-print" aria-hidden="true"></i></a>

			</div>
		</div>
	</div>

	<div class="card mb-1 Print" style="padding:0px">
		<div class="card-body">
			<table class="table-borderless table" style="margin-bottom: 0rem;">
				<td>
					<img src="<?=base_url('assets/front/img/logo.png');?>" width="40%"><br /><br /><br />
					<p style="font-size:15px; font-weight: 300; margin-bottom:0px">Order ID: <?= $order['order_id'] ?></p>
					<p style="font-size:15px; font-weight: 300; margin-bottom:0px">Order date: <?= $order['order_date'] ?></p>
					<p style="font-size:15px; font-weight: 300; margin-bottom:0px">GST No: <?=$gst?></p>
				</td>
				<td style="text-align:right">
					<h5 class="h3 mb-0"><?=sitename?></h5>
					<p style="font-size:15px; font-weight: 300; margin-bottom:0px"><?=$address?></p>
					<p style="font-size:15px; font-weight: 300; margin-bottom:0px"><?=$email?></p>
					<p style="font-size:15px; font-weight: 300; margin-bottom:0px"><?=$mobile?></p>
				</td>
			</table>
		</div>
	</div>
	<div class="card mb-1" style="padding:0px">
		<div class="card-header">
			<table class="table-borderless table noPrint address" style="margin-bottom: 0rem;">
				<tr>
					<td>
						<h5 class="h6 mb-0">Order Id: <?= $order['order_id'] ?></h5>
					</td>
					<td>
						<h5 class="h6 mb-0">Order date: <?= $order['order_date'] ?></h5>
					</td>
				</tr>

			</table>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-12">
					<table class="table-borderless table aiz-table table footable footable-1 breakpoint-xl">
						<tbody class="address">
							<tr>
								<td>
									<h4>Bill To:</h4>
									<p style="columns: 2; font-size:13px; color:#7b809a; line-height: 1.625; font-weight: 300;"><?=$order['billingAddress'] ?></p>
								</td>
								<td>
									<h4>Ship To:</h4>
									<p style="columns: 2; font-size:13px; color:#7b809a; line-height: 1.625; font-weight: 300;"><?=$order['shippingAddress'] ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="card mb-1 noPrint" style="padding:0px">
		<div class="card-header">
			<h5 class="h6 mb-0">Special Note</h5>
		</div>
		<div class="card-body">
			<p style="font-size:15px; font-weight: 300;" class="m-2"><?= $order['message'] ?></p>
		</div>
	</div>
	<div class="card mb-1 noPrint" style="padding:0px">
                                <div class="card-header">
                                    <h5 class="h6 mb-0">Payment Method</h5>
                                </div>
                                <div class="card-body">
									<span style="font-size:20px; font-weight:600;"><?= $order['paymentMethod'] ?></span>
									<?php if($order['paymentMethod'] != "Cash on Delivery"){
										echo("<br/><b>Transaction Id is :</b> ".$order['transactionId']);
									} ?>
                                </div>
                            </div>
                            <div class="card mb-1 noPrint" style="padding:0px">
                                <div class="card-header">
                                    <h5 class="h6 mb-0">Tracking Details</h5>
                                </div>
                                <div class="card-body">
                                    <span style="font-size:20px; font-weight:600;">Tracking Id :</span><span style="font-size:13px; font-weight: 300;" class="m-2"><?= $order['tracking_id'] ?></span><br/>
                                    <span style="font-size:20px; font-weight:600;">Tracking URL :</span><span style="font-size:13px; font-weight: 300;" class="m-2"><a href="<?= $order['tracking_url'] ?>"><?= $order['tracking_url'] ?></a></span>
                                </div>
                            </div>
            				<div class="row">
            					<div class="col-md-9">
            						<div class="card" style="padding:0px">
            							<div class="card-header">
            								<h5 class="h4 mb-0">Order Details</h5>
            							</div>
            							<div class="card-body" style="overflow: auto;">
            								<table class="aiz-table table footable footable-1 breakpoint-xl">
            									<thead>
            										<tr class="footable-header">
            											<th class="footable-first-visible" style="font-size:15px; display: table-cell;">#</th>
            											<th class="noPrint" style="font-size:15px; display: table-cell;">Product Image</th>
            											<th style="font-size:15px; display: table-cell;">Product Name</th>
            											<th style="font-size:15px; display: table-cell;">Quantity</th>
            											<th style="font-size:15px; display: table-cell;">Price</th>
            											<th style="font-size:15px; display: table-cell;">GST</th>
            											<th style="font-size:15px; display: table-cell;">Total</th>
            										</tr>
            									</thead>
            									<tbody>
            										<?php
            										$i = 1;
            										foreach ($items as $item) {
            										?>
            											<tr>
            												<td class="footable-first-visible" style="font-size:15px;display: table-cell;"><?= $i++; ?></td>
            												<td class="noPrint" style="display: table-cell;">
            													<img src="<?=base_url('assets/front/images/' . $item['image']); ?>" width=150px />
            												</td>
            												<td  style="font-size:15px;display: table-cell;">
            												    <?= $item['name'] ?>
            												</td>
            												<td style="font-size:15px; display: table-cell;">
            													<?= $item['qty'] ?>
            												</td>
            												<td style="font-size:15px; display: table-cell;"><?=($order['currency']=='USD') ? "$ ".$item['price']*0.82 : "₹ ".$item['price']*0.82;?></td>
            												<td style="font-size:15px; display: table-cell;"><?=($order['currency']=='USD') ? "$ ".$item['price']*0.18 : "₹ ".$item['price']*0.18;?></td>
            												<td style="font-size:15px; display: table-cell;"><?=($order['currency']=='USD') ? "$ ".$item['price']: "₹ ".$item['price'];?></td>
            												
            											</tr>
            										<?php } ?>
            									</tbody>
            								</table>
            							</div>
            						</div>
            					</div>
            					<div class="col-md-3">
            						<div class="card">
            							<div class="card-header">
            								<b class="fs-15" style="font-size:15px;">Order Amount</b>
            							</div>
            							<div class="card-body pb-0">
            								<table class="table-borderless table">
            									<tbody>
            										<tr>
            											<td class="w-50 fw-600" style="font-size:15px;">Subtotal</td>
            											<td class="text-right">
            												<span style="font-size:15px;" class="strong-600"><?=($order['currency']=='USD') ? "$ ": "₹ ";?> <?= ($order['totalAmount'] - $order['totalShipping'] + $order['totalDiscount']) * 0.82 ?></span>
            											</td>
            										</tr>
            										<tr>
            											<td class="w-50 fw-600" style="font-size:15px;">GST</td>
            											<td class="text-right">
            												<span class="text-italic" style="font-size:15px;"><?=($order['currency']=='USD') ? "$ ": "₹ ";?> <?= ($order['totalAmount'] - $order['totalShipping'] + $order['totalDiscount']) * 0.18 ?></span>
            											</td>
            										</tr>
            										<tr>
            											<td class="w-50 fw-600" style="font-size:15px;">Shipping</td>
            											<td class="text-right">
            												<span class="text-italic" style="font-size:15px;"><?=($order['currency']=='USD') ? "$ ": "₹ ";?> <?= $order['totalShipping'] ?></span>
            											</td>
            										</tr>
            										<tr>
            											<td class="w-50 fw-600" style="font-size:15px;">Discount</td>
            											<td class="text-right">
            												<span class="text-italic" style="font-size:15px;"> <?=($order['currency']=='USD') ? "$ ": "₹ ";?><?= $order['totalDiscount'] ?></span>
            											</td>
            										</tr>
            										<tr>
            											<td class="w-50 fw-600" style="font-size:15px;">Total</td>
            											<td class="text-right">
            												<strong><span style="font-size:15px;"><?=($order['currency']=='USD') ? "$ " . $order['totalAmount'] : "₹ " . $order['totalAmount'] ;?></span></strong>
            											</td>
            											
            										</tr>
            										<tr class="Print">
            										    <td class="w-50 fw-600" style="font-size:15px;"> </td>
            										    <td class="text-right">
            										        <strong><span style="font-size:15px;"><?php $f = new NumberFormatter("EN", NumberFormatter::SPELLOUT); ?>
            												<?= ucfirst($f->format($order['totalAmount'])); ?></span></strong>
            											</td>
            										</tr>
            									</tbody>
            								</table>
            							</div>
            						</div>
            					</div>
            				</div>

	<div class="noPrint">
		<form method="post" action="">
			<input type="hidden" value="<?= $order['order_id'] ?>" name="order_id">
			<div class="col-12 col-sm-6 mt-3 mt-sm-0">
				<div class="input-group input-group-static m-2">
					<label for="status">Parent Category</label>
					<select class="form-control" id="" name="status" required>
						<option value="<?= $order['status'] ?>" disabled selected>Status is <?= $order['status'] ?></option>
						<?php if ($order['status'] == "Pending") { ?>
							<!--<option value="Pending">Pending</option>-->
							<option value="Confirm">Confirm</option>
							<option value="Dispatch">Dispatch</option>
							<!--<option value="Transit">Transit</option>-->
							<option value="Delivered">Delivered</option>
							<option value="Cancelled">Cancelled</option>
						<?php } else if ($order['status'] == "Confirm") { ?>
							<!--<option value="Confirm">Confirm</option>-->
							<option value="Dispatch">Dispatch</option>
							<!--<option value="Transit">Transit</option>-->
							<option value="Delivered">Delivered</option>
							<option value="Cancelled">Cancelled</option>
						<?php } else if ($order['status'] == "Dispatch") { ?>
							<!--<option value="Dispatch">Dispatch</option>-->
							<!--<option value="Transit">Transit</option>-->
							<option value="Delivered">Delivered</option>
							<option value="Cancelled">Cancelled</option>
						<?php } else if ($order['status'] == "Transit") { ?>
							<option value="Transit">Transit</option>
							<option value="Delivered">Delivered</option>
							<option value="Cancelled">Cancelled</option>
						<?php } else if ($order['status'] == "Delivered") { ?>
							<!--<option value="Delivered">Delivered</option>-->
						<?php } else if ($order['status'] == "Cancelled") { ?>
							<!--<option value="Cancelled">Cancelled</option>-->
						<?php } ?>
					</select>
				</div>
			</div>
			<?php if ($order['status'] == "Confirm" || $order['status'] == "Dispatch" || $order['status'] == "Delivered") { ?>
			<div class="input-group input-group-static m-2">
                <label for="tracking_id">Tracking Id *</label>
                <input class="form-control" type="text" value="<?= $order['tracking_id'] ?>" name="tracking_id">
            </div>
            <div class="input-group input-group-static m-2">
                <label for="tracking_url">Tracking URL </label>
                <input class=" form-control" type="text" value="<?= $order['tracking_url'] ?>" name="tracking_url">
            </div>
            <?php } ?>
			<button type="submit" class="btn btn-primary w-20 mt-5">Submit</button>
		</form>
	</div>
</div>
</main>

<?php include("footer.php"); ?>