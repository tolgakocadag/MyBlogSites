<?php include "includes/_Header.php"; ?>
<?php adsense_banner(); ?>
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
                            <form action="" method="post">
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
                                <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                                <center><div class="g-recaptcha" data-callback="enableBtn" data-sitekey="6LeuY54UAAAAADIHPfsP14q67dcNT74jvQVw0syi"></div></center>
                                <center><button type="submit" id="recaptchaClicked" disabled name="submit" class="btn contact-btn">Mesajı Gönder</button></center>
                            </form>
                            <script type="text/javascript">
                            function enableBtn() {
                              document.getElementById("recaptchaClicked").disabled = false;
                            }
                            </script>
                            <?php
                            if(isset($_POST['message'])&&$_POST['message']!=""&&$_POST['name']!=""&&$_POST['surname']!=""&&$_POST['email']!=""&&$_POST['subject']!=""){
                              $recaptcha = $_POST['g-recaptcha-response'];
                              if (!empty($recaptcha)) {
                                $google_url = "https://www.google.com/recaptcha/api/siteverify";
                                $secret = '6LeuY54UAAAAANJhs7weRYfIdkIhoEnoy8OFDXnQ';
                                //kullanıcının ip adresi
                                $ip = $_SERVER['REMOTE_ADDR'];
                                //istek adresini oluşturuyoruz
                                $url = $google_url . "?secret=" . $secret . "&response=" . $recaptcha . "&remoteip=" . $ip;
                                $res = curlKullan($url);
                                $res = json_decode($res, true);

                                //işlem başarılıysa çalışacak kısım
                                if ($res['success']) {
                                  include "Backend/class.phpmailer.php";
                                  $ip=GetIp();
                                  $name=$_POST['name'];
                                  $surname=$_POST['surname'];
                                  $email=$_POST['email'];
                                  $subject=$_POST['subject'];
                                  $subject=replace_tr($subject);
                                  $message=$_POST['message'];
                                  $mail = new PHPMailer();
                                  $mail->IsSMTP();
                                  $mail->SMTPAuth = true;
                                  $mail->Host = 'mail.tolgakocadag.com';
                                  $mail->Port = 587;
                                  $mail->Username = 'iletisim@tolgakocadag.com';
                                  $mail->Password = 'Tlgkcdg3434';
                                  $mail->SetFrom($mail->Username, $name.' '.$surname);
                                  $mail->AddAddress('iletisim@tolgakocadag.com', 'Tolga Kocadag Blog');
                                  $mail->CharSet = 'UTF-8';
                                  $mail->Subject = $subject;
                                  $mail->MsgHTML('İsim:   '.$name.'  Soyisim:   '.$surname.'<br/>
                                  Konu:'.$subject.'<br/>
                                  E-Posta:   '.$email.'<br/>
                                  Mesaj:   '.$message.'<br/>
                                  IP Adresi:   '.$ip);
                                  if($mail->Send()) {
                                    echo '<br/><center>Mesajınız başarıyla gönderildi.</center>';
                                    $mail = new PHPMailer();
                                    $mail->IsSMTP();
                                    $mail->SMTPAuth = true;
                                    $mail->Host = 'mail.tolgakocadag.com';
                                    $mail->Port = 587;
                                    $mail->Username = 'iletisim@tolgakocadag.com';
                                    $mail->Password = 'Tlgkcdg3434';
                                    $mail->SetFrom($mail->Username, 'Tolga Kocadag Blog');
                                    $mail->AddAddress($email, ' ');
                                    $mail->CharSet = 'UTF-8';
                                    $mail->Subject = $subject;
                                    $mail->MsgHTML('Merhaba '.$name.',<br /><br />Mesajınızı aldık. En kısa sürede yetkili kişiler tarafından dönüş yapılacaktır.<br /><br />Teşekkür ederiz.<br />tolgakocadag.com');
                                    $mail->Send();
                                    $_POST['name']="";
                                    $_POST['surname']="";
                                    $_POST['email']="";
                                    $_POST['subject']="";
                                    $_POST['message']="";
                                  }
                                  else {
                                    echo '<br />Mesaj gönderirken bir hata oluştu ve girmiş olduğunuz bilgiler alınamadı.' . $mail->ErrorInfo;}
                                  }
                                  else {
                                    echo "<br /><center>Lütfen bot olmadığınızı doğrulayın</center>";
                                  }
                                }
                                else {
                                  echo "<br /><center>Lütfen bot olmadığınızı doğrulayın</center>";
                                }
                              }
                             ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- ****** Contact Area End ****** -->
    <!-- ****** Our Creative Portfolio Area End ****** -->

<?php include "includes/_Footer.php"; ?>
