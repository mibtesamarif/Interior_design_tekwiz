<?php
include('php/query.php');
include('components/userSidebar.php');
include('components/userNavbar.php');

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    echo "User not logged in.";
    exit;
}

?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<?php
// Fetch upcoming consultations for the logged-in user
$query = $pdo->prepare("SELECT consultations.*, designs.design_name FROM consultations LEFT JOIN designs ON consultations.designs_id = designs.id WHERE consultations.user_id = :user_id");
$query->bindParam(':user_id', $user_id);
$query->execute();
$consultations = $query->fetchAll();



?>

<!-- start page content wrapper-->
<div class="page-content-wrapper">
    <!-- start page content-->
    <div class="page-content">
        <!-- start breadcrumb -->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0 align-items-center">
                        <li class="breadcrumb-item"><a href="javascript:;"><ion-icon name="home-outline"></ion-icon></a></li>
                        <li class="breadcrumb-item active" aria-current="page">View Consultations Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-primary">Settings</button>
                    <button type="button" class="btn btn-outline-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                        <a class="dropdown-item" href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:;">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb -->

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">Consultation Overview</h5>
                    <form class="ms-auto position-relative">
                        <div class="position-absolute top-50 translate-middle-y search-icon px-3">
                        </div>
                        <input class="form-control" type="text" id="search" placeholder="search">
                    </form>
                </div>
                <div class="table-responsive mt-3">
                    <?php if ($consultations): ?>
                    <table class="table align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>Designer</th>
                                <th>Consultation Date</th>
                             
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($consultations as $consultation): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($consultation['design_name']) ?></td>
                                <td><?php echo htmlspecialchars($consultation['consultation_date']) ?></td>
                               
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php else: ?>
                    <p>No upcoming consultations.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end page content-->
</div>

<!-- Start Footer -->
<?php include('components/userFooter.php'); ?>
<!-- End Footer -->
