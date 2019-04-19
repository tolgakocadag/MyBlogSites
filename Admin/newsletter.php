<?php include "Includes/_Header.php"; ?>
<?php include "Includes/_Sidebar.php"; ?>
<?php include "Includes/_Topbar.php"; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row">
      <h6 class="m-0 font-weight-bold text-primary my-2">Newsletter Table</h6>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
                  <tr>
                    <th>Email</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Email</th>
                  </tr>
                </tfoot>
            <tbody>
              <!--KULLANICI LİSTELEME-->
              <?php
              $newsletter = fopen( "../newspaper.txt" , "a+" );
              while (!feof($newsletter))
              {
                   $okunanveri = fgets($newsletter);
                   $mails=explode(',',$okunanveri);
              }
              fclose($newsletter);
              foreach ($mails as $key => $value) {
                  $email=$value;
                  echo "<tr>
                      <td>{$email}</td>
                  </tr>";
              }

                ?>
              </div>

            </tbody>
        </table>
      </div>
    </div>
        </div>
      </div>


<?php include "Includes/_Footer.php"; ?>
