<!--YAZI SİLME-->
<?php
if(isset($_GET["delete"]) && isset($_SESSION['role']) && $_SESSION['role']=='admin' ){
  $del_posts_id=$_GET['delete'];
  $sql_delete=$con->prepare(dbmyAdminPagePostsDelete());
  $sql_delete->bind_param("i",$del_posts_id);
  $sql_delete->execute();
  $sql_delete->close();
  header("Location:posts.php");
}
 ?>
<!--/YAZI SİLME FINISH-->
