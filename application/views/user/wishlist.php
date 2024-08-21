<?php
$title = "Pranshi Creations";
$description = "";
$keyword = "";
include('header.php'); ?>



<!-- heading -->
<section id="heading">
    <div class="container">
        <h2>Wishlist</h2>
        <p><a href="<?=base_url();?>"><i class="fa-solid fa-house"></i> Home</a> <i class="fa-solid fa-angles-right"></i> Wishlist</p>
    </div>
</section>


<!-- wishlist -->
<section id="wishlist">
    <div class="container">
        <h3><i class="fa-regular fa-heart"></i></h3>
        <h2>My Wishlist</h2>

        <div class="table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr style="text-align: center;">
                        <th></th>
                        <th></th>
                        <th>Product</th>
                        <th>Price</th>
                        <!-- <th>Stock Status</th> -->
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wishlist as $wishlists) { ?>
                        <tr style="text-align: center; vertical-align: middle;">
                            <td><a href="<?=base_url('user/removewishlist/'.$wishlists['productslug'])?>" class="delet"><i class="fa-solid fa-trash-can"></i></a></td>
                            <td><a href="#" class="imgsc"><img src="<?= base_url('assets/front/images/' . $wishlists['image']); ?>" width="50" alt=""></a></td>
                            <td><a href="#"><?=$wishlists['name'] ?></a></td>
                            <td>₹<?=$wishlists['mrp'] ?></td>
                            <!-- <td>In Stock</td> -->
                            <td class="btn2"><a href="#"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</a></td>
                        </tr>
                    <?php } ?>
                    <!-- <tr style="text-align: center; vertical-align: middle;">
                        <td><a href="#" class="delet"><i class="fa-solid fa-trash-can"></i></a></td>
                        <td><a href="#" class="imgsc"><img src="assets/front/images/category1.jpg" width="50" alt=""></a></td>
                        <td><a href="#">Sharara Dupatta</a></td>
                        <td>₹1850</td>
                        <td>In Stock</td>
                        <td class="btn2"><a href="#"> <button type="button" class="btn btn1 px-4"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button></a></td>
                    </tr>

                    <tr style="text-align: center; vertical-align: middle;">
                        <td><a href="#" class="delet"><i class="fa-solid fa-trash-can"></i></a></td>
                        <td><a href="#" class="imgsc"><img src="assets/front/images/category1.jpg" width="50" alt=""></a></td>
                        <td><a href="#">Peplum Kurta</a></td>
                        <td>₹1620</td>
                        <td>In Stock</td>
                        <td class="btn2"><a href="#"> <button type="button" class="btn btn1 px-4"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button></a></td>
                    </tr>

                    <tr style="text-align: center; vertical-align: middle;">
                        <td><a href="#" class="delet"><i class="fa-solid fa-trash-can"></i></a></td>
                        <td><a href="#" class="imgsc"><img src="assets/front/images/category1.jpg" width="50" alt=""></a></td>
                        <td><a href="#">Fern Kurta</a></td>
                        <td>₹1680</td>
                        <td>In Stock</td>
                        <td class="btn2"> <a href="#"> <button type="button" class="btn btn1 px-4"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button></a></td>
                    </tr>

                    <tr style="text-align: center; vertical-align: middle;">
                        <td><a href="#" class="delet"><i class="fa-solid fa-trash-can"></i></a></td>
                        <td><a href="#" class="imgsc"><img src="assets/front/images/category1.jpg" width="50" alt=""></a></td>
                        <td><a href="#">Peplum Kurta</a></td>
                        <td>₹1620</td>
                        <td>In Stock</td>
                        <td class="btn2"><a href="#"> <button type="button" class="btn btn1 px-4"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button></a></td>
                    </tr>

                    <tr style="text-align: center; vertical-align: middle;">
                        <td><a href="#" class="delet"><i class="fa-solid fa-trash-can"></i></a></td>
                        <td><a href="#" class="imgsc"><img src="assets/front/images/category1.jpg" width="50" alt=""></a></td>
                        <td><a href="#">Fern Kurta</a></td>
                        <td>₹1680</td>
                        <td>In Stock</td>
                        <td class="btn2"> <a href="#"> <button type="button" class="btn btn1 px-4"><i class="fa-solid fa-cart-shopping"></i> Add to Cart</button></a></td>
                    </tr> -->

                </tbody>
            </table>
        </div>

    </div>
</section>



<!-- footer -->

<?php include('footer.php'); ?>