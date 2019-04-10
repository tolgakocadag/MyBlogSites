<?php include "Includes/_Header.php"; ?>

<?php include "Includes/_Sidebar.php"; ?>

<?php include "Includes/_Topbar.php"; ?>
<!--MEta tags LİSTELEME-->
<?php
$sql_list=dbCopyright();
$sql_list=$con->query($sql_list);
if($sql_list->num_rows>0)
{
  while ($row=$sql_list->fetch_assoc()) {
    $copyright_NAME=$row['copyright_NAME'];
    echo "
    <div class='row my-4'>
      <div class='form-group ml-4 col-5'>
          <input type='text' readonly class='form-control' required name='' value='{$copyright_NAME}'>
      </div>
      <a class='btn btn-primary btn-circle' data-toggle='modal' data-target='#edit_modal' href='#'><i class='fas fa-edit'></i></a>
    </div>";

    ?>
    <!--Meta tags LİSTELEME FINISH-->
  <div id="edit_modal" class="modal fade">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Copyright</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="" method="post">
                      <div class="form-group">
                          <label for="menu_name">Text</label>
                          <input type="text" class="form-control" required name="copyright_name" value="<?php echo $copyright_NAME;?>">
                      </div>
                      <div class="form-group">
                          <input type="submit" class="btn btn-primary" name="edit_copyright" value="Edit">
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <?php }} ?>
</div>

<!--Meta DÜZENLEME-->
  <?php include "Includes/copyright/_copyrightEdit.php"; ?>
<!--Meta DÜZENLEME FINISH-->
<?php include "Includes/_Footer.php"; ?>
