<?php
  include "../backend/_database.php";
  include "../backend/general_settings.php";
  ses_start();isLogin();
  
  if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $username=mysqli_real_escape_string($con,$username);//kullanıcı adını güvenlik kontrolünden geçiriyoruz.
    $password=mysqli_real_escape_string($con,$password);

    $query="SELECT * FROM admin_users WHERE admin_USERNAME='{$username}'";
    $select_admin_query=mysqli_query($con,$query);

    while ($row=mysqli_fetch_assoc($select_admin_query)) {
      $db_admin_adi=$row["admin_ID"];
      $db_admin_username=$row["admin_USERNAME"];
      $db_admin_password=$row["admin_PASSWORD"];
      $db_admin_email=$row["admin_EMAIL"];
      $db_admin_role=$row["admin_ROLE"];
      $db_admin_nickname=$row["admin_NICKNAME"];
    }
    if($username!==$db_admin_username&&$password!==$db_admin_password){
      header("Location: login.php");
    }
    else if($username==$db_admin_username&&$password==$db_admin_password){
      $_SESSION["username"]=$db_admin_username;
      $_SESSION["nickname"]=$db_admin_nickname;
      $_SESSION["email"]=$db_admin_email;
      $_SESSION["role"]=$db_admin_role;
      header("Location:index.php");
    }
    else {
      header("Location:login.php");
    }

  }
 ?>
<!DOCTYPE html>
<html lang="tr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form method="post" action="">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required="required" autofocus="autofocus">
                <label for="inputUsername">Username</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
