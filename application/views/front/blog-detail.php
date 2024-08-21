<?php include('header.php'); ?>

<!-- Banners -->
<section class="inner-pages text-center">
    <div class="container">
        <div class="white_text div_zindex">
            <h1 class="page_title"><?=$blog['post_title']?></h1>
        </div>
    </div>
    <div class="dark-overlay"></div>
</section>
<!-- /Banners -->

<!-- Our Articles -->
<section class="our_articles single_article">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- article-1 -->
                <article class="blog_wrap view_one">
                    <div class="blog_meta">
                        <p>Posted on <strong><?php $date=date_create($blog['date_added']); echo date_format($date, "F d, Y")?></strong></p>
                        <!-- <div class="inline-div btn-group-xs categories_in">
                            <a href="#" class="btn btn-xs">Special Events</a>
                            <a href="#" class="btn btn-xs">Trends</a>
                            <a href="#" class="btn btn-xs">Events</a>
                        </div> -->
                    </div>
                    <h3><?=$blog['post_title']?></h3>
                    <div class="blog_img margin-btm-20">
                        <img style="width: 100%; height: 500px; object-fit: cover;" src="<?=base_url('assets/front/images/'.$blog['image']);?>" class="img-fluid" alt="image">
                    </div>

                    <?=$blog['post']?>

                    <!-- <div class="article_tag gray-bg">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h6>Tags:</h6>
                                <div class="tag_list btn-group-xs">
                                    <a href="#" class="btn btn-xs">Special Events</a>
                                    <a href="#" class="btn btn-xs">Trends</a>
                                    <a href="#" class="btn btn-xs">Events</a>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6">
                                <div class="share_article ">
                                    <h6>Share:</h6>
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> -->

                </article>

                <!--Comments-->
                <!-- <div class="articale_comments">
                    <div id="comments">
                        <h5 class="block-head">3 Comments</h5>
                        <ul class="commentlist">
                            <li class="comment">
                                <div class="comment-body">
                                    <div class="comment-author">
                                        <img class="avatar" src="assets/images/comment-author-1.jpg" class="img-fluid"
                                            alt="image">
                                        <span class="fn">DereckNency Paul</span>
                                    </div>
                                    <div class="comment-meta commentmetadata"> <a href="#">july 23, 2021 at 12:52 pm</a>
                                    </div>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                        dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
                                        exercitationem</p>
                                    <div class="reply">
                                        <a href="#" class="btn-link"><i class="fa fa-reply" aria-hidden="true"></i>
                                            Reply</a>
                                    </div>
                                </div>
                            </li>

                            <li class="comment">
                                <div class="comment-body">
                                    <div class="comment-author">
                                        <img class="avatar" src="assets/images/comment-author-2.jpg" class="img-fluid"
                                            alt="image">
                                        <span class="fn">John Smith</span>
                                    </div>
                                    <div class="comment-meta commentmetadata"> <a href="#">july 23, 2021 at 12:52 pm</a>
                                    </div>
                                    <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur,
                                        adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et
                                        dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum
                                        exercitationem</p>
                                    <div class="reply">
                                        <a href="#" class="btn-link"><i class="fa fa-reply" aria-hidden="true"></i>
                                            Reply</a>
                                    </div>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="comment-body">
                                            <div class="comment-author">
                                                <img class="avatar" src="assets/images/comment-author-3.jpg"
                                                    class="img-fluid" alt="image">
                                                <span class="fn">John Smith</span>
                                            </div>
                                            <div class="comment-meta commentmetadata"> <a href="#">july 23, 2021 at
                                                    12:52 pm</a> </div>
                                            <p>Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                                consectetur, adipisci velit, sed quia non numquam eius modi tempora
                                                incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim
                                                ad minima veniam, quis nostrum exercitationem</p>
                                            <div class="reply">
                                                <a href="#" class="btn-link"><i class="fa fa-reply"
                                                        aria-hidden="true"></i> Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div> -->


                <!--Comments-Form-->
                <!-- <div class="comment-respond">
                    <h5 class="block-head">Leave A Comment</h5>
                    <form action="#" method="get" class="comment-form">
                        <div class="form-group">
                            <input name="" type="text" class="form-control" placeholder="Full Name">
                        </div>

                        <div class="form-group">
                            <input name="" type="email" class="form-control" placeholder="Email Address">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" name="" cols="" rows="4" placeholder="Comment"></textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn" type="submit">Post Comment</button>
                        </div>
                    </form>
                </div> -->
            </div>


            <!-- Sidebar -->
            <aside class="col-md-4">
                <div class="sidebar_wrap">
                    <!-- <div class="sidebar_widgets">
                        <div class="widget_title white_text secondary-bg">
                            <h6><i class="fa fa-search" aria-hidden="true"></i> Search Posts</h6>
                        </div>
                        <div class="search_post">
                            <form action="#" method="get">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </div> -->

                    <div class="sidebar_widgets">
                        <div class="widget_title white_text secondary-bg">
                            <h6><i class="fa fa-file-text-o" aria-hidden="true"></i> Popular Posts</h6>
                        </div>
                        <div class="popular_post">
                            <ul class="list-style-none">
                                <?php foreach($recentblogs as $recentblog){ ?>
                                <li>
                                    <div class="widget_post_img">
                                        <a href="<?=base_url('blog/'.$recentblog['link'])?>"><img src="<?=base_url('assets/front/images/'.$recentblog['image']);?>" class="img-fluid"
                                                alt="image"></a>
                                    </div>
                                    <div class="widget_post_info">
                                        <h6><a href="<?=base_url('blog/'.$recentblog['link'])?>"><?=$recentblog['post_title']?></a></h6>
                                    </div>
                                </li>
                                <?php } ?>
                                <!-- <li>
                                    <div class="widget_post_img">
                                        <a href="#"><img src="assets/images/blog_800x510_2.jpg" class="img-fluid"
                                                alt="image"></a>
                                    </div>
                                    <div class="widget_post_info">
                                        <h6><a href="#">How To Get Started In Event Planning</a></h6>
                                    </div>
                                </li>
                                <li>
                                    <div class="widget_post_img">
                                        <a href="#"><img src="assets/images/blog_800x510_3.jpg" class="img-fluid"
                                                alt="image"></a>
                                    </div>
                                    <div class="widget_post_info">
                                        <h6><a href="#">The Standard chunk of Lorem Ipsum </a></h6>
                                    </div>
                                </li> -->
                                <!-- <li>
                                    <div class="widget_post_img">
                                        <a href="#"><img src="assets/images/blog_800x510_4.jpg" class="img-fluid"
                                                alt="image"></a>
                                    </div>
                                    <div class="widget_post_info">
                                        <h6><a href="#">How To Build Your Event Brand</a></h6>
                                    </div>
                                </li> -->
                            </ul>
                        </div>
                    </div>

                    <!-- <div class="sidebar_widgets">
                        <div class="widget_title white_text secondary-bg">
                            <h6><i class="fa fa-file-text-o" aria-hidden="true"></i> Categories</h6>
                        </div>
                        <div class="blog_categories">
                            <ul class="list-style-none">
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Special Events</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Unique Venues</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Fresh Event
                                        Tips</a></li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Event Marketing</a>
                                </li>

                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Event Planning</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Family Events</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Special Events</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Unique Venues</a>
                                </li>
                                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i> Fresh Event
                                        Tips</a></li>
                            </ul>
                        </div>
                    </div> -->
                </div>
            </aside>

        </div>
    </div>
</section>
<!-- /Our Articles -->


<?php include('footer.php'); ?>