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
              <div class="breadcrumb-title pe-3">Tables</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">view Product Tables</li>
                  </ol>
                </nav>
              </div>
 
            </div>
            <!--end breadcrumb-->


            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                   <h5 class="mb-0">Product list</h5>
                    <form class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp"></ion-icon></div>
                      <input class="form-control ps-5" type="text" id="search" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                  <table class="table align-middle">
                    <thead class="table-secondary">
                      <tr>
                       <th>Name</th>
                       <th>Des</th>
                       <th>Price</th>
                       <th>Qty</th>
                       <th>Barcode</th>
                       <th>Category Name</th>
                       <th>Image</th>
                       <th>Actions</th>
                       <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
<!--                     
                        <td>
                          <div class="table-actions d-flex align-items-center gap-3 fs-6">
                            <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                            <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                            <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                          </div>
                        </td>
                      -->
</tbody>
                    </table>
                </div>
              </div>
            </div>



          </div>
          <!-- end page content-->
         </div>
         


 

     </div>
  <!--end wrapper-->


  <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>
      $(document).ready(function(){
        let $allProducts = () =>{
                $.ajax({
                url : "php/productajax.php",
                type : "get",
                success :function(abc){
                   $("tbody").html(abc);   
                }
            }) 
            }
            $allProducts();
     $("#search").keyup(function(){
       let input = $(this).val();
         //alert(input);
        if(input!="" ){
            $.ajax({
            url : "php/query.php",
            type : "post",
            data : {pdt:input},
            success :function(data){
               $("tbody").html(data);   
            }
        })
    }
    else{
        $allProducts();
    }


   });
 });
</script>

<?php
include('components/footer.php');
?>


