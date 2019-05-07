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
                        $post_explanation=$row['post_EXPLANATION'];
                        $post_content=$row['post_CONTENT'];
                        $post_hit=$row['post_HIT'];
                        $post_image=$row['post_IMAGE'];
                        $post_url=$row['post_URL'];
                        $post_url=explode(".",$post_url);
                        $post_url=$post_url[0];
                        $post_url.="";
                        ?>
                    <div class="col-12">
                        <div class="single-post wow fadeInUp" data-wow-delay=".0s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="<?php echo $post_url; ?>"><img style="height:300px;width:75%;margin-left:12%;margin-right:12%" src="<?php echo substr($post_image,3,500); ?>" alt=""></a>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">

                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="about_me"><?php echo $post_author;?></a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?php $date=explode(".",$post_date);echo getMonth($date[1])." ".$date[0].", ".substr($date[2],0,4); ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Hits -->
                                        <div class='post-comments'>
                                           <a href='<?php echo $post_url; ?>'><i class='fa fa-eye' aria-hidden='true'></i> <?php echo $post_hit; ?></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo $post_url; ?>">
                                    <h2 class="post-headline"><?php echo $post_title; ?></h2>
                                </a>
                                <p><?php echo $post_explanation; ?></p>
                                <a href="<?php echo $post_url; ?>" class="read-more">Okumaya devam et...</a>
                            </div>
                        </div>
                    </div>
                  <?php }} ?>
<!--TEKLİ SİNGLE POST FINISH-->
<?php adsense_banner(); ?>
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
                        $post_hit=$row['post_HIT'];
                        $post_image=$row['post_IMAGE'];
                        $post_url=$row['post_URL'];
                        $post_url=explode(".",$post_url);
                        $post_url=$post_url[0];
                        $post_url.="";
                      ?>
                    <div class="col-12 col-md-6 my-2">
                        <div class="single-post wow fadeInUp" data-wow-delay="0s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="<?php echo $post_url; ?>"><img style="height:150px;width:100%" src="<?php echo substr($post_image,3,500); ?>" alt=""></a>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="about_me"><?php echo $post_author; ?></a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?php $date=explode(".",$post_date);echo getMonth($date[1])." ".$date[0].", ".substr($date[2],0,4); ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Hits -->
                                        <div class='post-comments'>
                                           <a href='<?php echo $post_url; ?>'><i class='fa fa-eye' aria-hidden='true'></i> <?php echo $post_hit; ?></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo $post_url; ?>">
                                  <?php
                                      if(titleSize($post_title)==18){
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$post_title}</h2>";
                                      }
                                      elseif (titleSize($post_title)==100) {
                                        $sub_title=substr($post_title,0,93);
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$sub_title}...</h2>";
                                      }
                                      else {
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$post_title}</h2>";
                                      }
                                  ?>
                                </a>
                            </div>
                        </div>
                    </div>
                  <?php }} ?>
<!--4LÜ GRUP FINISH-->
<?php adsense_banner(); ?>
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
                        $post_hit=$row['post_HIT'];
                        $post_image=$row['post_IMAGE'];
                        $post_url=$row['post_URL'];
                        $post_url=explode(".",$post_url);
                        $post_url=$post_url[0];
                        $post_url.="";
                        ?>
                    <div class="col-12 my-2">
                        <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay="0.1s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <a href="<?php echo $post_url; ?>"><img style="height:150px;width:100%" src="<?php echo substr($post_image,3,500); ?>" alt=""></a>
                            </div>
                            <!-- Post Content -->
                            <div class="post-content">
                                <div class="post-meta d-flex">
                                    <div class="post-author-date-area d-flex">
                                        <!-- Post Author -->
                                        <div class="post-author">
                                            <a href="about_me"><?php echo $post_author; ?></a>
                                        </div>
                                        <!-- Post Date -->
                                        <div class="post-date">
                                            <a href="#"><?php $date=explode(".",$post_date);echo getMonth($date[1])." ".$date[0].", ".substr($date[2],0,4); ?></a>
                                        </div>
                                    </div>
                                    <!-- Post Comment & Share Area -->
                                    <div class="post-comment-share-area d-flex">
                                        <!-- Post Hits -->
                                        <div class='post-comments'>
                                           <a href='<?php echo $post_url; ?>'><i class='fa fa-eye' aria-hidden='true'></i> <?php echo $post_hit; ?></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="<?php echo $post_url; ?>">
                                  <?php
                                      if(titleSize($post_title)==18){
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$post_title}</h2>";
                                      }
                                      elseif (titleSize($post_title)==100) {
                                        $sub_title=substr($post_title,0,93);
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$sub_title}...</h2>";
                                      }
                                      else {
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$post_title}</h2>";
                                      }
                                  ?>
                                </a>
                                <a href="<?php echo $post_url; ?>" class="read-more">Okumaya başla...</a>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
<!--4LÜ COLOMN  GRUP FINISH-->
<?php adsense_banner(); ?>
