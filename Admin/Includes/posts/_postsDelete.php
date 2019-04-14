<!--YAZI SİLME-->
<?php
if(isset($_GET["delete"]) && isset($_SESSION['role']) && $_SESSION['role']=='admin' ){
  $del_posts_id=$_GET['delete'];
  $sql_delete=$con->prepare(dbmyAdminPagePostsDelete());
  $sql_delete->bind_param("i",$del_posts_id);
  $sql_filelist=dbmyAdminPagePostsFileDelete($del_posts_id);
  $sql_filelist=$con->query($sql_filelist);
  $row=$sql_filelist->fetch_assoc();
  $DEL_URL="../".$row['post_URL'];
  unlink($DEL_URL);
  $sql_delete->execute();
  $sql_delete->close();
  header("Location:posts.php");
}
 ?>
<!--/YAZI SİLME FINISH-->
