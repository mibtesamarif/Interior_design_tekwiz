<?php
if(!isset($_SESSION['designerEmail'])){
  echo "<script>location.assign('../index.php')</script>";
}
?>
<!doctype html>
<html lang="en">


<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- loader-->
  <link href="../assets/css/pace.min.css" rel="stylesheet" />
  <script src="../assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="../assets/css/dark-theme.css" rel="stylesheet" />
  <link href="../assets/css/semi-dark.css" rel="stylesheet" />
  <link href="../assets/css/header-colors.css" rel="stylesheet" />

  <title>Fobia - Bootstrap5 Admin Template</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img src="../assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon">
    </div>
    <div>
      <h4 class="logo-text">Designer Panel</h4>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li>
      <a href="designer.php">
        <div class="parent-icon">
          <ion-icon name="home-outline"></ion-icon>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>

    <!-- Category Management -->
    <li>

      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon">
          <ion-icon name="pricetags-outline"></ion-icon>
        </div>
        <div class="menu-title">Portfolio Designs</div>
      </a>
      <ul>
        <li><a href="add_portfolio_designs.php">
            <ion-icon name="ellipse-outline"></ion-icon>Add Designs

          </a>
        </li>
        <li><a href="view-portfolio.php">
            <ion-icon name="ellipse-outline"></ion-icon>View Designs
          </a>
        </li>
      </ul>
    </li>





 






    


 

  <!--end navigation-->
</aside>

    <!--end sidebar -->