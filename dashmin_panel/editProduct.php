<?php
include('php/query.php');
include('components/sidebar.php');
include('components/navbar.php');
if(isset($_GET['pid'])){
    $id=$_GET['pid'];
    $query=$pdo->prepare("select products .*,category.name as cName, category.id as catId from
  products inner join category on products.c_id=category.id where products.id=:pid");
    $query->bindParam('pid',$id);
    $query->execute();
    $pdt=$query->fetch(PDO::FETCH_ASSOC);
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
                  <h6 class="mb-0 text-uppercase">Product Edit Form</h6>
                  <hr>
                  <form class="row g-3" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" value="<?php echo $pdt['name']?><?php echo $Name?>" name="pName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small class="text-danger"><?php echo $pNameErr?></small>

                         
                            </div>
                            <div class="form-group">
                              <label for="">Des</label>
                              <input type="text" value="<?php echo $pdt['des']?><?php echo $Des?>" name="pDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small class="text-danger"><?php echo $pDesErr?></small>
                         
                            </div>
                            <div class="form-group">
                              <label for="">price</label>
                              <input type="text" value="<?php echo $pdt['price']?><?php echo $Price?>" name="pPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                               <small class="text-danger"><?php echo $priceErr?></small>
                              
                              
                            </div>
                            <div class="form-group">
                              <label for="">Quantity</label>
                              <input type="text" value="<?php echo $pdt['qty']?><?php echo $Qty?>" name="pQty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <small class="text-danger"><?php echo $qtyErr?></small>
                  
                          </div> 
                  
                    <div class="col-12">
                      <label class="form-label">Barcode</label>
                      <input type="text"  value="<?php echo $pdt['pr_barcode']?><?php echo $pBarcode?>" name="pBar" class="form-control">
                     <small class="text-danger"><?php echo $pBarcodeErr?></small>


                    </div>
                    <div class="col-12">
                      <label class="form-label">Image</label>
                    <input type="file"  value="<?php echo $pdt['image']?><?php echo $pImageName?>"name="pImage" class="form-control">
                    <small class="text-danger"><?php echo $pImgErr?></small>

            
                    </div>
                    <div class="form-group">
                             <label for="">Select category</label>
                             <select class="form-control" name="cId" id="">
                               <option value="<?php echo $pdt['catId']?>"><?php echo $pdt['cName']?><?php echo $cId?></option>
                               <?php 
                               $query=$pdo->prepare("select * from category where name!=:catName");
                               $query->bindParam('catName',$pdt['cName']);
                               $query->execute();
                               $allCategories=$query->fetchAll(PDO::FETCH_ASSOC);
                               foreach ($allCategories as $cat) {
                                ?>
                               <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                               <?php
                               }
                               ?>
                          
                             </select>
                             <small class="text-danger"><?php echo $cidErr?></small>

                            
                           </div>
                    
                    </div>
                    <div class="col-12">
                      <div class="d-grid">
                        <button type="submit" class="btn btn-primary" name="updateProduct">update Product</button>
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