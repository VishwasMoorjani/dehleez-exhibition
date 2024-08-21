<?php include('header.php'); ?>

<!-- Banners -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title"><?=$page['title']?></h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Banners -->

<!-- Ongoing Event -->
<section class="our_articles single_article">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <?=$page['content']?>
            </div>


        </div>
    </div>
</section>
<!-- / Ongoing Event -->


<?php include('footer.php'); ?>