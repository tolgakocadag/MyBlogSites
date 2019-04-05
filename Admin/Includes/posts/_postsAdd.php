<!--YAZI EKLEME-->
<?php
if(isset($_POST['add_post']) && isset($_SESSION['role'])){
  $post_title=$_POST["post_title"];
  $post_author=$_POST["post_author"];
  $post_author_role=$_POST["admin_role"];
  $post_date=date("d.m.Y")." ".date("H:i:s");
  $post_content=$_POST["post_content"];
  $post_image = $_FILES['post_image']['tmp_name'];
  copy($post_image, '../img/blog-img/' . $_FILES['post_image']['name']);
  $post_image="../img/blog-img/{$_FILES['post_image']['name']}";
  $post_tag=$_POST['post_tag'];
  $sql_add=$con->prepare(dbmyAdminPagePostsAdd());
  $sql_add->bind_param("sssssss",$post_author,$post_author_role,$post_date,$post_title,$post_content,$post_image,$post_tag);
  $sql_add->execute();
  $sql_add->close();
  header("Location: posts.php");
}
 ?>
 <!--YAZI EKLEME FINISH-->
