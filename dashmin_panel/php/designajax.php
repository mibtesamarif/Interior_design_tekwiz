<?php
include('query.php');

$uid = $_SESSION['user_id'];
$designs = [];

// Fetch the user's designs
$query = $pdo->prepare('SELECT * FROM designs WHERE user_id = :user_id ORDER BY created_at DESC');
$query->bindParam(':user_id', $uid);
$query->execute();
$designs = $query->fetchAll(PDO::FETCH_ASSOC);

// Display the designs
foreach ($designs as $design) {
?>
    <tr>
        <td><?php echo $design['design_name']; ?></td>
        <td><?php echo $design['design_data']; ?></td>
        <td><?php echo $design['created_at']; ?></td>
        <td>
            <a class="btn btn-primary" href="editDesign.php?desid=<?php echo $design['id']; ?>">Edit</a>
        </td>
        
        <!-- Save Design Button inside a form -->
        <!-- <td>
            <form action="save_design.php" method="POST">
                <input type="hidden" name="design_id" value="<?php// echo $design['id']; ?>">
                <button type="submit" class="btn btn-primary">Save Design</button>
            </form>
        </td> -->
        
        <td>
            <a class="btn btn-danger" href="?id=<?php echo $design['id']; ?>">Delete</a>
        </td>
    </tr>
<?php
}
?>



