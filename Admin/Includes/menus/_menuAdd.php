<a class='btn btn-success btn-circle ml-4' data-toggle='modal' data-target='#add_modal' href='#'><i class='fas fa-plus'></i></a><b> Add Menu</b>
<div id="add_modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                            <div class="form-group">
                                <label for="socialmedia_name">Menu Name</label>
                                <input type="text" autofocus class="form-control" required name="menu_name">
                            </div>
                            <div class="form-group">
                                <label for="socialmedia_name">Menu Url</label>
                                <input type="text" autofocus class="form-control" required name="menu_url">
                            </div>
                            <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="add_menu" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
<!--menu EKLEME-->
<?php
   if(isset($_POST['add_menu']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
     $menu_name=strtoupper($_POST["menu_name"]);
     $menu_url=$_POST['menu_url'];
     $sql_add=$con->prepare(dbMenuAdd());
     $sql_add->bind_param("ss",$menu_name,$menu_url);
     $sql_add->execute();
     $sql_add->close();
     header("Location: menus.php");
   }
?>
 <!--menu EKLEME FINISH-->
