<?php 
require "koneksi.php";
session_start();

if(isset($_SESSION["user"])){
  header("Location: dashboard.php");
} 

if(isset($_POST['blogin'])) { 
    $user_hp = $_POST['user_hp']; 
    $user_password = MD5($_POST['user_password']);

    try {
        $sql = "SELECT * FROM tb_user WHERE user_hp = :user_hp AND user_password = :user_password";
        $stmt = $koneksi->prepare($sql); 
        $stmt->bindParam(':user_hp', $user_hp);
        $stmt->bindParam(':user_password', $user_password);
        $stmt->execute(); 

        $count = $stmt->rowCount(); 

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($count == 1) {  
          if($user['user_level']=='admin'){
            $_SESSION['user'] = $user_hp; 
            $_SESSION['level'] = $user['user_level']; 
            header("Location: dashboard.php"); 
            return;
          } else if ($user['user_level']=='manager'){
            $_SESSION['user'] = $user_hp; 
            $_SESSION['level'] = $user['user_level']; 
            header("Location: manager.php"); 
            return;
          }
        }else{
            echo "Anda tidak dapat login";
        }
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CV App | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="aset/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="aset/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="aset/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>PT. SUKSES ABADI INDONESIA</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to CV App</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="masukkan nomor hp" name="user_hp">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="user_password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">

          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="blogin">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="aset/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="aset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTEApp -->
<script src="aset/dist/js/adminlte.min.js"></script>
</body>
</html>
