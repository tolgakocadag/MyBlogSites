<?php include "Includes/_Header.php"; ?>
<?php include "Includes/_Sidebar.php"; ?>
<div id="content-wrapper">
    <div class="container-fluid">
      <a class="btn btn-large btn-primary my-4" style="color:white;" data-toggle="modal" data-target="#add_modal">Add Users</a>

        <!-- DataTables -->
        <div class="card ">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Admin Users Table</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nickname</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Nickname</th>
                    <th>Role</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
            <tbody>
              <!--KULLANICI LİSTELEME-->
              <?php
              $sql_list=dbAdminUserList();
              $sql_list=$con->query($sql_list);
              $k=1;
              if($sql_list->num_rows>0)
              {
                while ($row=$sql_list->fetch_assoc()) {
                  $admin_id=$row["admin_ID"];
                  $admin_username=$row["admin_USERNAME"];
                  $admin_email=$row["admin_EMAIL"];
                  $admin_password=$row["admin_PASSWORD"];
                  $admin_nickname=$row['admin_NICKNAME'];
                  $admin_role=$row["admin_ROLE"];
                  echo "<tr>
                      <td>{$admin_id}</td>
                      <td>{$admin_username}</td>
                      <td>{$admin_email}</td>
                      <td>{$admin_nickname}</td>
                      <td>{$admin_role}</td>
                      <td>
                          <div class='dropdown'>
                              <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                  Actions
                              </button>
                              <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                  <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$k' href='#'>Edit</a>
                                  <div class='dropdown-divider'></div>
                                  <a class='dropdown-item' href='adminUsers.php?delete={$admin_id}'>Delete</a>

                              </div>
                          </div>
                      </td>
                  </tr>";
              }

                ?>
                <!--KULLANICI LİSTELEME FINISH-->

                <div id="edit_modal<?php echo $k; ?>" class="modal fade">
                    <div class="modal-dialog" role="document">
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
                                        <label for="adminusers_username">Username</label>
                                        <input type="text" class="form-control" required name="adminusers_username" value="<?php echo $admin_username;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="adminusers_email">Email</label>
                                        <input type="email" class="form-control" required name="adminusers_email" value="<?php echo $admin_email;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="adminusers_password">Password</label>
                                        <input type="password" class="form-control" required name="adminusers_password" value="<?php echo $admin_password;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="adminusers_password">Nickname</label>
                                        <input type="text" class="form-control" required name="adminusers_nickname" value="<?php echo $admin_nickname;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="adminusers_role">Role</label>
                                        <select class="form-group" name="adminusers_role">
                                          <?php
                                              if ($admin_role=="admin") {
                                                echo "<option value='admin'>
                                                Admin
                                                </option>
                                                <option value='moderator'>
                                                Moderatör
                                                </option>";
                                              }
                                              else {
                                                echo "
                                                <option value='moderator'>
                                                Moderator
                                                </option>
                                                <option value='admin'>
                                                Admin
                                                </option>";
                                              }
                                           ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <input type="hidden" name="admin_id" value="<?php echo $admin_id?>">
                                        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit">
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

        <div id="add_modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                                    <div class="form-group">
                                        <label for="adminusers_username">USERNAME</label>
                                        <input type="text" class="form-control" required name="adminusers_username">
                                    </div>
                                    <div class="form-group">
                                        <label for="adminusers_email">Email</label>
                                        <input type="email" class="form-control" required name="adminusers_email">
                                    </div>
                                    <div class="form-group">
                                        <label for="adminusers_password">Password</label>
                                        <input type="password" class="form-control" required name="adminusers_password">
                                    </div>
                                    <div class="form-group">
                                        <label for="adminusers_nickname">Nickname</label>
                                        <input type="text" class="form-control" required name="adminusers_nickname" >
                                    </div>
                                    <div class="form-group">
                                        <label for="adminusers_role">Role</label>
                                        <select class="form-group" name="adminusers_role">
                                          <option value="admin">Admin</option>
                                          <option value="moderator">Moderator</option>
                                        </select>
                                    </div>

                            <div class="form-group">
                                <input type="hidden" name="admin_id" value="">
                                <input type="submit" class="btn btn-primary" name="add_user" value="Add">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
      </div>

      <!--KULLLANICI EKLEME-->
      <?php
         if(isset($_POST['add_user']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
           $user_name=$_POST["adminusers_username"];
           $user_email=$_POST["adminusers_email"];
           $user_password=$_POST["adminusers_password"];
           $user_nickname=$_POST["adminusers_nickname"];
           $user_role=$_POST["adminusers_role"];
           $sql_add=$con->prepare(dbAdminUserAdd());
           $sql_add->bind_param("sssss",$user_name,$user_password,$user_role,$user_nickname,$user_email);
           $sql_add->execute();
           $sql_add->close();
           header("Location: adminUsers.php");
         }
     ?>
       <!--KULLANICI EKLEME FINISH-->

       <!--KULLANICI DÜZENLEME-->
         <?php
            if(isset($_POST['edit_user']) && isset($_SESSION['role']) && $_SESSION['role']=='admin'){
              $user_name=$_POST["adminusers_username"];
              $user_email=$_POST["adminusers_email"];
              $user_password=$_POST["adminusers_password"];
              $user_nickname=$_POST["adminusers_nickname"];
              $user_role=$_POST["adminusers_role"];
              $sql_update=$con->prepare(dbAdminUserEdit());
              $sql_update->bind_param("sssssi",$user_name,$user_password,$user_role,$user_nickname,$user_email,$_POST['admin_id']);
              $sql_update->execute();
              $sql_update->close();
              header("Location: adminUsers.php");
            }
        ?>
       <!--KULLANICI DÜZENLEME FINISH-->

       <!--KULLANICI SİLME-->
       <?php
       if(isset($_GET["delete"]) && isset($_SESSION['role']) && $_SESSION['role']=='admin' ){
         $del_users_id=$_GET['delete'];
         $sql_delete=$con->prepare(dbAdminUserDelete());
         $sql_delete->bind_param("i",$del_users_id);
         $sql_delete->execute();
         $sql_delete->close();
         header("Location: adminUsers.php");
       }
        ?>
       <!--/KULLANICI SİLME FINISH-->


<?php include "Includes/_Footer.php"; ?>
