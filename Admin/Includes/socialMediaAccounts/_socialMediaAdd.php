<a class='btn btn-success btn-circle ml-4' data-toggle='modal' data-target='#add_modal' href='#'><i class='fas fa-plus'></i></a><b> Add Social Media</b>
<div id="add_modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add new a social media account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                            <div class="form-group">
                                <label for="socialmedia_name">Social Media Name</label>
                                <input type="text" autofocus class="form-control" required name="socialmedia_name">
                            </div>
                            <div class="form-group">
                                <label for="socialmedia_url">URL</label>
                                <input type="url" class="form-control" required name="socialmedia_url">
                            </div>

                            <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="add_socialmedia" value="Add">
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
<!--SOSYALMEDYA EKLEME-->
<?php
   if(isset($_POST['add_socialmedia']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
     $socialmedia_name=strtolower($_POST["socialmedia_name"]);
     $socialmedia_url=$_POST["socialmedia_url"];
     $sql_add=$con->prepare(dbmyAdminSocialMediaAdd());
     $sql_add->bind_param("ss",$socialmedia_name,$socialmedia_url);
     $sql_add->execute();
     $sql_add->close();
     header("Location: socialmedias.php");
   }
?>
 <!--SOSYAL MEDYA EKLEME FINISH-->
