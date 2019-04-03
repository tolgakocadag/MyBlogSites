<!-- ****** Welcome Post Area Start ****** -->
<!-- ****** Blog Area Start ****** -->
<section class="blog_area section_padding_0_80 my-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row">
<!--TEKLİ SİNGLE POST-->
                    <!-- Single Post -->
                    <!--POST LİSTELEME-->
                    <?php
                    $sql_list=dbHomePostList(1);
                    $sql_list=$con->query($sql_list);
                    if($sql_list->num_rows>0)
                    {
                      while ($row=$sql_list->fetch_assoc()) {
                        $post_id=$row['post_ID'];
                        $post_title=$row['post_TITLE'];
                        $post_date=$row['post_DATE'];
                        $post_author=$row['post_AUTHOR'];
                        $post_content=$row['post_CONTENT'];
                        $post_like_count=$row['post_LIKE_COUNT'];
                        $post_comment_count=$row['post_COMMENT_COUNT'];
                        ?>
                    <div class="col-12">
                        <div class="single-post wow fadeInUp" data-wow-delay=".0s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="img/blog-img/1.jpg" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">

                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="#"><?php echo $post_author;?></a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?php $date=explode(".",$post_date);echo getMonth($date[1])." ".$date[0].", ".substr($date[2],0,4); ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Favourite -->
                                        <div class="post-favourite">
                                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo $post_like_count; ?></a>
                                        </div>
                                        <!-- Post Comments -->
                                        <div class="post-comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo $post_comment_count; ?></a>
                                        </div>
                                        <!-- Post Share -->
                                        <div class="post-share">
                                            <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <h2 class="post-headline"><?php echo $post_title; ?></h2>
                                </a>
                                <p><?php echo $post_content; ?></p>
                                <a href="#" class="read-more">Okumaya devam et...</a>
                            </div>
                        </div>
                    </div>
                  <?php }} ?>
<!--TEKLİ SİNGLE POST FINISH-->
<!--4 LÜ GRUP -->
                    <!-- Single Post -->
                    <!--POST LİSTELEME-->
                    <?php
                    $sql_list=dbHomePostList(5);
                    $sql_list=$con->query($sql_list);
                    $last_post_hidden=0;
                    if($sql_list->num_rows>0)
                    {
                      while ($row=$sql_list->fetch_assoc()) {
                        if($last_post_hidden==0){
                          $last_post_hidden++;continue;
                        }
                        $post_id=$row['post_ID'];
                        $post_title=$row['post_TITLE'];
                        $post_date=$row['post_DATE'];
                        $post_author=$row['post_AUTHOR'];
                        $post_like_count=$row['post_LIKE_COUNT'];
                        $post_comment_count=$row['post_COMMENT_COUNT'];
                      ?>
                    <div class="col-12 col-md-6">
                        <div class="single-post wow fadeInUp" data-wow-delay="0s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="img/blog-img/5.jpg" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="#"><?php echo $post_author; ?></a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?php $date=explode(".",$post_date);echo getMonth($date[1])." ".$date[0].", ".substr($date[2],0,4); ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Favourite -->
                                        <div class="post-favourite">
                                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo $post_like_count; ?></a>
                                        </div>
                                        <!-- Post Comments -->
                                        <div class="post-comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo $post_comment_count; ?></a>
                                        </div>
                                        <!-- Post Share -->
                                        <div class="post-share">
                                            <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <?php
                                        if(titleSize($post_title)==18){
                                          echo "<h2 class='post-headline' style='font-size:20px;'>{$post_title}</h2>";
                                        }
                                        elseif (titleSize($post_title)==80) {
                                          $sub_title=substr($post_title,0,70);
                                          echo "<h2 class='post-headline' style='font-size:20px;'>{$sub_title}...</h2>";
                                        }
                                        else {
                                          echo "<h2 class='post-headline'>{$post_title}</h2>";
                                        }
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                  <?php }} ?>;
<!--4LÜ GRUP FINISH-->
                    <!-- ******* List Blog Area Start ******* -->
<!--4LÜ COLOMN  GRUP-->
                    <!-- Single Post -->
                    <!--POST LİSTELEME-->
                    <?php
                    $sql_list=dbHomePostList(9);
                    $sql_list=$con->query($sql_list);
                    $last_post_hidden=0;
                    if($sql_list->num_rows>0)
                    {
                      while ($row=$sql_list->fetch_assoc()) {
                        if($last_post_hidden<5){
                          $last_post_hidden++;continue;
                        }
                        $post_id=$row['post_ID'];
                        $post_title=$row['post_TITLE'];
                        $post_date=$row['post_DATE'];
                        $post_author=$row['post_AUTHOR'];
                        $post_content=$row['post_CONTENT'];
                        $post_like_count=$row['post_LIKE_COUNT'];
                        $post_comment_count=$row['post_COMMENT_COUNT'];
                        ?>
                    <div class="col-12">
                        <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay="0.1s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="img/blog-img/6.jpg" alt="">
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="#"><?php echo $post_author; ?></a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?php $date=explode(".",$post_date);echo getMonth($date[1])." ".$date[0].", ".substr($date[2],0,4); ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Favourite -->
                                        <div class="post-favourite">
                                            <a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i> <?php echo $post_like_count; ?></a>
                                        </div>
                                        <!-- Post Comments -->
                                        <div class="post-comments">
                                            <a href="#"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo $post_comment_count; ?></a>
                                        </div>
                                        <!-- Post Share -->
                                        <div class="post-share">
                                            <a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                  <?php
                                      if(titleSize($post_title)==18){
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$post_title}</h2>";
                                      }
                                      elseif (titleSize($post_title)==80) {
                                        $sub_title=substr($post_title,0,70);
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$sub_title}...</h2>";
                                      }
                                      else {
                                        echo "<h2 class='post-headline'>{$post_title}</h2>";
                                      }
                                  ?>
                                </a>
                                <p><?php echo $post_content; ?></p>
                                <a href="#" class="read-more">Okumaya devam et...</a>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
