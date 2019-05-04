<?php session_start();ob_start(); ?>
  <?php include 'Backend/_database.php' ; ?>
  <?php include 'Backend/general_settings.php'; ?>
  <?php include 'Backend/_dbConnect.php'; ?>
  <!DOCTYPE html>
  <html lang='tr'>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-86060213-3"></script>
  <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-86060213-3');
  </script>
  <?php
  $sql_list=dbMenuList();
  $sql_list=$con->query($sql_list);
  if($sql_list->num_rows>0)
  {
    while ($row=$sql_list->fetch_assoc()) {
      $menu_name=$row['menu_NAME'];
      $menu_url=$row['menu_URL'];
      if($menu_name=='ANASAYFA'){
        $index=$menu_url;
      }
      if($menu_name=='HAKKIMDA'){
        $archive=$menu_url;
      }
    }
  }
  ?>
  <?php
      $title='PHP Dosyanın Varlığını Kontrol Etmek';
      if(isset($_SESSION['PHP Dosyanın Varlığını Kontrol Etmek']))
      {
      }
      else{
        $hit_update=$con->prepare(dbHitPlus());
        $hit_update->bind_param('s',$title);
        $hit_update->execute();
        $hit_update->close();
      }
      $_SESSION['PHP Dosyanın Varlığını Kontrol Etmek']=GetIP();
      $sql_list=dbmyAdminPagePostsAddTitleControl($title);
      $sql_list=$con->query($sql_list);
      $row=$sql_list->fetch_assoc();
      $ip=$row['post_ID'];
      $title=$row['post_TITLE'];
      $content=$row['post_CONTENT'];
      $hit=$row['post_HIT'];
      $image=$row['post_IMAGE'];
      $explanation=$row['post_EXPLANATION'];
      $tag=$row['post_TAG'];
      $visiblelabels=$row['post_TAG_VISIBLE'];
   ?>
  <head>
  <?php
  $sql_list=dbMetaTagsList();
  $sql_list=$con->query($sql_list);
  if($sql_list->num_rows>0)
  {
    while ($row=$sql_list->fetch_assoc()) {
      $metatag_name=$row['metatag_NAME'];
      $metatag_content=$row['metatag_CONTENT'];
      if($metatag_name=='title'){
        $sitetitle=$metatag_content;
      }
      if($metatag_name!='copyright'&&$metatag_name!='title'&&$metatag_name!='description'&&$metatag_name!='keywords'){
        CreateMetaTag($metatag_name,$metatag_content);
      }
    }
  }
   ?>
      <meta charset='UTF-8'>
      <meta name='title' content='<?php echo $title; ?> - <?php echo $sitetitle;?>'>
      <meta name='description' content='<?php echo $explanation; ?> - <?php echo $sitetitle;?>' />
      <meta name='keywords' content='<?php echo $tag; ?>,<?php echo $sitetitle;?>'>
      <meta http-equiv='X-UA-Compatible' content='IE=edge'>
      <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>

      <!-- Title -->
      <title><?php echo $title; ?> - <?php echo $sitetitle; ?></title>

      <!-- Favicon -->
      <link rel='icon' href='img/core-img/TK.ico'>

      <!-- Core Stylesheet -->
      <link href='style.css' rel='stylesheet'>

      <!-- Responsive CSS -->
      <link href='css/responsive/responsive.css' rel='stylesheet'>

  </head>

  <body>
      <!-- Preloader Start -->
      <div id='preloader'>
          <div class='yummy-load'></div>
      </div>



      <!-- ****** Top Header Area Start ****** -->
      <div class='top_header_area  fixed-top' style='background-color:#fee2d9'>
          <div class='container'>
              <div class='row'>
                  <div class='col-5 col-sm-6'>
                      <!--  Top Social bar start -->
                      <div class='top_social_bar'>
                      <a href='<?php echo $index;?>'><i class='fa fa-home fa-2x' aria-hidden='true'></i></a>
                      <?php
                      $sql_list=dbmyAdminSocialMediaList();
                      $sql_list=$con->query($sql_list);
                      if($sql_list->num_rows>0)
                      {
                        while ($row=$sql_list->fetch_assoc()) {
                          $socialmedia_name=$row['socialmedia_NAME'];
                          $socialmedia_url=$row['socialmedia_URL'];
                       ?>
                        <a href=<?php echo $socialmedia_url ?> target=_blank><i class='fa fa-<?php echo $socialmedia_name; ?> fa-2x' aria-hidden=true></i></a>
                      <?php }} ?>
                      </div>
                  </div>
                  <!--  Login Register Area -->
                  <div class='col-7 col-sm-6'>
                      <div class='signup-search-area d-flex align-items-center justify-content-end'>
                          <!--
                          <div class='login_register_area d-flex'>
                              <div class='login'>
                                  <a href='register.html'>Giriş Yap</a>
                              </div>
                              <div class='register'>
                                  <a href='register.html'>Üye ol</a>
                              </div>
                          </div>
                        -->
                          <!-- Search Button Area -->
                          <!-- Search Form -->
                          <form action='search.html' method='get'>
                            <div class='form-group row my-2'>
                                <input class='form-control col-10' type='search' name='search' id='search-anything' placeholder='Bir şey ara...'>
                                <button class='form-control col-2 fa fa-search' type='submit' style='background:none;border:none' name='searchBtn' href='#'></button>
                            </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- ****** Top Header Area End ****** -->

      <!-- ****** Header Area Start ****** -->
      <header class='header_area my-4'>
          <div class='container'>
              <div class='row'>
                  <!-- Logo Area Start -->
                  <div class='col-12'>
                      <div class='logo_area text-center'>
                          <a href='<?php echo $index;?>' class='yummy-logo'><?php echo $sitetitle;?></a>
                      </div>
                  </div>
              </div>

              <div class='row'>
                  <div class='col-12'>
                      <nav class='navbar navbar-expand-lg'>
                          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#yummyfood-nav' aria-controls='yummyfood-nav' aria-expanded='false' aria-label='Toggle navigation'><i class='fa fa-bars' aria-hidden='true'></i> Menu</button>
                          <!-- Menu Area Start -->
                          <div class='collapse navbar-collapse justify-content-center' id='yummyfood-nav'>
                              <ul class='navbar-nav' id='yummy-nav'>
                              <?php
                              $sql_list=dbMenuList();
                              $sql_list=$con->query($sql_list);
                              if($sql_list->num_rows>0)
                              {
                                while ($row=$sql_list->fetch_assoc()) {
                                  $menu_name=$row['menu_NAME'];
                                  $menu_url=$row['menu_URL'];
                                  $uri = $_SERVER['REQUEST_URI'];
                                  $pos = stripos($uri,$menu_url);
                                  if ($pos > 1){
                                    ?>
                                    <li class='nav-item active'>
                                        <a class='nav-link' href='<?php echo $menu_url; ?>'><?php echo $menu_name; ?> <span class=sr-only>(current)</span></a>
                                    </li>;
                                <?php  }
                                  else {?>
                                    <li class=nav-item>
                                        <a class=nav-link href='<?php echo $menu_url; ?>'><?php echo $menu_name; ?></a>
                                    </li>
                                <?php  }
                                }
                              }
                                ?>
                              </ul>
                          </div>
                      </nav>
                  </div>
              </div>
          </div>
      </header>
