<?php
  if(isset($_GET["delete"]) && isset($_SESSION['role']) && $_SESSION['role']=='admin' ){
  $del_users_id=$_GET['delete'];
  $sql_delete=$con->prepare(dbmyAdminSocialMediaDelete());
  $sql_delete->bind_param("i",$del_users_id);
  $sql_delete->execute();
  $sql_delete->close();
  header("Location: socialmedias.php");
}
 ?>
