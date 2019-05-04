<?php session_start();ob_start(); ?>
<!DOCTYPE html>
<html lang="tr">
<?php include "../Backend/_database.php"; ?>
<?php include "../Backend/general_settings.php"; ?>
<?php include "../Backend/_dbConnect.php"; ?>
<?php include "../Backend/createPage.php"; ?>
<?php isLogin();  ?>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Paneli</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <script src='../tinymce/tinymce.min.js'></script>
</head>

<body id="page-top">


  <!-- Page Wrapper -->
  <div id="wrapper">
