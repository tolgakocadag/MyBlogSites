<?php include "includes/_Header.php"; ?>
<?php include "backend/PHPMailer.php";
  if(isset($_POST['submit'])){
    $ip=GetIp();
    $name=$_POST['name'];
    $surname=$_POST['surname'];
    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $message=$_POST['message'];
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = 'smtp.office365.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'STARTTLS';
    $mail->Username = 'tolgakocadag@outlook.com';
    $mail->Password = 'Tlgkcdg1997+';
    $mail->SetFrom($mail->Username, 'Tolga Kocadağ');
    $mail->AddAddress($email, $name." ".$surname);
    $mail->CharSet = 'UTF-8';
    $mail->Subject = $subject;
    $mail->MsgHTML($message);
    if($mail->Send()) {
      // e-posta başarılı ile gönderildi
    } else {
      // bir sorun var, sorunu ekrana bastıralım
      echo $mail->ErrorInfo;
    }
  }
?>
    <!-- ****** Breadcumb Area Start ****** -->
    <div class="breadcumb-area" style="background-image: url(img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="bradcumb-title text-center">
                        <h2>Bana Ulaşın</h2>
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
                            <li class="breadcrumb-item active" aria-current="page">Bana Ulaşın</li>
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
                        <div class="contact-form wow fadeInUpBig" data-wow-delay="0.6s">
                            <h2 style="font-size:20px" class="contact-form-title mb-30">Herhangi bir sorunuz varsa bana bu iletişim formundan veya sosyal medya hesaplarımdan ulaşabilirsiniz !</h2>
                            <!-- Contact Form -->
                            <form action="#" method="post">
                                <div class="row">
                                  <div class="form-group col-6">
                                      <input type="text" class="form-control" name="name" required id="contact-name" placeholder="Adınız...">
                                  </div>
                                  <div class="form-group col-6">
                                      <input type="text" class="form-control" name="surname" required id="contact-name" placeholder="Soyadınız...">
                                  </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" required id="contact-email" placeholder="Email adresiniz...">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject" required id="contact-website" placeholder="Mesajınızın Konusu...">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="message" required id="message" cols="30" rows="10" placeholder="Mesajınız..."></textarea>
                                </div>
                                <center><button type="submit" name="submit" class="btn contact-btn">Mesajı Gönder</button></center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ****** Contact Area End ****** -->
    <!-- ****** Our Creative Portfolio Area End ****** -->

<?php include "includes/_Footer.php"; ?>
