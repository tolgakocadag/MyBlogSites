<?php include "Includes/_Header.php"; ?>
<?php include "Includes/_Sidebar.php"; ?>
<div id="content-wrapper">
    <div class="container-fluid">

        <!-- DataTables -->
        <div class="card ">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Comments Table</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name and Surname</th>
                    <th>Email</th>
                    <th>İp</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>isVisible</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Name and Surname</th>
                    <th>Email</th>
                    <th>İp</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>isVisible</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
            <tbody>
              <!--YORUM LİSTELEME-->
              <?php
              $sql_list=dbCommentList();
              $sql_list=$con->query($sql_list);
              $k=1;
              if($sql_list->num_rows>0)
              {
                while ($row=$sql_list->fetch_assoc()) {
                  $comment_id=$row["comment_ID"];
                  $comment_author=$row["comment_AUTHOR"];
                  $comment_email=$row["comment_EMAIL"];
                  $comment_ip=$row["comment_IP"];
                  $comment_text=$row['comment_TEXT'];
                  $comment_date=$row["comment_DATE"];
                  $comment_isvisible=$row["comment_VISIBLE"];

                  echo "<tr>
                      <td>{$comment_id}</td>
                      <td>{$comment_author}</td>
                      <td>{$comment_email}</td>
                      <td>{$comment_ip}</td>
                      <td>{$comment_text}</td>
                      <td>{$comment_date}</td>
                      <td>{$comment_isvisible}</td>
                      <td>
                          <div class='dropdown'>
                              <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                  Actions
                              </button>
                              <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                  <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Edit</a>
                                  <div class='dropdown-divider'></div>
                                  <a class='dropdown-item' href='comments.php?delete={$comment_id}'>Delete</a>

                              </div>
                          </div>
                      </td>
                  </tr>";
              }

                ?>
                <!--YORUM LİSTELEME FINISH-->

                <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Comments</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="comments_name">Name and Surname</label>
                                        <input type="text" class="form-control" readonly required name="comments_name" value="<?php echo $comment_author;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="comments_name">İp adresi</label>
                                        <input type="text" class="form-control" readonly required name="comments_name" value="<?php echo $comment_ip;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="comments_name">Date</label>
                                        <input type="text" class="form-control" readonly required name="comments_name" value="<?php echo $comment_date;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="comments_name">Message</label>
                                        <textarea type="textarea" class="form-control" rows="4" readonly required name="comments_name"><?php echo $comment_text; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="comments_email">Email</label>
                                        <input type="email" class="form-control" readonly required name="comments_email" value="<?php echo $comment_email;?>">
                                    </div>
                                    <div class="form-group form-check col-6 my-2 justign-align-center">
                                      <center>
                                        <?php
                                            if($comment_isvisible=='on'){
                                              echo "<input type='checkbox' name='comment_hide' checked class='form-check-input' id='exampleCheck1'>
                                              <label class='form-check-label' for='exampleCheck1'>Visible</label>";
                                            }
                                            else {
                                              echo "<input type='checkbox' name='comment_hide' class='form-check-input' id='exampleCheck1'>
                                              <label class='form-check-label' for='exampleCheck1'>Visible</label>";
                                            }
                                         ?>
                                      </center>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="comment_id" value="<?php echo $comment_id?>">
                                        <input type="submit" class="btn btn-primary" name="edit_comment" value="Edit">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>

                <?php $k++; } ?>

            </tbody>
        </table>
      </div>
    </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>

       <!--YORUM DÜZENLEME-->
         <?php
            if(isset($_POST['edit_comment']) && isset($_SESSION['role'])){
              $hide=$_POST["comment_hide"];
              if($hide==''){
                $hide='off';
              }
              $sql_update=$con->prepare(dbCommentEdit());
              $sql_update->bind_param("si",$hide,$_POST['comment_id']);
              $sql_update->execute();
              $sql_update->close();
              header("Location: comments.php");
            }
        ?>
       <!--YORUM DÜZENLEME FINISH-->

       <!--YORUM SİLME-->
       <?php
       if(isset($_GET["delete"]) && isset($_SESSION['role']) && $_SESSION['role']=='admin' ){
         $del_comments_id=$_GET['delete'];
         $sql_delete=$con->prepare(dbCommentDelete());
         $sql_delete->bind_param("i",$del_comments_id);
         $sql_delete->execute();
         $sql_delete->close();
         header("Location: comments.php");
       }
        ?>
       <!--/KULLANICI SİLME FINISH-->
<?php include "Includes/_Footer.php"; ?>
