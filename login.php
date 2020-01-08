<?php 

  @session_start();
  include 'config/connection.php';
 error_reporting(0);
  if (isset($_POST['sigin'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "select * from user where username='$user' and password='$pass'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);
    $row = mysqli_num_rows($query);
    if ($row > 0) {
      if ($data['level']=='admin') {
        $_SESSION['logged'] = 1;
      }elseif ($data['level']=='operator') {
       $_SESSION['logged'] = 2;
      }else{
        $_SESSION['logged'] = null;
      }
      //$_SESSION['logged'] = 1;
      $_SESSION['id_user'] = $data['id_user'];
      $_SESSION['name'] = $data['nama'];
      
      echo "<script>alert('Login berhasil!');window.location.href='index.php'</script>";  

    }
  //    else {

  //   $sql = "select * from karyawan where username='$user' and password='$pass'";
  //   $query = mysqli_query($con, $sql);
  //   $data = mysqli_fetch_assoc($query);
  //   $row = mysqli_num_rows($query);
  //   if ($row > 0) {
  //     $_SESSION['logged'] = 2;
  //     $_SESSION['id_user'] = $data['NIP'];
  //     $_SESSION['name'] = $data['nama_karyawan'];
      
  //     echo "<script>alert('Login berhasil!');window.location.href='index.php'</script>";  
  //   } else {
  //       echo "<script>alert('Username atau Password salah!')</script>";
  //   }
  // }
}

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Kinerja</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <div class="login-logo">
    <!-- <a href="../../index2.html"><b>Fuzzy</b>AHP</a> -->
    <img src="assets/img/logo.jpeg" width="300px">
  </div>
    <p class="login-box-msg">Sign in to start your session</p>

    <form method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="sigin">Sign In</button>
          <div class="" style="margin-top: 10px;">
            <a href="index.php">Kembali ke Halaman utama?</a>
          </div>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
