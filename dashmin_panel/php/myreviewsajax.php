<?php
include('query.php');
$uid = $_SESSION['user_id'];
$reviews=[];

$query = $pdo->prepare("SELECT reviews.*, designers.name AS designer_name FROM reviews INNER JOIN designers ON reviews.designer_id = designers.designer_id WHERE reviews.user_id = :user_id  ORDER BY reviews.created_at DESC");
$query->bindParam(':user_id',$uid);
 $query->execute();
$reviews = $query->fetchAll();
 foreach ($reviews as $review): ?>
    <tr>
      <td><?php echo htmlspecialchars($review['designer_name']) ?></td>
      <td><?php echo htmlspecialchars($review['review_text']) ?></td>
      <td><?php echo htmlspecialchars($review['rating']) ?></td>
      <td><?php echo htmlspecialchars($review['created_at']) ?></td>
    </tr>
    <?php endforeach;
    ?>
