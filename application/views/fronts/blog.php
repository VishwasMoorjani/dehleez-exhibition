<?php include('header.php'); ?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?=$title?></h1>
                <h5><a href="<?=base_url();?>">Home</a> /
                    <span>Blog</span>
                </h5>
            </div>
        </div>
    </div>
</section>

<section id="blog">
    <div class="container">
        <H5>Our Blog</H5>
        <h2>Latest Blog & Articles</h2>
        <div class="row justify-content-center">

            <div class="col-lg-8 col-md-8">
                <div class="row">
                    <?php foreach($blogs as $blog){ ?>
                    <div class="col-md-6">
                        <div class="blog-inr">
                            <div class="imgsc">
                                <a href="<?=base_url('blog/'.$blog['link']);?>">
                                    <img src="<?=base_url('assets/front/images/'.$blog['image'])?>" alt="">
                                </a>
                            </div>
                            <div class="content">
                                <h4><a href="<?=base_url('blog/'.$blog['link']);?>"><?=$blog['post_title']?></a></h4>
                                <p><?php $this->load->helper('text'); echo word_limiter(strip_tags($blog['post']), 10); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>


            <div class="col-lg-4 col-md-6">
                <div class="blog-categories">
                    <h4>Categories</h4>
                    <ul>
                        <?php foreach($categories as $category){ ?>
                        <li><a href="<?=base_url('blog/category/'.$category['link']);?>"><?=$category['name']?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>


        </div>

    </div>
</section>



<?php include('footer.php'); ?>