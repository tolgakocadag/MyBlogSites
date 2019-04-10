<?php
   if(isset($_POST['edit_copyright']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
     $copyright_name=$_POST["copyright_name"];
     $sql_update=$con->prepare(dbCopyrightEdit());
     $sql_update->bind_param("s",$copyright_name);
     $sql_update->execute();
     $sql_update->close();
     header("Location: copyright.php");
   }
?>
