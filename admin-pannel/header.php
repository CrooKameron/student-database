<?php 
error_reporting(~E_NOTICE); //hides the notices
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED); //hides the errors

ob_start();
session_start();

include ('../netting/connect.php');

$askaccount=$db->prepare("SELECT * FROM admin_pannel where account_mail=:mail");
$askaccount-> execute(array (
  'mail' => $_SESSION['account_mail']
));
$accountget=$askaccount->fetch(PDO::FETCH_ASSOC);

$count=$askaccount->rowCount();

if ($count==0) {
  header("Location:login.php?durum=unauthorized");
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin Pannel</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>
    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">


    <style>
    .txtalgncenter{
      text-align:center;
    }
    .flright{
      float: right;
    }
    .flleft{
      float: left;
    }
    </style>
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-home"></i><span>&nbsp;Admin Pannel</span></a>  
            </div>
            <div class="clearfix"></div>


            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  
                  
                  <!-- <li><a href="index.php"><i class="fa fa-home"></i>Anasayfa</a></li> -->
                  <li><a href="students.php"><i class="fa fa-user"></i>Öğrenciler</a></li>
                  <!-- <li><a href="classes.php"><i class="fa fa-list"></i>Sınıflar</a></li> -->
                  <!-- <li><a href="accounts.php"><i class="fa fa-lock"></i>Yönetim paneli Hesapları</a></li> -->
                  


                  <!-- <li><a><i class="fa fa-cogs"></i> Homepage Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="generalsettings.php">General Settings</a></li>
                      <li><a href="communicationsettings.php">Communication Settings</a></li>
                      <li><a href="apisettings.php">Api Settings</a></li>
                      <li><a href="socialsettings.php">Social Settings</a></li>
                      <li><a href="mailsettings.php">Mail Settings</a></li>
                    </ul>
                  </li> -->

                  <!-- <li><a href="about.php"><i class="fa fa-info"></i>About</a></li> -->
                  <!-- <li><a href="menu.php"><i class="fa fa-bars"></i>Menus</a></li> -->
                  <!-- <li><a href="slider.php"><i class="fa fa-map-o"></i>Sliders</a></li> -->
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-ellipsis-h" aria-hidden="true"></i>
                    <!-- <span class="fa fa-angle-down"></span> -->
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                   
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i>Oturumu Kapat</a></li>
                  </ul>
                </li>

                
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->