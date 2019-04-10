<?php
   if(isset($_POST['edit_menu']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
     $menu_name=strtoupper($_POST["menu_name"]);
     $menu_url=$_POST['menu_url'];
     $sql_update=$con->prepare(dbMenuEdit());
     $sql_update->bind_param("ssi",$menu_name,$menu_url,$_POST['menu_id']);
     $sql_update->execute();
     $sql_update->close();
     header("Location: menus.php");
   }
?>
