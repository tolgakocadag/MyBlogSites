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
                        $post_image=$row['post_IMAGE'];
                        ?>
                    <div class="col-12">
                        <div class="single-post wow fadeInUp" data-wow-delay=".0s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="<?php echo substr($post_image,3,500); ?>" alt="">
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
                                <a href="<?php echo $post_title;?>">
                                    <h2 class="post-headline"><?php echo $post_title.GetIP(); ?></h2>
                                </a>
                                <p><?php echo getContent($post_content); ?></p>
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
                        $post_image=$row['post_IMAGE'];
                      ?>
                    <div class="col-12 col-md-6">
                        <div class="single-post wow fadeInUp" data-wow-delay="0s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="<?php echo substr($post_image,3,500); ?>" alt="">
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
                        $post_image=$row['post_IMAGE'];
                        ?>
                    <div class="col-12">
                        <div class="list-blog single-post d-sm-flex wow fadeInUpBig" data-wow-delay="0.1s">
                            <!-- Post Thumb -->
                            <div class="post-thumb">
                                <img src="<?php echo substr($post_image,3,500); ?>" alt="">
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
                                      elseif (titleSize($post_title)==100) {
                                        $sub_title=substr($post_title,0,93);
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$sub_title}...</h2>";
                                      }
                                      else {
                                        echo "<h2 class='post-headline' style='font-size:20px;'>{$post_title}</h2>";
                                      }
                                  ?>
                                </a>
                                <p><?php echo substr($post_content,0,100)."..."; ?></p>
                                <a href="#" class="read-more">Okumaya devam et...</a>
                            </div>
                        </div>
                    </div>
                    <?php }} ?>
<!--4LÜ COLOMN  GRUP FINISH-->
