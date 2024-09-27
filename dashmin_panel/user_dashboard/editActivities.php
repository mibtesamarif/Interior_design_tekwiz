<?php
include('php/query.php');
include('components/userSidebar.php');
include('components/userNavbar.php');
if (isset($_GET['actid'])) {
    $actid = $_GET['actid'];
    // Correcting the binding parameter
    $query = $pdo->prepare("SELECT * FROM activities WHERE id=:actid");
    $query->bindParam(':actid', $actid);
    $query->execute();
    $act = $query->fetch(PDO::FETCH_ASSOC);
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
                  <h6 class="mb-0 text-uppercase">Activity Form <?php echo $_SESSION['user_id']?></h6>
                  <hr>
                  <form class="row g-3" method="post">
                    <div class="col-12">
                      <label class="form-label">Activity type</label>
                      <input type="text" value="<?php echo $act['activity_type']?><?php echo $activity_Type?>" name="activity_type" class="form-control">
                      <small class="text-danger"><?php echo $activity_typeErr?></small>
                       
                    </div>
                    <div class="col-12">
                      <label class="form-label">Activity Data</label>
                      <input type="text"  value="<?php echo $act['activity_data']?><?php echo $activity_Data?>" name="activity_data" class="form-control">
                      <small class="text-danger"><?php echo $activity_DataErr?></small>
                    
                    </div>
                   
                    
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="updateActivities">update Actiivties</button>
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
include('components/userFooter.php');
?>
    




