<?php include "Includes/_Header.php"; ?>
<?php include "Includes/_Sidebar.php"; ?>
<div id="content-wrapper">
    <div class="container-fluid">
       <div class="row">
         <a class="btn btn-large btn-primary p-3 offset-1 my-4 col-1" style="color:white;" data-toggle="modal" data-target="#add_modal">ADD POST</a>
         <div class="alert alert-warning offset-1 col-4 my-4 alert-dismissible fade show" role="alert">
           Total number of posts: <strong>

             <?php $post_count=dbmyAdminPagePostsList();
              $post_count=$con->query($post_count);
              echo $post_count->num_rows;
            ?></strong>
         </div>
       </div>

        <!-- DataTables -->
        <div class="card ">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Posts Table</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Hit Count</th>
                    <th>Comment Count</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>Content</th>
                    <th>Hit Count</th>
                    <th>Comment Count</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
            <tbody>
              <!--YAZILARI LİSTELEME-->
              <?php
              $sql_list=dbmyAdminPagePostsList();
              $sql_list=$con->query($sql_list);
              $k=1;
              if($sql_list->num_rows>0)
              {
                while ($row=$sql_list->fetch_assoc()) {
                  $post_id=$row["post_ID"];
                  $post_author=$row["post_AUTHOR"];
                  $post_author_role=$row["post_AUTHOR_ROLE"];
                  $post_date=$row["post_DATE"];
                  $post_title=$row["post_TITLE"];
                  $post_hide=$row["post_HIDE"];
                  $post_content=$row['post_CONTENT'];
                  $post_hit=$row["post_HIT"];
                  $post_comment_count=$row["post_COMMENT_COUNT"];
                  $post_tag=$row["post_TAG"];
                  echo "<tr>
                      <td>{$post_id}</td>
                      <td>{$post_title}</td>
                      <td>{$post_date}</td>
                      <td>{$post_author}</td>
                      <td>".substr($post_content,0,50)."...</td>
                      <td>{$post_hit}</td>
                      <td>{$post_comment_count}</td>
                      <td  style='width:5%'>
                          <div class='dropdown'>
                              <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                  Actions
                              </button>
                              <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                  <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Edit</a>
                                  <div class='dropdown-divider'></div>
                                  <a class='dropdown-item' href='posts.php?delete={$post_id}'>Delete</a>

                              </div>
                          </div>
                      </td>
                  </tr>";
                  ?>
                <!--YAZILARI LİSTELEME FINISH-->

                <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Users</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="post_title">title</label>
                                        <input type="text" class="form-control" required name="post_title" value="<?php echo $post_title;?>">
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-6">
                                          <input type="email" class="form-control" readonly required name="post_author" value="<?php echo $post_author;?>">
                                        </div>
                                        <div class="form-group form-check col-6 my-2 justign-align-center">
                                          <center>
                                            <?php
                                                if($post_hide=='on'){
                                                  echo "<input type='checkbox' name='post_hide' checked class='form-check-input' id='exampleCheck1'>
                                                  <label class='form-check-label' for='exampleCheck1'>Hide</label>";
                                                }
                                                else {
                                                  echo "<input type='checkbox' name='post_hide' class='form-check-input' id='exampleCheck1'>
                                                  <label class='form-check-label' for='exampleCheck1'>Hide</label>";
                                                }
                                             ?>
                                          </center>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_tag">Tags</label>
                                        <input type="text" value="<?php  echo $post_tag; ?>" class="form-control" required name="post_tag">
                                    </div>
                                    <div class="form-group">
                                        <label for="post_content">Content</label>
                                        <textarea type="textarea" class="form-control" rows="10" required name="post_content"><?php echo $post_content; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="post_author_role" value="<?php echo $post_author_role; ?>">
                                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                        <input type="submit" class="btn btn-primary" name="edit_post" value="Edit">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                    </div>
                </div>

                <?php $k++; }} ?>

            </tbody>
        </table>
      </div>
    </div>

        <div id="add_modal" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="post_title">Title</label>
                                        <input type="text" autofocus class="form-control" required name="post_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="post_author">Author</label>
                                        <input type="text" readonly class="form-control" required name="post_author" value="<?php echo $_SESSION['nickname'];?>">
                                    </div>
                                    <div class="form-group">
                                      <div class="custom-file">
                                        <input type="file" name="post_image" class="custom-file-input" required  aria-describedby="inputGroupFileAddon03">
                                        <label class="custom-file-label" for="post_image">Choose file</label>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="post_tag">Tags</label>
                                        <input type="text" class="form-control" required name="post_tag">
                                    </div>
                                    <div class="form-group my-4">
                                        <label for="post_content">Content</label>
                                        <textarea type="textarea" class="form-control" rows="10" required name="post_content" ></textarea>
                                    </div>
                            <div class="form-group">
                                <input type="hidden" name="admin_role" value="<?php echo $_SESSION['role']; ?>">
                                <input type="submit" class="btn btn-primary" name="add_post" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>

      <?php include "Includes/posts/_postsAdd.php"; ?>
      <?php include "Includes/posts/_postsEdit.php"; ?>
      <?php include "Includes/posts/_postsDelete.php"; ?>
<?php include "Includes/_Footer.php"; ?>
