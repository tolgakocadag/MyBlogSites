<?php include "Backend/_database.php" ; ?>
<?php include "Backend/general_settings.php"; ?>
<?php include "Backend/_dbConnect.php"; ?>
<?php include "Backend/createPage.php";?>
<!DOCTYPE html>
<html lang="tr">
<head>
  <script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
  </script>
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
      if($metatag_name!='copyright'){
        CreateMetaTag($metatag_name,$metatag_content);
      }
    }
  }
   ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title -->
    <title><?php echo $sitetitle; ?></title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/TK.ico">

    <!-- Core Stylesheet -->
    <link href="style.css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive/responsive.css" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-86060213-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-86060213-3');
    </script>

</head>

<body>
    <!-- Preloader Start -->
    <div id="preloader">
        <div class="yummy-load"></div>
    </div>
    <amp-auto-ads type="adsense"
                  data-ad-client="ca-pub-3620138050695153">
    </amp-auto-ads>


    <!-- ****** Top Header Area Start ****** -->
    <div class="top_header_area  fixed-top" style="background-color:#fee2d9">
        <div class="container">
            <div class="row">
                <div class="col-5 col-sm-6">
                    <!--  Top Social bar start -->
                    <div class="top_social_bar">
                      <a href="/"><i class="fa fa-home fa-2x" aria-hidden="true"></i></a>
                      <?php
                      $sql_list=dbmyAdminSocialMediaList();
                      $sql_list=$con->query($sql_list);
                      if($sql_list->num_rows>0)
                      {
                        while ($row=$sql_list->fetch_assoc()) {
                          $socialmedia_name=$row['socialmedia_NAME'];
                          $socialmedia_url=$row['socialmedia_URL'];
                       ?>
                        <a href="<?php echo $socialmedia_url ?>" target="_blank"><i class="fa fa-<?php echo $socialmedia_name; ?> fa-2x" aria-hidden="true"></i></a>
                      <?php }} ?>
                    </div>
                </div>
                <!--  Login Register Area -->
                <div class="col-7 col-sm-6">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <!--
                        <div class="login_register_area d-flex">
                            <div class="login">
                                <a href="register">Giriş Yap</a>
                            </div>
                            <div class="register">
                                <a href="register">Üye ol</a>
                            </div>
                        </div>
                      -->
                        <!-- Search Button Area -->
                        <!-- Search Form -->
                        <form action="search" method="get">
                          <div class="form-group row my-2">
                              <input class="form-control col-10" type="search" name="search" id="search-anything" placeholder="Bir şey ara...">
                              <button class="form-control col-2 fa fa-search" type="submit" style="background:none;border:none" name="searchBtn" href="#"></button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Top Header Area End ****** -->

    <!-- ****** Header Area Start ****** -->
    <header class="header_area my-4">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">
                        <a href="/" class="yummy-logo"><?php echo $sitetitle; ?></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#yummyfood-nav" aria-controls="yummyfood-nav" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars" aria-hidden="true"></i> Menu</button>
                        <!-- Menu Area Start -->
                        <div class="collapse navbar-collapse justify-content-center" id="yummyfood-nav">
                            <ul class="navbar-nav" id="yummy-nav">
                              <?php
                              $sql_list=dbMenuList();
                              $sql_list=$con->query($sql_list);
                              if($sql_list->num_rows>0)
                              {
                                while ($row=$sql_list->fetch_assoc()) {
                                  $menu_name=$row['menu_NAME'];
                                  $menu_url=$row['menu_URL'];
                                  $uri = $_SERVER["REQUEST_URI"];
                                  $pos = stripos($uri,$menu_url);
                                  if ($pos > 1){
                                    echo "<li class='nav-item active'>
                                        <a class='nav-link' href='{$menu_url}'>{$menu_name} <span class='sr-only'>(current)</span></a>
                                    </li>";
                                  }
                                  else {
                                    echo "<li class='nav-item'>
                                        <a class='nav-link' href='{$menu_url}'>{$menu_name}</a>
                                    </li>";
                                  }
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
    <!-- ****** Header Area End ****** -->
