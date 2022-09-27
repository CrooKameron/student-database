<!DOCTYPE html>
<html lang="en">
<head>
  <? date_default_timezone_set('Europe/Istanbul'); ?>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">


      <?php 
    include ('../netting/connect.php');
   
    ?>
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
         

          <form action="../netting/process.php" method="POST">


            <h1> Yönetim Paneli </h1>
            
            <div>
              <input type="text" name="account_mail" class="form-control" placeholder="Username" required="">
            </div>
            <div>
              <input type="password" name="account_password" class="form-control" placeholder="Password" required="">
            </div>
            <div>
            <button style="width: 100%; background-color: #73879C; color:white; font-weight:bolder;" type="submit" name="adminlogin" class="btn btn-default">Log in</button>
              
            </div>

            <div class="clearfix"></div>

            <div class="separator">
              <p class="change_link">

             <?php 

             if ($_GET['durum']=="incorrect") {
             
             echo "Email adresi veya Parola hatalı!";

             }elseif ($_GET['durum']=="exit") {
             
             echo "Başarılı bir şekilde çıkış yapıldı!";

             }elseif ($_GET['durum']=="unauthorized") {
             
              echo "Yetkisiz giriş denemesi!";
 
              } 

             ?>
               
              </p>

              <div class="clearfix"></div>
              <br />

          </form>



        </section>
      </div>

    </div>
  </div>
</body>
</html>
