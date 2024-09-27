<?php
include('php/query.php');
include('components/userSidebar.php');
include('components/userNavbar.php');

if (isset($_GET['desid'])) {
    $desid = $_GET['desid'];
    // Correcting the binding parameter
    $query = $pdo->prepare("SELECT * FROM designs WHERE id=:desid");
    $query->bindParam(':desid', $desid);
    $query->execute();
    $des = $query->fetch(PDO::FETCH_ASSOC);
}
?>


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

          <!--start breadcrumb-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Forms</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Form Layouts</li>
                </ol>
              </nav>
            </div>

          </div>
          <!--end breadcrumb-->


          <div class="row">
            <div class="col-xl-8 mx-auto">
            
             
  
              <div class="card">
                <div class="card-body">
                  <div class="border p-3 rounded">
                  <h6 class="mb-0 text-uppercase">Design Edit Form</h6>
                  <hr>
                  <form class="row g-3" method="post">
                    <div class="col-12">
                      <label class="form-label">Name</label>
                      <input type="text" value="<?php echo $des['design_name']?><?php echo $desName?>" name="desName" class="form-control">
                      <small class="text-danger"><?php echo $dNameErr?></small>
                       
                    </div>
                    <div class="col-12">
                      <label class="form-label">Description</label>
                      <input type="text"  value="<?php echo $des['design_data']?><?php echo $desData?>" name="desData" class="form-control">
                      <small class="text-danger"><?php echo $dDataErr?></small>
                    
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="updateDesign">update Category</button>
                      </div>
                    </div>
                  </form>
                </div>
                </div>
              </div>
  
             
  
            </div>
          </div>
             

          </div>
          <!-- end page content-->
         </div>
         


         <?php 
         include('components/userFooter.php')
         ?>