<!--4LÜ COLOMN  GRUP FINISH-->
                </div>
              </div>

            <!-- ****** Blog Sidebar ****** -->
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                <div class="blog-sidebar mt-5 mt-lg-0">
                    <!-- Single Widget Area -->
                    <div class="single-widget-area about-me-widget text-center">
                        <div class="widget-title">
                            <h6>Hakkımda</h6>
                        </div>
                        <div class="about-me-widget-thumb">
                            <img src="img/about-img/pp.jpg" alt="">
                        </div>
                        <h4 class="font-shadow-into-light">Tolga Kocadağ</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area subscribe_widget text-center">
                        <div class="widget-title">
                            <h6>Abone ol &amp; Takip et</h6>
                        </div>
                        <div class="subscribe-link">
                            <a href="https://www.facebook.com/tolgakocadag58"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/tolgakocadag58"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
                            <a href="https://www.github.com/tolgakocadag"><i class="fa fa-github fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area popular-post-widget">
                        <div class="widget-title text-center">
                            <h6>Popüler Yazılar</h6>
                        </div>
                        <!-- Single Popular Post -->
                        <div class="single-populer-post d-flex">
                            <img src="img/sidebar-img/1.jpg" alt="">
                            <div class="post-content">
                                <a href="#">
                                    <h6>Top Wineries To Visit In England</h6>
                                </a>
                                <p>Tuesday, October 3, 2017</p>
                            </div>
                        </div>
                        <!-- Single Popular Post -->
                        <div class="single-populer-post d-flex">
                            <img src="img/sidebar-img/2.jpg" alt="">
                            <div class="post-content">
                                <a href="#">
                                    <h6>The 8 Best Gastro Pubs In Bath</h6>
                                </a>
                                <p>Tuesday, October 3, 2017</p>
                            </div>
                        </div>
                        <!-- Single Popular Post -->
                        <div class="single-populer-post d-flex">
                            <img src="img/sidebar-img/3.jpg" alt="">
                            <div class="post-content">
                                <a href="#">
                                    <h6>Zermatt Unplugged the best festival</h6>
                                </a>
                                <p>Tuesday, October 3, 2017</p>
                            </div>
                        </div>
                        <!-- Single Popular Post -->
                        <div class="single-populer-post d-flex">
                            <img src="img/sidebar-img/4.jpg" alt="">
                            <div class="post-content">
                                <a href="#">
                                    <h6>Harrogate's Top 10 Independent Eats</h6>
                                </a>
                                <p>Tuesday, October 3, 2017</p>
                            </div>
                        </div>
                        <!-- Single Popular Post -->
                        <div class="single-populer-post d-flex">
                            <img src="img/sidebar-img/5.jpg" alt="">
                            <div class="post-content">
                                <a href="#">
                                    <h6>Eating Out On A Budget In Oxford</h6>
                                </a>
                                <p>Tuesday, October 3, 2017</p>
                            </div>
                        </div>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area add-widget text-center">
                        <div class="add-widget-area">
                            <img src="img/sidebar-img/6.jpg" alt="">
                            <div class="add-text">
                                <div class="yummy-table">
                                    <div class="yummy-table-cell">
                                        <h2>Cooking Book</h2>
                                        <p>Buy Book Online Now!</p>
                                        <a href="#" class="add-btn">Buy Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area newsletter-widget">
                        <div class="widget-title text-center">
                            <h6>Bülten</h6>
                        </div>
                        <p>Bültenimize abone olun; yeni güncellemeler, indirimler, vb. hakkında bildirim alın.</p>
                        <div class="newsletter-form">
                            <form action="#" method="post">
                                <input type="email" name="newsletter-email" id="email" placeholder="Email adresiniz">
                                <button type="submit"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** Blog Area End ****** -->

<!-- ****** Instagram Area Start ****** -->
<div class="instargram_area owl-carousel section_padding_100_0 clearfix" id="portfolio">

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="img/instagram-img/1.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="img/instagram-img/2.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="img/instagram-img/3.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="img/instagram-img/4.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="img/instagram-img/5.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="img/instagram-img/6.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="img/instagram-img/1.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Instagram Item -->
    <div class="instagram_gallery_item">
        <!-- Instagram Thumb -->
        <img src="img/instagram-img/2.jpg" alt="">
        <!-- Hover -->
        <div class="hover_overlay">
            <div class="yummy-table">
                <div class="yummy-table-cell">
                    <div class="follow-me text-center">
                        <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i> Follow me</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ****** Our Creative Portfolio Area End ****** -->
