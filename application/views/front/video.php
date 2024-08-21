<?php include('header.php'); ?>

<!-- Banners -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">Video Gallery</h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Banners -->

<!-- Our-Blog -->
<section class="our_articles grid_view">
    <div class="container">
        <div class="row">
            <!-- article-1 -->
            <?php foreach($videos as $video){ ?>
            <article class="col-md-3 col-sm-4 blog_wrap">
                <div class="blog_img margin-btm-20">
                <iframe class="resvideo" width="100%" src="https://www.youtube.com/embed/<?=$video['image'];?>" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                    <!-- <a href="#"><img src="<?=base_url("assets/front/images/".$gallery['image']);?>" class="img-fluid" alt="image"></a> -->
                </div>
            </article>
            <?php } ?>
            <!-- <article class="col-md-3 col-sm-4 blog_wrap">
                <div class="blog_img margin-btm-20">
                    <a href="#"><img src="<?=base_url("assets/front/images/speaker_img4.jpg");?>" class="img-fluid" alt="image"></a>
                </div>
            </article> -->
           
           
            
          

            <!-- article-2 -->
            <!-- <article class="col-md-4 col-sm-4 blog_wrap video_post">
                <div class="blog_img margin-btm-20">
                    <iframe class="mfp-iframe" src="https://www.youtube.com/embed/rqSoXtKMU3Q" allowfullscreen></iframe>
                </div>
                <div class="blog_meta">
                    <p>Posted on july 28, 2021</p>
                </div>
                <h5><a href="#">How To Get Started In Event Planning</a></h5>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                    the industry's standard dummy text.</p>
            </article> -->

            <!-- <div class="col-md-12 text-center">
                <ul class="pagination pagination-lg">
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">6</a></li>
                </ul>
            </div> -->

        </div>
    </div>
</section>
<!-- /Our-Blog -->


<?php include('footer.php'); ?>