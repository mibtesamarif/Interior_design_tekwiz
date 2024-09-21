<?php
include('php/query.php');
include('components/userSidebar.php');
include('components/userNavbar.php');
if (!isset($_GET['consultation_id'])) {
    $consultation_id = $_GET['consultation_id'];
    echo "Consultation ID not provided.";
    exit;
}
?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<?php
// Fetch consultation details
$query = $pdo->prepare("
    SELECT * FROM consultations WHERE consultation_id = :consultation_id
");
$query->execute([':consultation_id' => $consultation_id]);
$consultation = $query->fetch();



if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cancel'])) {
    // This block executes if the form was submitted and the cancel button was clicked
    $query = $pdo->prepare("
        UPDATE consultations SET status = 'canceled' WHERE consultation_id = :consultation_id
    ");
    $query->execute([':consultation_id' => $consultation_id]);

    echo "<script>alert('Consultation canceled successfully!');
  location.assign('index.php');</script>"; // Redirect to dashboard after cancellation
    exit;
}
?>


<!-- Display Consultation Details -->
<h2>Consultation Details</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Consultation ID</td>
            <td><?= htmlspecialchars($consultation['consultation_id']) ?></td>
        </tr>
        <tr>
            <td>Status</td>
            <td><?= htmlspecialchars($consultation['status']) ?></td>
        </tr>
        <tr>
            <td>Designer</td>
            <td><?= htmlspecialchars($consultation['designer_id']) ?></td>
        </tr>
        <!-- Add more consultation details as needed -->
    </tbody>
</table>

<!-- Cancel Consultation Form -->
<form method="post">
    <button type="submit" name="cancel" class="btn btn-danger">Cancel Consultation</button>
</form>

<?php
include('components/footer.php');
?>
