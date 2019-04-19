<?php
function ses_start(){session_start();}
function ob_st(){ob_start();}
//adminsayfası login kontrolü
function isLogin(){
  if (!isset($_SESSION["username"])||!isset($_SESSION["nickname"])||!isset($_SESSION["role"])){$uri = $_SERVER["REQUEST_URI"];$pos = stripos($uri,"login");if ($pos > 1){}else{header("location: login.php");}}
}
//index.php single post tarih çekme
function getMonth($date){
  if($date=='01'){return "Ocak";}elseif($date=='02'){return "Şubat";}elseif($date=='03'){return "Mart";}
  elseif($date=='04'){return "Nisan";}elseif($date=='05'){return "Mayıs";}elseif($date=='06'){return "Haziran";}
  elseif($date=='07'){return "Temmuz";}elseif($date=='08'){return "Ağustos";}elseif($date=='09'){return "Eylül";}
  elseif($date=='10'){return "Ekim";}elseif($date=='11'){return "Kasım";}else {return "Aralık";}
}
function curlKullan($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
    $curlData = curl_exec($curl);
    curl_close($curl);
    return $curlData;
}
//Title uzunluğu büyükse size ayarlama...
function titleSize($title){
  if(Strlen($title)>18&&Strlen($title)<91){return "18";}
  elseif (Strlen($title)>90) {return "100";}
}
function CreateMetaTag($name,$content){
  if($name=='title'){
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='abstract') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='robots') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='author') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='owner') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='designer') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='distribution') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='revisit-after') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='language') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='reply-to') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='description') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='keywords') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
  elseif ($name=='copyright') {
    echo "<meta name='{$name}' content='{$content}'>";
    return;
  }
}
function multiexplode ($delimiters,$string) {

    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}
function replace_tr($text) {
   $text = trim($text);
   $search = array('Ç','ç','Ğ','ğ','ı','İ','Ö','ö','Ş','ş','Ü','ü');
   $replace = array('c','c','g','g','i','i','o','o','s','s','u','u');
   $new_text = str_replace($search,$replace,$text);
   return $new_text;
}
function newspaper(){
  if(isset($_POST['newsletter-email'])&&$_POST['newsletter-email']!=''){
    $isTrue='false';
    $dosya = fopen("newspaper.txt","a+");
    while (!feof($dosya))
    {
         $okunanveri = fgets($dosya);
         $mails=explode(',',$okunanveri);
    }
    foreach ($mails as $key => $value) {
        if($mails[$key]==$_POST['newsletter-email'])
        {
          $isTrue='true';
        }
    }
    if($isTrue=='false'){
      fwrite($dosya, ','.$_POST['newsletter-email']);
      echo "<br />Tebrikler! Bültenimize kayıt oldunuz.";
      include "Backend/class.phpmailer.php";
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPAuth = true;
      $mail->CharSet = 'utf-8';
      $mail->Host = 'mail.tolgakocadag.com';
      $mail->Port = 587;
      $mail->Username = 'info@tolgakocadag.com';
      $mail->Password = 'Tlgkcdg3434';
      $mail->SetFrom($mail->Username, 'Tolga Kocadag Blog');
      $mail->AddAddress($_POST['newsletter-email'],' ');
      $mail->Subject = 'E-bulten aboneligi';
      $mail->MsgHTML('Merhaba,<br /><br />Tolga Kocadağ Blog sitemizin e-bülten aboneliğine hoşgeldiniz. Yeni gönderilerden anında haberdar olabileceksiniz.<br /><br />Teşekkür ederiz.<br />tolgakocadag.com');
      $mail->Send();
    }
    else {
      echo "<br />Bültenimize zaten kayıtlısınız! Teşekkür ederiz.";
    }
    $_POST['newsletter-email']="";
     fclose($dosya);
  }
}
function GetIP(){
 if(getenv("HTTP_CLIENT_IP")) {
 $ip = getenv("HTTP_CLIENT_IP");
 } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
 $ip = getenv("HTTP_X_FORWARDED_FOR");
 if (strstr($ip, ',')) {
 $tmp = explode (',', $ip);
 $ip = trim($tmp[0]);
 }
 } else {
 $ip = getenv("REMOTE_ADDR");
 }
 return $ip;
}
 ?>
