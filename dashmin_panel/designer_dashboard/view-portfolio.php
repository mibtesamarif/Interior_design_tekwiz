<?php
include('php/query.php');
include('components/designer_sidebar.php');
include('components/designer_navbar.php');
?>

<!-- start page content wrapper-->
<div class="page-content-wrapper">
<!-- start page content-->
<div class="page-content">
     <!--start breadcrumb-->
     <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Portfolio</div>
            <div class="ps-3">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0 align-items-center">
                  <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">View Designs</li>
                </ol>
              </nav>
            </div>
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-outline-primary">Settings</button>
                <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                  <a class="dropdown-item" href="javascript:;">Another action</a>
                  <a class="dropdown-item" href="javascript:;">Something else here</a>
                  <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                </div>
              </div>
            </div>
          </div>
          <!--end breadcrumb-->


          <div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4 text-center">Blogs Data</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Heading</th>
                                <th scope="col">Date of Adding</th>

                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $user_id =  $_SESSION['designerId'];
                            // echo"$user_id";
                            $query = $pdo->prepare("SELECT * FROM saveddesigns Where user_id = :user_id");
                            $query->bindParam(':user_id', $user_id);
                            $query->execute();
                            $alldesigns = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($alldesigns as $designs) {
                                ?>
                                <tr>
                                    <th scope="row"><?php echo $designs['id']; ?></th>
                                    <td><?php echo $designs['design_name']; ?></td>
                                    <td><?php echo $designs['created_at']; ?></td>

                                    <td><?php echo $designs['status']; ?></td>
                                    <td><a class="btn btn-outline-info" href="view_portpolio_detail.php?id=<?php echo $designs['id']; ?>">View</a></td>
                                    <td>
                                        <?php echo $designs['status'] === "unpost" ? '<a class="btn btn-outline-warning" href="edit_blog.php?id=' . $designs['id'] . '">Edit</a>' : '-'; ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo $designs['status'] === "unpost" ? '<a class="btn btn-outline-success" href="?b_p_id=' . $designs['id'] . '">Post</a>' : '<a class="btn btn-outline-danger" href="?b_u_p_id=' . $designs['id'] . '">Unpost</a>'; ?>
                                    </td>
                                    <td>
                                        <?php echo $designs['status'] === "unpost" ? '<a class="btn btn-outline-danger" href="?b_d_id=' . $designs['id'] . '">Delete</a>' : '-'; ?>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
    </div>
<?php
include('components/designer_footer.php');
?>
