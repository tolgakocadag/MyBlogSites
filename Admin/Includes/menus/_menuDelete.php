<?php
  if(isset($_GET["delete"]) && isset($_SESSION['role']) && $_SESSION['role']=='admin' ){
  $del_menus_id=$_GET['delete'];
  $sql_delete=$con->prepare(dbMenuDelete());
  $sql_delete->bind_param("i",$del_menus_id);
  $sql_delete->execute();
  $sql_delete->close();
  header("Location: menus.php");
}
 ?>
