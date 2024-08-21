<?php include('header.php'); ?>

<!-- Banners -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title">Event Industry Latest Updates</h1>
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
            <?php foreach($blogs as $blog){ ?>
            <article class="col-md-4 col-sm-4 blog_wrap">
                <div class="blog_img margin-btm-20">
                    <a href="<?=base_url('blog/'.$blog['link'])?>"><img style="width: 100%; height: 300px; object-fit: cover;" src="<?=base_url('assets/front/images/'.$blog['image']);?>" class="img-fluid" alt="image"></a>
                </div>
                <div class="blog_meta">
                    <p><?php $date=date_create($blog['date_added']); echo date_format($date, "F d, Y")?></p>
                </div>
                <h5><a href="<?=base_url('blog/'.$blog['link'])?>"><?=$blog['post_title']?></a></h5>
                <?php $this->load->helper('text'); echo word_limiter($blog['post'],20); ?>
            </article>
            <?php } ?>
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

            <!-- article-3 -->
            <!-- <article class="col-md-4 col-sm-4 blog_wrap">
                <div class="blog_img margin-btm-20">
                    <a href="#"><img src="assets/images/blog_800x510_2.jpg" class="img-fluid" alt="image"></a>
                </div>
                <div class="blog_meta">
                    <p>Posted on july 30, 2021</p>
                </div>
                <h5><a href="#">The standard chunk of Lorem Ipsum used since</a></h5>
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