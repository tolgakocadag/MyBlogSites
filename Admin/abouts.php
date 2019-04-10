<?php include "Includes/_Header.php"; ?>

<?php include "Includes/_Sidebar.php"; ?>

<?php include "Includes/_Topbar.php"; ?>
<!--KULLANICI LİSTELEME-->
<?php
$sql_list=dbAboutList();
$sql_list=$con->query($sql_list);
if($sql_list->num_rows>0)
{
  $row=$sql_list->fetch_assoc();
    $about_id=$row['about_ID'];
    $about_name=$row['about_NAME'];
    $about_job=$row['about_JOB'];
    $about_image=$row['about_IMAGE'];
    $about_short=$row['about_SHORT'];
    $about_long=$row['about_LONG'];
    echo "
    <div class='row my-4'>
      <div class='form-group ml-4 col-2'>
          <label>Name Surname</label>
          <input type='text' readonly class='form-control' required name='' value='{$about_name}'>
      </div>
      <div class='form-group col-3'>
          <label>Job</label>
          <input type='text' readonly class='form-control' required name='' value='{$about_job}'>
      </div>
      <div class='form-group col-6'>
          <label>Image</label>
          <input type='text' readonly class='form-control' required name='' value='{$about_image}'>
      </div>
      <div class='form-group col-11 ml-4'>
          <label>Short Text</label>
          <input type='text' readonly class='form-control' required name='' value='{$about_short}'>
      </div>
      <div class='form-group col-11 ml-4'>
          <label>Long Text</label>
          <textarea type='textarea' readonly class='form-control' rows='15' required name=''><?php echo $about_long;?></textarea>
      </div>
      <a style=margin-left:50% class='btn btn-primary btn-circle' data-toggle='modal' data-target='#edit_modal' href='#'><i class='fas fa-edit'></i></a>
    </div>";

    ?>
    <!--KULLANICI LİSTELEME FINISH-->
  <div id="edit_modal" class="modal fade">
      <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit about</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form action="" method="post" enctype="multipart/form-data">
                      <div class="row">
                        <div class="form-group col-3">
                            <input type="text" class="form-control" placeholder="Name Surname..." required name="about_name" value="<?php echo $about_name;?>">
                        </div>
                        <div class="form-group col-3">
                            <input type="text" class="form-control" placeholder="Job..." required name="about_job" value="<?php echo $about_job;?>">
                        </div>
                        <div class="custom-file col-6">
                          <input type="file" name="about_image" class="custom-file-input" required  aria-describedby="inputGroupFileAddon03">
                          <label class="custom-file-label" for="post_image">Choose Image</label>
                        </div>
                      </div>
                      <div class="form-group">
                          <label for="adminusers_password">Short Text</label>
                          <input type="text" class="form-control" required name="about_short" value="<?php echo $about_short;?>">
                      </div>
                      <div class="form-group">
                        <script>
                            tinymce.init({
                              selector: '#myTextareaedit',
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
                          <label for="adminusers_password">Long Text</label>
                          <textarea id='myTextareaedit' required name='about_long'><?php echo $about_long;?></textarea>
                      </div>
                      <div class="form-group">
                          <input type="hidden" name="about_id" value="<?php echo $about_id;?>">
                          <input type="submit" class="btn btn-primary" name="edit_about" value="Edit">
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>

  <?php } ?>
</div>
<!--ABOUT EDİT-->
<?php
   if(isset($_POST['edit_about']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
     $about_name=$_POST['about_name'];
     $about_job=$_POST['about_job'];
     $about_image = $_FILES['about_image']['tmp_name'];
     copy($about_image, '../img/about-img/'.$_FILES['about_image']['name']);
     $about_image="img/about-img/{$_FILES['about_image']['name']}";
     $about_short=$_POST['about_short'];
     $about_long=$_POST['about_long'];
     $sql_update=$con->prepare(dbAboutEdit());
     $sql_update->bind_param("sssssi",$about_name,$about_job,$about_image,$about_short,$about_long,$_POST['about_id']);
     $sql_update->execute();
     $sql_update->close();
     header("Location: abouts.php");
   }
?>
<!--ABOUT EDİT FINISH-->
<?php include "Includes/_Footer.php"; ?>
