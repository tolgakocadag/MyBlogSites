<?php include "Includes/_Header.php"; ?>

<?php include "Includes/_Sidebar.php"; ?>

<?php include "Includes/_Topbar.php"; ?>
<?php include "Includes/socialMediaAccounts/_socialMediaAdd.php"; ?>
<!--KULLANICI LİSTELEME-->
<?php
$sql_list=dbmyAdminSocialMediaList();
$sql_list=$con->query($sql_list);
$k=1;
if($sql_list->num_rows>0)
{
  while ($row=$sql_list->fetch_assoc()) {
    $socialmedia_id=$row['socialmedia_ID'];
    $socialmedia_name=$row['socialmedia_NAME'];
    $socialmedia_url=$row['socialmedia_URL'];
    echo "
    <div class='row my-4'>
      <div class='form-group ml-4 col-2'>
          <input type='text' readonly class='form-control' required name='' value='{$socialmedia_name}'>
      </div>
      <div class='form-group col-3'>
          <input type='url' readonly class='form-control' required name='' value='{$socialmedia_url}'>
      </div>
      <a class='btn btn-primary btn-circle' data-toggle='modal' data-target='#edit_modal$k' href='#'><i class='fas fa-edit'></i></a>
      <a class='btn btn-danger ml-2 btn-circle' href='socialmedias.php?delete={$socialmedia_id}''><i class='fas fa-trash'></i></a>
    </div>";

    ?>
    <!--KULLANICI LİSTELEME FINISH-->
  <div id="<?php echo 'edit_modal'.$k; ?>" class="modal fade">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Social Media Accounts</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="" method="post">
                      <div class="form-group">
                          <label for="adminusers_username">Name</label>
                          <input type="text" class="form-control" required name="socialmedia_name" value="<?php echo $socialmedia_name;?>">
                      </div>
                      <div class="form-group">
                          <label for="adminusers_password">URL</label>
                          <input type="url" class="form-control" required name="socialmedia_url" value="<?php echo $socialmedia_url;?>">
                      </div>
                      <div class="form-group">
                          <input type="hidden" name="socialmedia_id" value="<?php echo $socialmedia_id;?>">
                          <input type="submit" class="btn btn-primary" name="edit_socialmedia" value="Edit">
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <?php $k++; }} ?>
</div>

<!--SOSYALMEDYA DÜZENLEME-->
  <?php include "Includes/socialMediaAccounts/_socialMediaEdit.php"; ?>
<!--SOSYALMEDYA DÜZENLEME FINISH-->
<!--SOSYAL MEDYA SİLME-->
  <?php include "Includes/socialMediaAccounts/_socialMediaDelete.php"; ?>
<!--/SOSYAL MEDYA SİLME FINISH-->
<?php include "Includes/_Footer.php"; ?>
