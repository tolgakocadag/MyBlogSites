<!--POST LİSTELEME-->
<?php
if (isset($_GET['search'])) {
  $search=mysqli_real_escape_string($con,$_GET['search']);
  $sql_list=dbsearchPostsList($search);
  $sql_list =$con->query($sql_list);
  if($sql_list->num_rows>0)
  {
    $adsense_Sayaci=0;
    while ($row=$sql_list->fetch_assoc()) {
      /*if($row['post_HIDE']=="on"){
        continue;
      }*/
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
    <!-- Single Post -->
    <div class="col-12 col-md-6 col-lg-4">
        <div class="single-post wow fadeInUp" data-wow-delay="0.5s">
            <!-- Post Thumb -->
            <div class="post-thumb">
                <a href="<?php echo $post_url; ?>"><img style="height:200px;width:100%" src="<?php echo substr($post_image,3,500); ?>" alt=""></a>
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
                <a href="<?php echo $post_url; ?> ">
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
      <?php
      if($adsense_Sayaci==2||$adsense_Sayaci==10||$adsense_Sayaci%20==0)
      {
        ?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="single-post wow fadeInUp" data-wow-delay="0.5s">
              <?php adsense_esnek(); ?>
            </div>
        </div>
        <?php
      }
      $adsense_Sayaci++;
     }?>
    </div>
  <?php }?>
<?php
  if($sql_list->num_rows==0){?>
    <div class="col-12">
        <div class="single-post wow fadeInUp" data-wow-delay="0.5s">
          <b>Üzgünüz! Hiç sonuç bulunamadı. Acaba tekrar denemek ister misiniz?</b>
          <form action="search" method="get">
            <div class="form-group row my-4">
                <input class="form-control col-10" type="search" name="search" id="search-anything" placeholder="Bir şey ara...">
                <button class="form-control col-2 fa fa-search" type="submit" style="background:none;border:none" name="searchBtn" href="#"></button>
            </div>
          </form>
        </div>
    </div>
<?php  } } ?>
