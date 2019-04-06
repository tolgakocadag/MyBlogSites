<!--YAZI EKLEME-->
<?php
if(isset($_POST['add_post']) && isset($_SESSION['role'])){
  $post_title=$_POST["post_title"];
  $titleControl=dbmyAdminPagePostsAddTitleControl($post_title);
  $titleControl=$con->query($titleControl);
  if($titleControl->num_rows==0)
  {
    $post_author=$_POST["post_author"];
    $post_author_role=$_POST["admin_role"];
    $post_date=date("d.m.Y")." ".date("H:i:s");
    $post_explanation=$_POST["post_explanation"];
    $post_content=$_POST["post_content"];
    $post_image = $_FILES['post_image']['tmp_name'];
    copy($post_image, '../img/blog-img/' . $_FILES['post_image']['name']);
    $post_image="../img/blog-img/{$_FILES['post_image']['name']}";
    $post_tag=$_POST['post_tag'];
    $post_hit=0;
    $post_comment=0;
    $new_title = multiexplode(array(",","|","{","!","#",">","<","/","*","+","-","=","%","&","*",";","}","[","]","(",")"," ","?"),$post_title);
    foreach ($new_title as $key => $value) {
      $submit.=$new_title[$key]."-";
    }
    $submit=replace_tr($submit);
    $submit=strtolower($submit);
    $submit=rtrim($submit,"-");
    $submit=rtrim($submit,"-");
    $post_url="$submit.php";
    $text=createTextforPage($post_title,$post_date,$post_author,$post_url);
    $page = fopen( "../{$submit}.php" , "w" );
    $sql_add=$con->prepare(dbmyAdminPagePostsAdd());
    $sql_add->bind_param("sssssssss",$post_author,$post_author_role,$post_date,$post_title,$post_explanation,$post_content,$post_image,$post_url,$post_tag);
    $sql_add->execute();
    $sql_add->close();

    fwrite($page, $text);
    fclose($page);
  }
  header("Location: posts.php");
}
 ?>
 <!--YAZI EKLEME FINISH-->
