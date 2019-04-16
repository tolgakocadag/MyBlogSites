<?php include "Includes/_Header.php"; ?>

<?php include "Includes/_Sidebar.php"; ?>

<?php include "Includes/_Topbar.php"; ?>
<form action="" method="post">
  <div class="row">
    <div class="form-group ml-4 col-3">
      <label for="subject">Subject</label>
      <input type="text" class="form-control" name="subject" id="subject"/>
    </div>
  </div>
  <input type="submit" name="submit" class="btn btn-primary ml-4" value="MailGönder" />
</form>
<?php
if(isset($_POST['submit'])){
  include "../Backend/class.phpmailer.php";
  $email='testemail';
  $subject='testkonu';
  $message='testmesaj';
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->Host = 'mail.tolgakocadag.com';
  $mail->Port = 587;
  $mail->Username = 'info@tolgakocadag.com';
  $mail->Password = 'Tlgkcdg3434';
  $mail->SetFrom($mail->Username, 'Tolga Kocadağ Blog');
  $mail->AddAddress('tolgakocadag@outlook.com', '  ');
  $mail->CharSet = 'UTF-8';
  $mail->Subject = $subject;
  $mail->MsgHTML('İsim:   '.$name.'  Soyisim:   '.$surname.'<br/>
  Konu:'.$subject.'<br/>
  E-Posta:   '.$email.'<br/>
  Mesaj:   '.$message.'<br/>');
  if($mail->Send()) {
    echo '<br/><center>Mesajınız başarıyla gönderildi.</center>';
  }
}
?>
</div>
<?php include "Includes/_Footer.php"; ?>
