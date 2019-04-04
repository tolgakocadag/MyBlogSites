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
//Title uzunluğu büyükse size ayarlama...
function titleSize($title){
  if(Strlen($title)>18&&Strlen($title)<71){return "18";}
  elseif (Strlen($title)>70) {return "80";}
}
 ?>
