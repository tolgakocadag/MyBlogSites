<?php
   if(isset($_POST['edit_metatag']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
     $metatag_name=$_POST["metatag_name"];
     $metatag_content=$_POST['metatag_content'];
     $sql_update=$con->prepare(dbMetaTagsEdit());
     $sql_update->bind_param("ssi",$metatag_name,$metatag_content,$_POST['metatag_id']);
     $sql_update->execute();
     $sql_update->close();
     header("Location: metaTags.php");
   }
?>
