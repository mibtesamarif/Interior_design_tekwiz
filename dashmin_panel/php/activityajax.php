<?php
include('query.php');

$uid = $_SESSION['user_id'];
$activities = [];
$query = $pdo->prepare('SELECT * FROM activities WHERE user_id = :user_id ORDER BY created_at DESC');
$query->bindParam(':user_id', $uid);  // Use $uid instead of $user_id
$query->execute();
$activities = $query->fetchAll(PDO::FETCH_ASSOC);


 foreach ($activities as $activity){
    ?>
                <tr>
                    <td><?php echo htmlspecialchars($activity['activity_type']); ?></td>
                    <td><?php echo htmlspecialchars($activity['activity_data']); ?></td>
                    <td><?php echo htmlspecialchars($activity['created_at']); ?></td>
                    <td>
                        <a class="btn btn-primary" href="editActivities.php?actid=<?php echo $activity['id']; ?>">Edit</a>
                        
                    </td>
                    <td><a class="btn btn-danger" href="?id=<?php echo $activity['id']; ?>">Delete</a></td>
                </tr>
            <?php }
             ?>
                       