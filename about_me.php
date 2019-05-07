<?php include "includes/_Header.php"; ?>
<?php adsense_banner(); ?>
    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Hakkımda</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="breadcumb-nav">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#"><i class="fa fa-home" aria-hidden="true"></i> Anasayfa</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Hakkımda</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Contatc Area Start ****** -->
    <div class="contact-area section_padding_80">
        <div class="container">
          <!-- Contact Form  -->
            <div class="contact-form-area">
                <div class="row">
                    <div class="col-12 col-md-5">
                        <div class="contact-form-sidebar item wow fadeInUpBig" data-wow-delay="0.3s">
                          <div class="single-widget-area about-me-widget text-center">
                            <?php
                            $sql_list=dbAboutList();
                            $sql_list=$con->query($sql_list);
                            if($sql_list->num_rows>0)
                            {
                              while ($row=$sql_list->fetch_assoc()) {
                                $about_name=$row['about_NAME'];
                                $about_job=$row['about_JOB'];
                                $about_image=$row['about_IMAGE'];
                                $about_long=$row['about_LONG'];
                             ?>
                              <div class="about-me-widget-thumb">
                                  <img src="<?php echo $about_image; ?>" alt="">
                              </div>
                              <h4 class="font-shadow-into-light"><?php echo $about_name; ?></h4>
                              <p><?php echo $about_job; ?></p>
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
                        </div>
                    </div>
                    <div class="col-12 col-md-7 item">
                        <p>
                          <?php echo $about_long; ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ****** Contact Area End ****** -->

    

<?php include "includes/_Footer.php"; ?>
