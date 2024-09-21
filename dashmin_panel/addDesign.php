<?php
include('php/query.php');
include('components/sidebar.php');
include('components/navbar.php');
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
                  <h6 class="mb-0 text-uppercase">Design Form <?php echo $_SESSION['user_id']?></h6>
                  <hr>
                  <form class="row g-3" method="post" >
                    <div class="col-12">
                      <label class="form-label">Design Name</label>
                      <input type="text" name="design_name" value="<?php echo $designName?>" class="form-control">
                     <small class="text-danger"><?php echo $designNameErr?></small>

                    </div>
                    <div class="col-12">
                      <label class="form-label">Design Data</label>
                      <input type="text" name="design_data" value="<?php echo $designData?>" class="form-control">
                     <small class="text-danger"><?php echo $designDataErr?></small>

                    </div>
                   
                    
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="addDesign">Add Design</button>
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
include('components/footer.php');
?>
    




