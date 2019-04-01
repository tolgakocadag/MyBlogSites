<?php

function ses_start(){
  session_start();
}
function ob_st(){
  ob_start();
}
function isLogin(){
  
  if (!isset($_SESSION["username"])){
    $uri = $_SERVER["REQUEST_URI"];
    $pos = stripos($uri,"login");
    if ($pos > 1){

    }
    else{
      header("location: login.php");
    }
  }
  else{}

}
 ?>
