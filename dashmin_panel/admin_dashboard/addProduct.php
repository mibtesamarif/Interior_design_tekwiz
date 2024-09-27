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
            <div class="breadcrumb-title pe-3">Products</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Add Products</li>
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
                  <h6 class="mb-0 text-uppercase">Add Products</h6>
                  <hr>
                  <form class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-12">
                      <label class="form-label">Name</label>
                      <input type="text" name="pName" value="<?php echo $prName?>" class="form-control">
                     <small class="text-danger"><?php echo $prNameErr?></small>

                    </div>
                    <div class="col-12">
                      <label class="form-label">Description</label>
                      <input type="text" name="pDes" value="<?php echo $prDes?>" class="form-control">
                     <small class="text-danger"><?php echo $prDesErr?></small>

                    </div>
                    <div class="col-12">
                      <label class="form-label">Price</label>
                      <input type="text" name="pPrice" value="<?php echo $pPrice?>" class="form-control">
                     <small class="text-danger"><?php echo $pPriceErr?></small>

                    </div>
                    <div class="col-12">
                      <label class="form-label">Quantity</label>
                      <input type="text" name="pQty" value="<?php echo $pQty?>" class="form-control">
                     <small class="text-danger"><?php echo $pQtyErr?></small>

                    </div>
                    <div class="col-12">
                      <label class="form-label">Barcode</label>
                      <input type="text" name="pBar" value="<?php echo $prBarcode?>" class="form-control">
                     <small class="text-danger"><?php echo $prBarcodeErr?></small>

                    </div>
                    <div class="col-12">
                      <label class="form-label">Image</label>
                    <input type="file" name="pImg" value="<?php echo $prImageName?>" class="form-control">
                    <small class="text-danger"><?php echo $prImgErr?></small>
                    </div>
                    
                    </div>
                    
                    <div class="col-12">
                     <label class="form-label">Select category</label>
                     <select class="form-control" name="cId" value="<?php echo $pCid?>"  id="">
                     <option>select category</option>
                     <?php
                        $query=$pdo->query("select * from category");
                        $allCategories=$query->fetchAll(PDO::FETCH_ASSOC);
                           foreach ($allCategories as $cat) {
                            
                               ?>
                             <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?>
                             <?php
                               }
                               ?>
                             </option>

                             </select>
                             <small class="text-danger"><?php echo $pCidErr?></small>

                           </div>
                           <br>
                           <br>

                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                      </div>
                    </div>
                  </form>
                </div>
                </div>
              </div>
  
             
  
            </div>
          </div>
             

          </div>
      
         
        

     
<?php
include('components/footer.php');
?>