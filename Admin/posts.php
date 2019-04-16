<?php include "Includes/_Header.php"; ?>
<?php include "Includes/_Sidebar.php"; ?>
<?php include "Includes/_Topbar.php"; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <h6 class="m-0 font-weight-bold text-primary my-2">Posts Table</h6>
      <a class='btn btn-success btn-circle ml-4' data-toggle='modal' data-target='#add_modal' href='#'><i class='fas fa-plus'></i></a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>URL</th>
                    <th>Hit Count</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date</th>
                    <th>Author</th>
                    <th>URL</th>
                    <th>Hit Count</th>
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
                  $post_url=$row["post_URL"];
                  $post_tag=$row["post_TAG"];
                  $post_vtag=$row["post_TAG_VISIBLE"];
                  $post_explanation=$row["post_EXPLANATION"];
                  echo "<tr>
                      <td>{$post_id}</td>
                      <td>{$post_title}</td>
                      <td>{$post_date}</td>
                      <td>{$post_author}</td>
                      <td>{$post_url}</td>
                      <td>{$post_hit}</td>
                      <td>
                      <a class='btn btn-primary btn-circle' data-toggle='modal' data-target='#edit_modal$k' href='#'><i class='fas fa-edit'></i></a>
                      <a class='btn btn-danger btn-circle' href='posts.php?delete={$post_id}'><i class='fas fa-trash'></i></a>
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
                                        <input type="text" class="form-control" readonly required name="post_title" value="<?php echo $post_title;?>">
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
                                        <label for="post_vtag">Visible Tags</label>
                                        <input type="text" value="<?php  echo $post_vtag; ?>" class="form-control" required name="post_vtag">
                                    </div>
                                    <div class="form-group">
                                        <label for="post_explanation">explanation</label>
                                        <input type="text" class="form-control" value="<?php echo $post_explanation; ?>" required name="post_explanation">
                                    </div>
                                    <script>
                                        tinymce.init({
                                          selector: '#myTextareaedit<?php echo $k ?>',
                                          height: 500,
                                          theme: 'modern',
                                          plugins: [
                                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                                            'insertdatetime media nonbreaking save table contextmenu directionality',
                                            'emoticons template paste textcolor colorpicker textpattern imagetools'
                                          ],
                                          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                                          toolbar2: 'print preview media | forecolor backcolor emoticons',
                                          image_advtab: true
                                        });
                                    </script>
                                    <div class="form-group">
                                        <label for="post_content">Content</label>
                                        <textarea id="myTextareaedit<?php echo $k; ?>" name="post_content"><?php echo $post_content; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="post_author_role" value="<?php echo $post_author_role; ?>">
                                        <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
                                        <input type="submit" class="btn btn-primary" name="edit_post" value="Edit">
                                    </div>
                                </form>
                            </div>
                        </div>
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
                                    <div class="form-group">
                                        <label for="post_visiblelabels">Visible labels</label>
                                        <input type="text" class="form-control" required name="post_visiblelabels">
                                    </div>
                                    <div class="form-group">
                                        <label for="post_explanation">explanation</label>
                                        <input type="text" class="form-control" required name="post_explanation">
                                    </div>
                                    <script>
                                        tinymce.init({
                                          selector: '#myTextarea',
                                          height: 500,
                                          theme: 'modern',
                                          plugins: [
                                            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                                            'insertdatetime media nonbreaking save table contextmenu directionality',
                                            'emoticons template paste textcolor colorpicker textpattern imagetools'
                                          ],
                                          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                                          toolbar2: 'print preview media | forecolor backcolor emoticons',
                                          image_advtab: true
                                        });
                                    </script>
                                    <div class="form-group my-4">
                                        <label for="post_content">Content</label>
                                        <textarea id="myTextarea" name="post_content" ></textarea>
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
        </div>
      </div>

      <?php include "Includes/posts/_postsAdd.php"; ?>
      <?php include "Includes/posts/_postsEdit.php"; ?>
      <?php include "Includes/posts/_postsDelete.php"; ?>
<?php include "Includes/_Footer.php"; ?>
