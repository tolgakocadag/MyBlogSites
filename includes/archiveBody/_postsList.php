<!--POST LİSTELEME-->
<?php
$sql_list=dbmyPostsList();
$sql_list =$con->query($sql_list);
if($sql_list->num_rows>0)
{
  while ($row=$sql_list->fetch_assoc()) {
    if($row['post_HIDE']=="on"){
      continue;
    }
    $post_id=$row['post_ID'];
    $post_title=$row['post_TITLE'];
    $post_date=$row['post_DATE'];
    $post_author=$row['post_AUTHOR'];
    $post_content=$row['post_CONTENT'];
    $post_hit=$row['post_HIT'];
    $post_comment_count=$row['post_COMMENT_COUNT'];
    $post_image=$row['post_IMAGE'];
    $post_url=$row['post_URL'];
    ?>
  <!-- Single Post -->
  <div class="col-12 col-md-6 col-lg-4">
      <div class="single-post wow fadeInUp" data-wow-delay="0.5s">
          <!-- Post Thumb -->
          <div class="post-thumb">
              <a href="<?php echo $post_url; ?>"><img src="<?php echo substr($post_image,3,500); ?>" alt=""></a>
          </div>
          <!-- Post Content -->
          <div class="post-content">
              <div class="post-meta d-flex">
                  <div class="post-author-date-area d-flex">
                      <!-- Post Author -->
                      <div class="post-author">
                          <a href="about_me.php"><?php echo $post_author; ?></a>
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
                      <!-- Post Comments -->
                      <div class="post-comments">
                          <a href="<?php echo $post_url; ?>"><i class="fa fa-comment-o" aria-hidden="true"></i> <?php echo $post_comment_count; ?></a>
                      </div>
                      <!-- Post Share -->
                      <div class="post-share" style="display:none">
                          <a href="<?php echo $post_url; ?>"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
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
<?php }} ?>
  <div class="col-12">
      <div class="pagination-area d-sm-flex mt-15">
          <nav aria-label="#">
              <ul class="pagination">
                  <li class="page-item active">
                      <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                      <a class="page-link" href="#">Next <i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                  </li>
              </ul>
          </nav>
          <div class="page-status">
              <p>Page 1 of 60 results</p>
          </div>
      </div>
  </div>
