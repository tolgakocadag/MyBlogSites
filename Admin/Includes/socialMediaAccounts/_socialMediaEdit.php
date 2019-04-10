<?php
   if(isset($_POST['edit_socialmedia']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
     $socialmedia_name=strtolower($_POST["socialmedia_name"]);
     $socialmedia_url=$_POST["socialmedia_url"];
     $sql_update=$con->prepare(dbmyAdminSocialMediaEdit());
     $sql_update->bind_param("ssi",$socialmedia_name,$socialmedia_url,$_POST['socialmedia_id']);
     $sql_update->execute();
     $sql_update->close();
     header("Location: socialmedias.php");
   }
?>
