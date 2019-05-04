<!-- Admatic masthead 970x250 Ad Code START -->
<?php admaticHeader(); ?>
<!-- Admatic masthead 970x250 Ad Code END -->

<!-- ****** Welcome Post Area Start ****** -->
<!-- ****** Blog Area Start ****** -->
<section class="blog_area section_padding_0_80 my-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="row">
                    <?php include "_postsList.php"; ?>
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
                        <?php
                        $sql_list=dbAboutList();
                        $sql_list=$con->query($sql_list);
                        if($sql_list->num_rows>0)
                        {
                          while ($row=$sql_list->fetch_assoc()) {
                            $about_name=$row['about_NAME'];
                            $about_job=$row['about_JOB'];
                            $about_image=$row['about_IMAGE'];
                            $about_short=$row['about_SHORT'];
                         ?>
                        <div class="about-me-widget-thumb">
                            <img src="<?php echo $about_image; ?>" alt="">
                        </div>
                        <h4 class="font-shadow-into-light"><?php echo $about_name ?></h4>
                        <p><?php echo $about_short; ?></p>
                      <?php }} ?>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area subscribe_widget text-center">
                        <div class="widget-title">
                            <h6>Abone ol &amp; Takip et</h6>
                        </div>
                        <div class="subscribe-link">
                          <?php
                          $sql_list=dbmyAdminSocialMediaList();
                          $sql_list=$con->query($sql_list);
                          if($sql_list->num_rows>0)
                          {
                            while ($row=$sql_list->fetch_assoc()) {
                              $socialmedia_name=$row['socialmedia_NAME'];
                              $socialmedia_url=$row['socialmedia_URL'];
                           ?>
                            <a href="<?php echo $socialmedia_url; ?>"><i class="fa fa-<?php echo $socialmedia_name;?> fa-2x" aria-hidden="true"></i></a>
                          <?php }} ?>
                        </div>
                    </div>
                    <!-- Single Widget Area -->
                    <div class="single-widget-area add-widget text-center">
                          <?php adsense_esnek(); ?>
                    </div>
                    <!-- Single Widget Area -->
                    <div class='single-widget-area popular-post-widget'>
                        <div class='widget-title text-center'>
                            <h6>Popüler Yazılar</h6>
                        </div>
                        <?php
                          $pop_list=dbmyPopulerPostsList();
                          $pop_list =$con->query($pop_list);
                          if($pop_list->num_rows>0)
                          {
                            while ($row=$pop_list->fetch_assoc()) {
                              if($row['post_HIDE']=='on'){
                                continue;
                              }
                              $post_title=$row['post_TITLE'];
                              $post_date=$row['post_DATE'];
                              $post_url=$row['post_URL'];
                              $post_image=$row['post_IMAGE'];
                         ?>
                        <!-- Single Popular Post -->
                        <div class='single-populer-post d-flex'>
                            <img style=height:50px src='<?php echo substr($post_image,3,500); ?>' alt='<?php echo $title; ?>'>
                            <div class='post-content'>
                                <a href='<?php echo $post_url; ?>'>
                                    <h3 style='font-size:15px'><?php echo $post_title; ?></h3>
                                </a>
                                <p><?php $date=explode('.',$post_date);echo getMonth($date[1]).' '.$date[0].', '.substr($date[2],0,4); ?></p>
                            </div>
                        </div>
                      <?php }} ?>
                    <!-- Single Widget Area -->
                    <div class="single-widget-area add-widget text-center">
                          <?php adsense_esnek(); ?>
                    </div>

                    <!-- Single Widget Area -->
                    <div class="single-widget-area newsletter-widget">
                        <div class="widget-title text-center">
                            <h6>Bülten</h6>
                        </div>
                        <p>Bültenimize abone olun; yeni güncellemeler, indirimler, vb. hakkında bildirim alın.</p>
                        <div class="newsletter-form">
                            <form action="" method="post">
                                <input type="email" required name="newsletter-email" id="email" placeholder="Email adresiniz">
                                <button type="submit" name="btnnews"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                            </form>
                            <?php
                                newspaper();
                             ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ****** Blog Area End ****** -->
