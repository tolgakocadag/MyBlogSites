<?php include "Includes/_Header.php"; ?>

<?php include "Includes/_Sidebar.php"; ?>

<?php include "Includes/_Topbar.php"; ?>
<!--MEta tags LİSTELEME-->
<?php
$sql_list=dbMetaTagsList();
$sql_list=$con->query($sql_list);
$k=1;
if($sql_list->num_rows>0)
{
  while ($row=$sql_list->fetch_assoc()) {
    $metatag_id=$row['metatag_ID'];
    $metatag_name=$row['metatag_NAME'];
    $metatag_content=$row['metatag_CONTENT'];
    echo "
    <div class='row my-4'>
      <div class='form-group ml-4 col-2'>
          <input type='text' readonly class='form-control' required name='' value='{$metatag_name}'>
      </div>
      <div class='form-group ml-4 col-2'>
          <input type='text' readonly class='form-control' required name='' value='{$metatag_content}'>
      </div>
      <a class='btn btn-primary btn-circle' data-toggle='modal' data-target='#edit_modal$k' href='#'><i class='fas fa-edit'></i></a>
    </div>";

    ?>
    <!--Meta tags LİSTELEME FINISH-->
  <div id="<?php echo 'edit_modal'.$k; ?>" class="modal fade">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Meta Tag</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="" method="post">
                      <div class="form-group">
                          <label for="menu_name">Name</label>
                          <input type="text" class="form-control" readonly required name="metatag_name" value="<?php echo $metatag_name;?>">
                      </div>
                      <div class="form-group">
                          <label for="menu_url">Content</label>
                          <input type="text" class="form-control" required name="metatag_content" value="<?php echo $metatag_content?>">
                      </div>
                      <div class="form-group">
                          <input type="hidden" name="metatag_id" value="<?php echo $metatag_id;?>">
                          <input type="submit" class="btn btn-primary" name="edit_metatag" value="Edit">
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <?php $k++; }} ?>
</div>

<!--Meta DÜZENLEME-->
  <?php include "Includes/metaTags/_metaTagsEdit.php"; ?>
<!--Meta DÜZENLEME FINISH-->
<?php include "Includes/_Footer.php"; ?>
