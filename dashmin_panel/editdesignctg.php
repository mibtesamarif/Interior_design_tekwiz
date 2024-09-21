<?php
include('php/query.php');
include('components/sidebar.php');
include('components/navbar.php');

// Fetch category details if 'cid' is passed in URL
if (isset($_GET['cid'])) {
    $id = $_GET['cid'];
    
    // Prepare the query to fetch the category
    $query = $pdo->prepare("SELECT * FROM design_category WHERE c_id = :cid");
    $query->bindParam(':cid', $id);
    $query->execute();
    
    // Fetch category details
    $cat = $query->fetch(PDO::FETCH_ASSOC);
}
?>

<!-- start page content wrapper-->
<div class="page-content-wrapper">
  <!-- start page content-->
  <div class="page-content">

    <!--start breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Edit Category</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0 align-items-center">
            <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a></li>
            <li class="breadcrumb-item active" aria-current="page">Design Category</li>
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
              <h6 class="mb-0 text-uppercase">Edit Design Category</h6>
              <hr>
              <form class="row g-3" method="post">
                <div class="col-12">
                  <label class="form-label">Name</label>
                  <input type="text" value="<?php echo isset($cat['category_name']) ? $cat['category_name'] : ''; ?>" name="ctg_name" class="form-control" required>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button type="submit" class="btn btn-primary" name="updateDesignctg">Update Category</button>
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

<?php include('components/footer.php'); ?>