<!-- Admatic masthead 970x250 Ad Code START -->
<?php admaticHeader(); ?>
<!-- Admatic masthead 970x250 Ad Code END -->
      <!-- ****** Header Area End ****** -->
      <!-- ****** Breadcumb Area Start ****** -->
      <div class='breadcumb-nav'>
          <div class='container'>
              <div class='row'>
                  <div class='col-12'>
                      <nav aria-label='breadcrumb'>
                          <ol class='breadcrumb'>
                              <li class='breadcrumb-item'><a href='<?php echo $index;?>'><i class='fa fa-home' aria-hidden='true'></i>Anasayfa</a></li>
                              <li class='breadcrumb-item active' aria-current='page'><?php echo $title; ?></li>
                          </ol>
                      </nav>
                  </div>
              </div>
          </div>
      </div>
      <!-- ****** Breadcumb Area End ****** -->

      <!-- ****** Single Blog Area Start ****** -->
      <section class='single_blog_area section_padding_80'>
          <div class='container'>
              <div class='row justify-content-center'>
                  <div class='col-12 col-lg-8'>
                      <div class='row no-gutters'>

                          <!-- Single Post -->
                          <div class='col-10 col-sm-11'>
                              <div class='single-post'>
                                  <!-- Post Thumb -->
                                  <div class='post-thumb'>
                                      <img style=width:100% src='<?php echo substr($image,3,500); ?>' alt='<?php echo $title; ?>'>
                                  </div>
                                  <!-- Post Content -->
                                  <div class='post-content'>
                                      <div class='post-meta d-flex'>
                                          <div class='post-author-date-area d-flex'>
                                              <!-- Post Author -->
                                              <div class='post-author'>
                                                  <a href='<?php echo $archive; ?>'>Tolga Kocadağ</a>
                                              </div>
                                              <!-- Post Date -->
                                              <div class='post-date'>
                                                  <a href='#'>Nisan 19, 2019</a>
                                              </div>
                                          </div>
                                          <!-- Post Comment & Share Area -->
                                          <div class='post-comment-share-area d-flex'>

                                              <!-- Post Hits -->
                                              <div class='post-comments'>
                                                  <a href='#'><i class='fa fa-eye' aria-hidden='true'></i> <?php echo $hit; ?></a>
                                              </div>
                                          </div>
                                      </div>
                                      <a href='php-dosyanin-varligini-kontrol-etmek.php'>
                                          <h1 class='post-headline'><?php echo $title; ?></h1>
                                      </a>
                                      <div class="my-2" >
                                        <?php yazi_ici_adsense(); ?>
                                      </div>
                                      <p><?php echo $content; ?></p>
                                      <div class="my-2" >
                                        <?php yazi_ici_adsense(); ?>
                                      </div>
                                  </div>
                              </div>

                              <!-- Tags Area -->
                              <div class='tags-area'>
                              <?php
                              $tags=explode(',',$visiblelabels);
                                  foreach ($tags as $key => $value) {
                                    $t_url=explode(' ',$tags[$key]);
                                    $tag_url='';
                                    foreach ($t_url as $k => $v) {
                                      $tag_url.=$v.'+';
                                    }
                                    $tag_url=rtrim($tag_url,'+');
                                    echo '<a href=search.html?search='.$tag_url.'>'.$tags[$key].'</a>&nbsp;';
                                  }
                               ?>
                              </div>

                              <!-- Related Post Area -->
                              <div class='related-post-area section_padding_50'>
                              <h4 class='mb-30'>Benzer Yazılar</h4>
                                  <div class='related-post-slider owl-carousel'>
                                  <?php

                                  $related= multiexplode(array(',','|','{','!','#','>','<','/','*','+','-','=','%','&','*',';','}','[',']','(',')',' ','?'),$title);
                                  $isAdd=array($ip);
                                  foreach ($related as $key => $value) {
                                    $related_list=dbrelatedPostsList($related[$key]);
                                    $related_list=$con->query($related_list);
                                    if($related_list->num_rows>0)
                                    {
                                        while ($row=$related_list->fetch_assoc()) {
                                          $post_id=$row['post_ID'];
                                          $post_title=$row['post_TITLE'];
                                          $post_date=$row['post_DATE'];
                                          $post_url=$row['post_URL'];
                                          $post_url=explode('.',$post_url);
                                          $post_url=$post_url[0];
                                          $post_url.='.html';
                                          $post_image=$row['post_IMAGE'];
                                          if(array_search($post_id, $isAdd)===FALSE)
                                          {
                                               $isAdd[]=$post_id;?>

                                               <!-- Single Related Post-->
                                               <div class='single-post'>
                                                   <!-- Post Thumb -->
                                                   <div class='post-thumb'>
                                                       <img style=height:50px src='<?php echo substr($post_image,3,500); ?>' alt='<?php echo $title; ?>'>
                                                   </div>
                                                   <!-- Post Content -->
                                                   <div class='post-content'>
                                                       <div class='post-meta d-flex'>
                                                           <div class='post-author-date-area d-flex'>
                                                               <!-- Post Date -->
                                                               <div class='post-date'>
                                                                   <a href='#'><?php $date=explode('.',$post_date);echo getMonth($date[1]).' '.$date[0].', '.substr($date[2],0,4); ?></a>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <a href='<?php echo $post_url; ?>'>
                                                           <h3 style='font-size:15px'><?php echo $post_title; ?></h3>
                                                       </a>
                                                   </div>
                                               </div>
                                               <?php }}}}?>
                                    </div>
                                  </div>

                                  <div class='single-widget-area add-widget text-center my-2' >
                                    <?php adsense_esnek(); ?>
                                  </div>
                                  <!-- disqus yorumları -->
                                  <div id='disqus_thread'></div>
                                  <script>
                                      (function() { // DON'T EDIT BELOW THIS LINE
                                      var d = document, s = d.createElement('script');
                                      s.src = 'https://tolga-kocadag-blog.disqus.com/embed.js';
                                      s.setAttribute('data-timestamp', +new Date());
                                      (d.head || d.body).appendChild(s);
                                    })();
                                  </script>
                                  <div class='single-widget-area add-widget text-center my-2'>
                                    <?php adsense_esnek(); ?>
                                  </div>
                          </div>
                      </div>
                  </div>

                  <!-- ****** Blog Sidebar ****** -->
                  <div class='col-12 col-sm-8 col-md-6 col-lg-4'>
                      <div class='blog-sidebar mt-5 mt-lg-0'>
                          <!-- Single Widget Area -->
                          <div class='single-widget-area about-me-widget text-center'>
                              <div class='widget-title'>
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
                              <div class='about-me-widget-thumb'>
                                  <img src=<?php echo $about_image;?> alt=<?php echo $about_name;?>>
                              </div>
                              <h4 class='font-shadow-into-light'><?php echo $about_name;?></h4>
                              <p><?php echo $about_short;?></p>
                              <?php }}?>
                          </div>

                          <!-- Single Widget Area -->
                          <div class='single-widget-area subscribe_widget text-center'>
                              <div class='widget-title'>
                                  <h6>Abone ol &amp; Takip et</h6>
                              </div>
                              <div class='subscribe-link'>
                              <?php
                              $sql_list=dbmyAdminSocialMediaList();
                              $sql_list=$con->query($sql_list);
                              if($sql_list->num_rows>0)
                              {
                                while ($row=$sql_list->fetch_assoc()) {
                                  $socialmedia_name=$row['socialmedia_NAME'];
                                  $socialmedia_url=$row['socialmedia_URL'];
                               ?>
                                <a href='<?php echo $socialmedia_url; ?>'><i class='fa fa-<?php echo $socialmedia_name;?> fa-2x' aria-hidden='true'></i></a>
                              <?php }} ?>
                              </div>
                          </div>
                          <!-- Single Widget Area -->
                          <div class='single-widget-area add-widget text-center'>
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
                                    $post_url=explode('.',$post_url);
                                    $post_url=$post_url[0];
                                    $post_url.='.html';
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
                          </div>

                          <!-- Single Widget Area -->
                          <div class='single-widget-area add-widget text-center'>
                            <?php adsense_esnek(); ?>
                          </div>

                          <!-- Single Widget Area -->
                          <div class='single-widget-area newsletter-widget'>
                              <div class='widget-title text-center'>
                                  <h6>Bülten</h6>
                              </div>
                              <p>Bültenimize abone olun; yeni yazılar vb. hakkında bildirim alın.</p>
                              <div class='newsletter-form'>
                                  <form action='' method='post'>
                                      <input type='email' required name='newsletter-email' id='email' placeholder='Email adresiniz'>
                                      <button type='submit' name='btnnews'><i class='fa fa-paper-plane-o' aria-hidden='true'></i></button>
                                  </form>
                                  <?php
                                      newspaper();
                                   ?>
                              </div>
                          </div>
                          <!-- Single Widget Area -->
                          <div class='single-widget-area add-widget text-center'>
                            <?php adsense_esnek(); ?>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      <!-- ****** Single Blog Area End ****** -->



      <!-- ****** Footer Social Icon Area Start ****** -->
      <div class='social_icon_area clearfix'>
          <div class='container'>
              <div class='row'>
                  <div class='col-12'>
                      <div class='footer-social-area d-flex'>
                      <?php
                      $sql_list=dbmyAdminSocialMediaList();
                      $sql_list=$con->query($sql_list);
                      if($sql_list->num_rows>0)
                      {
                        while ($row=$sql_list->fetch_assoc()) {
                          $socialmedia_name=$row['socialmedia_NAME'];
                          $socialmedia_url=$row['socialmedia_URL'];
                       ?>
                          <div class='single-icon'>
                              <a href=<?php echo $socialmedia_url;?>><i class='fa fa-<?php echo $socialmedia_name;?>' aria-hidden=true></i><span><?php echo $socialmedia_name;?></span></a>
                          </div>
                          <?php }} ?>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- ****** Footer Social Icon Area End ****** -->

      <!-- ****** Footer Menu Area Start ****** -->
      <footer class='footer_area'>
          <div class='container'>
              <div class='row'>
                  <div class='col-12'>
                      <!-- Copywrite Text -->
                      <div class='copy_right_text text-center'>
                      <?php
                            CreateMetaTag($metatag_name,$metatag_content);
                            $sql_list=dbCopyright();
                            $sql_list=$con->query($sql_list);
                            $row=$sql_list->fetch_assoc();
                       ?>
                     <p><?php echo $row['copyright_NAME']; ?></p>
                      </div>
                  </div>
              </div>
          </div>
      </footer>

      <!-- ****** Footer Menu Area End ****** -->

      <!-- Jquery-2.2.4 js -->
      <script src='js/jquery/jquery-2.2.4.min.js'></script>
      <!-- Popper js -->
      <script src='js/bootstrap/popper.min.js'></script>
      <!-- Bootstrap-4 js -->
      <script src='js/bootstrap/bootstrap.min.js'></script>
      <!-- All Plugins JS -->
      <script src='js/others/plugins.js'></script>
      <!-- Active JS -->
      <script src='js/my.js'></script>
      <script src='js/active.js'></script>
      <!-- Disqus JS -->
      <script id='dsq-count-scr' src='//tolga-kocadag-blog.disqus.com/count.js' async></script>
      </body>
      </html>
