<?php
include('php/query.php');
include('components/sidebar.php');
include('components/navbar.php');
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>



   


        <!-- start page content wrapper-->
        <div class="page-content-wrapper">
          <!-- start page content-->
         <div class="page-content">

             <!--start breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
              <div class="breadcrumb-title pe-3">View Category</div>
              <div class="ps-3">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb mb-0 p-0 align-items-center">
                    <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">view Design Category</li>
                  </ol>
                </nav>
              </div>
      
            </div>
            <!--end breadcrumb-->


            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center">
                   <h5 class="mb-0">Category list</h5>
                    <form class="ms-auto position-relative">
                      <div class="position-absolute top-50 translate-middle-y search-icon px-3"></div>
                      <input class="form-control " type="text" id="search" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                  <table class="table align-middle">
                    <thead class="table-secondary">
                      <tr>
                       <th>Name</th>
                       <th>Des</th>
                       <th>Image</th>
                       <th>Actions</th>
                       <th>Actions</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                 
                      
                      </tbody>
                    </table>
                </div>
              </div>
            </div>



          </div>
          <!-- end page content-->
         </div>
         



<script>
      $(document).ready(function(){
        let alldesignCategories = () =>{
                $.ajax({
                url : "php/designcatajax.php",
                type : "get",
                success :function(abc){
                   $("tbody").html(abc);   
                }
            }) 
            }
            alldesignCategories();
     $("#search").keyup(function(){
       let input = $(this).val();
         //alert(input);
        if(input!="" ){
            $.ajax({
            url : "php/query.php",
            type : "post",
            success :function(data){
               $("tbody").html(data);   
            }
        })
    }
    else{
        alldesignCategories();
    }


   });
 });
</script>

<?php
include('components/footer.php')
?>