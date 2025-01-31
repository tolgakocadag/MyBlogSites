<?php
  session_start();ob_start();
  include "../Backend/_database.php";
  include "../Backend/general_settings.php";
  include "../Backend/_dbConnect.php";
  isLogin();

  if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $username=mysqli_real_escape_string($con,$username);//kullanıcı adını güvenlik kontrolünden geçiriyoruz.
    $password=mysqli_real_escape_string($con,$password);
    $query=dbLoginConnect($username);
    $query=$con->query($query);
    if($query->num_rows>0){
      while ($row=$query->fetch_assoc()) {
        $db_admin_username=$row["admin_USERNAME"];
        $db_admin_password=$row["admin_PASSWORD"];
        $db_admin_role=$row["admin_ROLE"];
        $db_admin_nickname=$row["admin_NICKNAME"];
      }
    }
    mysqli_stmt_close();
    if($username!==$db_admin_username&&$password!==$db_admin_password){
      header("Location: login.php");
    }
    else if($username==$db_admin_username&&$password==$db_admin_password){
      $_SESSION["username"]=$db_admin_username;
      $_SESSION["nickname"]=$db_admin_nickname;
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

   <title>SB Admin 2 - Login</title>

   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="css/sb-admin-2.min.css" rel="stylesheet">

 </head>

 <body class="bg-gradient-primary">

   <div class="container">

     <!-- Outer Row -->
     <div class="row justify-content-center">

       <div class="col-xl-10 col-lg-12 col-md-9">

         <div class="card o-hidden border-0 shadow-lg my-5">
           <div class="card-body p-0">
             <!-- Nested Row within Card Body -->
             <div class="row">
               <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
               <div class="col-lg-6">
                 <div class="p-5">
                   <div class="text-center">
                     <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                   </div>
                   <form class="user" method="post" action="">
                     <div class="form-group">
                       <input type="text" class="form-control form-control-user" name="username" required id="exampleInputUser" placeholder="Username">
                     </div>
                     <div class="form-group">
                       <input type="password" class="form-control form-control-user" name="password" required id="exampleInputPassword" placeholder="Password">
                     </div>
                     <div class="form-group">
                       <div class="custom-control custom-checkbox small">
                         <input type="checkbox" class="custom-control-input" id="customCheck">
                         <label class="custom-control-label" for="customCheck">Remember Me</label>
                       </div>
                     </div>
                     <button type="submit" name="login" class="btn btn-primary btn-user btn-block">
                       Login
                     </button>
                     <hr>
                     <a href="#" class="btn btn-google btn-user btn-block">
                       <i class="fab fa-google fa-fw"></i> Login with Google
                     </a>
                     <a href="#" class="btn btn-facebook btn-user btn-block">
                       <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                     </a>
                   </form>
                   <hr>
                   <div class="text-center">
                     <a class="small" href="#">Forgot Password?</a>
                   </div>
                   <div class="text-center">
                     <a class="small" href="#">Create an Account!</a>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>

       </div>

     </div>

   </div>

   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

   <!-- Core plugin JavaScript-->
   <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

   <!-- Custom scripts for all pages-->
   <script src="js/sb-admin-2.min.js"></script>

 </body>

 </html>
