<!--YAZI DÜZENLEME-->
  <?php
     if((isset($_POST['edit_post'])) && (isset($_SESSION['role'])) && ($_SESSION['role']=='admin')){
       $post_title=$_POST["post_title"];
       $post_explanation=$_POST["post_explanation"];
       $post_content=$_POST["post_content"];
       $post_hide=$_POST["post_hide"];
       if(strlen($post_hide)==0)
       {
         $post_hide="off";
       }
       $post_tag=$_POST["post_tag"];
       $post_vtag=$_POST["post_vtag"];
       $sql_update=$con->prepare(dbmyAdminPagePostsEdit());
       $sql_update->bind_param("sssssi",$post_explanation,$post_content,$post_hide,$post_tag,$post_vtag,$_POST["post_id"]);
       $sql_update->execute();
       $sql_update->close();
       header("Location:posts.php");
     }
     if(isset($_POST['edit_post']) && isset($_SESSION['role']) && $_SESSION['role']!='admin'){
       if($_POST['post_author_role']!='admin'){
         $post_title=$_POST["post_title"];
         $post_explanation=$_POST["post_explanation"];
         $post_content=$_POST["post_content"];
         $post_hide=$_POST["post_hide"];
         if(strlen($post_hide)==0)
         {
           $post_hide="off";
         }
         $post_tag=$_POST["post_tag"];
         $post_vtag=$row["post_vtag"];
         $sql_update=$con->prepare(dbmyAdminPagePostsEdit());
         $sql_update->bind_param("sssssi",$post_explanation,$post_content,$post_hide,$post_tag,$post_vtag,$_POST["post_id"]);
         $sql_update->execute();
         $sql_update->close();
         header("Location:posts.php");
       }
     }
 ?>
<!--YAZI DÜZENLEME FINISH-->
