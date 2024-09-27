<?php
include('php/query.php');
include('components/userSidebar.php');
include('components/userNavbar.php');
// Check if user is logged in
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
} else {
  echo "User not logged in.";
  exit;
}

?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<!-- start page content wrapper-->
<div class="page-content-wrapper">
  <!-- start page content-->
  <div class="page-content">
    <!-- start breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Tables</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0 align-items-center">
            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a></li>
            <li class="breadcrumb-item active" aria-current="page">View Reviews Table</li>
          </ol>
        </nav>
      </div>
      <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-outline-primary">Settings</button>
          <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	
            <span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	
            <a class="dropdown-item" href="javascript:;">Action</a>
            <a class="dropdown-item" href="javascript:;">Another action</a>
            <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div>	
            <a class="dropdown-item" href="javascript:;">Separated link</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end breadcrumb -->
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <h5 class="mb-0">Review Overview</h5>
          <form class="ms-auto position-relative">
            <div class="position-absolute top-50 translate-middle-y search-icon px-3">
           <!-- <ion-icon name="search-sharp"></ion-icon> -->
            </div>
            <input class="form-control" type="text" id="search" name="search" placeholder="search">
          </form>
        </div>

<div class="table-responsive mt-3">
  <div class="page-content">
    <h5>Your Reviews</h5>
 
    <table class="table align-middle">
      <thead class="table-secondary">
        <tr>
          <th>Designer</th>
          <th>Review</th>
          <th>Rating</th>
          <th>Date</th>
        </tr>
      </thead>
      <tbody>
       
      </tbody>
    </table>
 
  </div>
</div>
<!--searching ajax reviews-->
<script>
      $(document).ready(function(){
        let allReviews = () =>{
                $.ajax({
                url : "php/myreviewsajax.php",
                type : "get",
                success :function(abc){
                   $("tbody").html(abc);   
                }
            }) 
            }
            allReviews();
     $("#search").keyup(function(){
       let input = $(this).val();
         //alert(input);
        if(input!="" ){
            $.ajax({
            url : "php/query.php",
            type : "post",
            data : {reviews:input},
            success :function(data){
               $("tbody").html(data);   
            }
        })
    }
    else{
      allReviews();
    }


   });
 });
</script>







