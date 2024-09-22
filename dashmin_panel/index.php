<?php
include('php/query.php');
include('components/navbar.php');
include('components/sidebar.php');
?>

   

    <!-- start page content wrapper-->
    <div class="page-content-wrapper">
      <!-- start page content-->
      <div class="page-content">

        <!--start breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
          <div class="breadcrumb-title pe-3">Dashboard</div>
          <div class="ps-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0 align-items-center">
                <li class="breadcrumb-item"><a href="javascript:;">
                    <ion-icon name="home-outline"></ion-icon>
                  </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Decor Vista</li>
              </ol>
            </nav>
          </div>
 
        </div>
        <!--end breadcrumb-->


        <div class="row row-cols-1 row-cols-lg-2 row-cols-xxl-4">
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Total Users</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-purple">
                    <ion-icon name="people-outline"></ion-icon>
                  </div>
                </div>
                <?php
                $query = $pdo->query("SELECT COUNT(id) AS total_users FROM users where role_id=3");
                $allusers = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($allusers as $users) {
?>
    <div class="d-flex align-items-center mt-3">
      <div>
        <h4 class="mb-0"><?php echo $users['total_users']; ?></h4>
      </div>
    </div>
<?php
}
?>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Total Customer</p>
                  </div>
                
                  <div class="ms-auto widget-icon-small text-white bg-gradient-info">
                    <ion-icon name="people-outline"></ion-icon>
                  </div>
                </div>
                <?php
$query = $pdo->query("SELECT COUNT(user_id) AS total_users FROM orders");
$allcustomer = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($allcustomer as $customer) {
?>
    <div class="d-flex align-items-center mt-3">
      <div>
        <h4 class="mb-0"><?php echo $customer['total_users']; ?></h4>
      </div>
    </div>
<?php
}
?>

              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Total Orders</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-danger">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                <?php
           $query = $pdo->query("SELECT COUNT(order_id) AS total_orders FROM orders");
           $allorders = $query->fetchAll(PDO::FETCH_ASSOC);

           foreach ($allorders as $orders) {
?>
    <div>
        <h4 class="mb-0"><?php echo $orders['total_orders']; ?></h4>
    </div>
<?php
}
?>

                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card radius-10">
              <div class="card-body">
                <div class="d-flex align-items-start gap-2">
                  <div>
                    <p class="mb-0 fs-6">Total Designers</p>
                  </div>
                  <div class="ms-auto widget-icon-small text-white bg-gradient-success">
                    <ion-icon name="people-outline"></ion-icon>
                  </div>
                </div>
                <div class="d-flex align-items-center mt-3">
                  
                <?php
           $query = $pdo->query("SELECT COUNT(id) AS total_designer FROM users where role_id= 2");
           $alldesigners = $query->fetchAll(PDO::FETCH_ASSOC);

           foreach ($alldesigners as $designer) {
?>
    <div>
        <h4 class="mb-0"><?php echo $designer['total_designer']; ?></h4>
    </div>
<?php
}
?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end row-->



     

        <div class="card radius-10 w-100">
          <div class="card-body">
            <div class="d-flex align-items-center">
              <h6 class="mb-0">Recent Orders</h6>
              <div class="fs-5 ms-auto dropdown">
                <div class="dropdown-toggle dropdown-toggle-nocaret cursor-pointer" data-bs-toggle="dropdown"><i
                    class="bi bi-three-dots"></i></div>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </div>
            </div>
            <div class="table-responsive mt-2">
              <table class="table align-middle mb-0">
                <thead class="table-light">
                  <tr>
                    <th>#UserID</th>
                    <th>Items</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Message</th>
                    <th>Date</th>
                  </tr>
                </thead>

                <?php
                                        $query = $pdo->query("select * from orders");
                                        $allorders = $query->fetchAll(PDO::FETCH_ASSOC);
                           foreach($allorders as $orders){

                                  ?> 
                <tbody>
                  <tr>
                    <td><?php echo $orders['user_id']?></td>
                   
                    <td><?php echo $orders['total_products']?></td>
                    <td><?php echo $orders['total_price']?></td>
                    <td><span class="badge bg-success"><?php echo $orders['status']?></span></td>
                    <td><?php echo $orders['shipping_address']?></td>
                    <td><?php echo $orders['city']?></td>
                    <td><?php echo $orders['postal_code']?></td>
                    <td><?php echo $orders['message']?></td>
                    <td><?php echo $orders['order_date']?></td>
                  </tr>
   
                </tbody>
                <?php
                           }
                ?>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- end page content-->
    </div>
    <!--end page content wrapper-->


   <?php
   include('components/footer.php');
   ?>