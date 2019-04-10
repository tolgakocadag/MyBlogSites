<?php include "Includes/_Header.php"; ?>

<?php include "Includes/_Sidebar.php"; ?>

<?php include "Includes/_Topbar.php"; ?>
<?php include "Includes/menus/_menuAdd.php"; ?>
<!--MENU LİSTELEME-->
<?php
$sql_list=dbMenuList();
$sql_list=$con->query($sql_list);
$k=1;
if($sql_list->num_rows>0)
{
  while ($row=$sql_list->fetch_assoc()) {
    $menu_id=$row['menu_ID'];
    $menu_name=$row['menu_NAME'];
    $menu_url=$row['menu_URL'];
    echo "
    <div class='row my-4'>
      <div class='form-group ml-4 col-2'>
          <input type='text' readonly class='form-control' required name='' value='{$menu_name}'>
      </div>
      <div class='form-group ml-4 col-2'>
          <input type='text' readonly class='form-control' required name='' value='{$menu_url}'>
      </div>
      <a class='btn btn-primary btn-circle' data-toggle='modal' data-target='#edit_modal$k' href='#'><i class='fas fa-edit'></i></a>
      <a class='btn btn-danger ml-2 btn-circle' href='menus.php?delete={$menu_id}''><i class='fas fa-trash'></i></a>
    </div>";

    ?>
    <!--MENU LİSTELEME FINISH-->
  <div id="<?php echo 'edit_modal'.$k; ?>" class="modal fade">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Menu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="" method="post">
                      <div class="form-group">
                          <label for="menu_name">Name</label>
                          <input type="text" class="form-control" required name="menu_name" value="<?php echo $menu_name;?>">
                      </div>
                      <div class="form-group">
                          <label for="menu_url">Url</label>
                          <input type="text" class="form-control" required name="menu_url" value="<?php echo $menu_url;?>">
                      </div>
                      <div class="form-group">
                          <input type="hidden" name="menu_id" value="<?php echo $menu_id;?>">
                          <input type="submit" class="btn btn-primary" name="edit_menu" value="Edit">
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <?php $k++; }} ?>
</div>

<!--MENU DÜZENLEME-->
  <?php include "Includes/menus/_menuEdit.php"; ?>
<!--MENU DÜZENLEME FINISH-->
<!--MENU SİLME-->
  <?php include "Includes/menus/_menuDelete.php"; ?>
<!--/MENU FINISH-->
<?php include "Includes/_Footer.php"; ?>
