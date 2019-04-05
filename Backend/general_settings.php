<?php
function ses_start(){session_start();}
function ob_st(){ob_start();}
//adminsayfası login kontrolü
function isLogin(){
  if (!isset($_SESSION["username"])){$uri = $_SERVER["REQUEST_URI"];$pos = stripos($uri,"login");if ($pos > 1){}else{header("location: login.php");}}
}
//index.php single post tarih çekme
function getMonth($date){
  if($date=='01'){return "Ocak";}elseif($date=='02'){return "Şubat";}elseif($date=='03'){return "Mart";}
  elseif($date=='04'){return "Nisan";}elseif($date=='05'){return "Mayıs";}elseif($date=='06'){return "Haziran";}
  elseif($date=='07'){return "Temmuz";}elseif($date=='08'){return "Ağustos";}elseif($date=='09'){return "Eylül";}
  elseif($date=='10'){return "Ekim";}elseif($date=='11'){return "Kasım";}else {return "Aralık";}
}
//index.php tekli post content sınırı
function getContent($content){
  $post_content=explode(".",$content);
  $post_content=$post_content[0].".".$post_content[1].".".$post_content[2].".".$post_content[3].".";
  return $post_content;
}
//Title uzunluğu büyükse size ayarlama...
function titleSize($title){
  if(Strlen($title)>18&&Strlen($title)<91){return "18";}
  elseif (Strlen($title)>90) {return "100";}
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
