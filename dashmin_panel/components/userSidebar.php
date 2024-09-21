<<<<<<< HEAD
<?php
if(!isset($_SESSION['userEmail'])){
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
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>

  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">

  <!--Theme Styles-->
  <link href="assets/css/dark-theme.css" rel="stylesheet" />
  <link href="assets/css/semi-dark.css" rel="stylesheet" />
  <link href="assets/css/header-colors.css" rel="stylesheet" />

  <title>Fobia User Panel</title>
</head>

<body>


  <!--start wrapper-->
  <div class="wrapper">

    <!--start sidebar -->
    <aside class="sidebar-wrapper" data-simplebar="true">
  <div class="sidebar-header">
    <div>
      <img src="assets/images/logo-icon-2.png" class="logo-icon" alt="logo icon">
    </div>
    <div>
      <h4 class="logo-text">User Panel</h4>
    </div>
  </div>
  <!--navigation-->
  <ul class="metismenu" id="menu">
    <li>
      <a href="user.php">
        <div class="parent-icon">
          <ion-icon name="home-outline"></ion-icon>
        </div>
        <div class="menu-title">Dashboard</div>
      </a>
    </li>

   

    <!-- Product Management -->
   

    <!-- Orders Management -->
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon">
          <ion-icon name="cart-outline"></ion-icon>
        </div>
        <div class="menu-title">Invoices</div>
      </a>
      <ul>
        <!-- <li><a href="viewOrders.php">
            <ion-icon name="ellipse-outline"></ion-icon>View Orders
          </a>
        </li>
        <li><a href="orderDetails.php">
            <ion-icon name="ellipse-outline"></ion-icon>Order Details
          </a>
        </li> -->
      </ul>
    </li>

    <!-- User Management -->
    <!-- <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <div class="menu-title">User</div>
      </a>
      <ul>
        <li><a href="viewUsers.php">
            <ion-icon name="ellipse-outline"></ion-icon>View Users
          </a>
        </li>
        <li><a href="addUser.php">
            <ion-icon name="ellipse-outline"></ion-icon>Add User
          </a>
        </li>
      </ul>
    </li> -->

    <!-- Blog Management -->
    <!-- <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon">
          <ion-icon name="newspaper-outline"></ion-icon>
        </div>
        <div class="menu-title">Blog</div>
      </a>
      <ul>
        <li><a href="addBlog.php">
            <ion-icon name="ellipse-outline"></ion-icon>Add Blog
          </a>
        </li>
        <li><a href="viewBlogs.php">
            <ion-icon name="ellipse-outline"></ion-icon>View Blogs
          </a>
        </li>
        <li><a href="deleteBlog.php">
            <ion-icon name="ellipse-outline"></ion-icon>Delete Blog
          </a>
        </li>
      </ul>
    </li> -->

    <!-- Reports -->
    <!-- <li>
      <a href="reports.php">
        <div class="parent-icon">
          <ion-icon name="analytics-outline"></ion-icon>
        </div>
        <div class="menu-title">Reports</div>
      </a>
    </li> -->



    <!--designers-->
    <li>
  
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <div class="menu-title">Custom Design</div>
      </a>
      <ul>
      <li><a href="addDesign.php">
            <ion-icon name="ellipse-outline"></ion-icon>Add Design
          </a>
        </li>
        <li><a href="view_design.php">
            <ion-icon name="ellipse-outline"></ion-icon>View Design
          </a>
        </li>
       
      </ul>
    </li>
   <!---Actiivities--->
    <li>
      <a class="has-arrow" href="javascript:;">
        <div class="parent-icon">
          <ion-icon name="people-outline"></ion-icon>
        </div>
        <div class="menu-title">Activiities</div>
      </a>
      <ul>
      <li><a href="addActivities.php">
            <ion-icon name="ellipse-outline"></ion-icon>Add Activities
          </a>
        </li>
        <li><a href="viewActivities.php">
            <ion-icon name="ellipse-outline"></ion-icon>View Activities
          </a>
        </li>
       
      </ul>
    </li>
    <li>
      <a href="consultant_booking.php">
        <div class="parent-icon">
          <ion-icon name="home-outline"></ion-icon>
        </div>
        <div class="menu-title">Consultant Booking</div>
      </a>
    </li>
    <li>
      <a href="my-reviews.php">
        <div class="parent-icon">
          <ion-icon name="home-outline"></ion-icon>
        </div>
        <div class="menu-title">My Reviews</div>
      </a>
    
  </ul>
  <!--end navigation-->
</aside>

    <!--end sidebar -->

