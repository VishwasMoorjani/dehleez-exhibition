<?php include('header.php'); ?>

<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Blog</h1>
                <h5><a href="<?=base_url();?>">Home</a> /
                    <span>Blog</span>
                </h5>
            </div>
        </div>
    </div>
</section>




<section id="blogdetails">
    <div class="container">
        <div class="row">

            <div class="col-lg-8">
                <div class="blogdetailcontent">
                    <img src="<?=base_url('assets/front/images/'.$blog['image']);?>" alt="">

                    <h4><?=$blog['post_title']?></h4>
                    <?=$blog['post']?>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="latest-blog">
                    <h4>Latest Posts</h4>
                    <ul>
                        <?php foreach($blogs as $latest){ ?>
                        <li>
                            <a class="newpost" href="<?=base_url('blog/'.$latest['link']);?>">
                                <img src="<?=base_url('assets/front/images/'.$latest['image']);?>" alt="">
                                <div class="blogname">
                                    <h5><?=$latest['post_title']?></h5>
                                    <p><?=date("d F Y",strtotime($latest['date_added']))?></p>
                                </div>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>

                <div class="blog-categories">
                    <h4>Categories</h4>
                    <ul>
                        <?php foreach($categories as $category){ ?>
                        <li><a href="<?=base_url('blog/category/'.$category['link']);?>"><?=$category['name']?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <!--  -->

        </div>
    </div>
</section>



<?php include('footer.php'); ?>