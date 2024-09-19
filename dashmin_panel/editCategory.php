<?php
include('php/query.php');
include('components/sidebar.php');
include('components/navbar.php');
if(isset($_GET['cid'])){
    $id=$_GET['cid'];
    $query=$pdo->prepare("select * from category where id=:cid");
    $query->bindParam('cid',$id);
    $query->execute();
    $cat=$query->fetch(PDO::FETCH_ASSOC);
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
                  <h6 class="mb-0 text-uppercase">Category Edit Form</h6>
                  <hr>
                  <form class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                      <label class="form-label">Name</label>
                      <input type="text" value="<?php echo $cat['name']?><?php echo $cName?>" name="cName" class="form-control">
                      <small class="text-danger"><?php echo $cNameErr?></small>
                       
                    </div>
                    <div class="col-12">
                      <label class="form-label">Description</label>
                      <input type="text"  value="<?php echo $cat['des']?><?php echo $cDes?>" name="cDes" class="form-control">
                      <small class="text-danger"><?php echo $cDesErr?></small>
                       
                    </div>
                    <div class="col-12">
                      <label class="form-label">Image</label>
                    <input type="file"  value="<?php echo $cat['image']?><?php echo $cImageName?>"name="cImg" class="form-control">
                    <small class="text-danger"><?php echo $cImgErr?></small>

                    </div>
                    
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="updateCategory">update Category</button>
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
         include('components/footer.php')
         ?>