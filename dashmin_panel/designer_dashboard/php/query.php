<?php
include('../../Database_connection/dbcon.php');

// add_portfolio_designs

if (isset($_POST['addPortfolioDesign'])) {
    // Initialize variables
    $user_id =  $_SESSION['designerId']; // Replace with actual user_id
    $design_name = $_POST['design_name'];
    $design_description = $_POST['cont_1']; // Content from the Quill editor
    $c_id = $_POST['c_Id'];

    // Handle card image upload (Image 1)
    $design_card_image = '';
    if (isset($_FILES['design_card_image']) && $_FILES['design_card_image']['error'] == 0) {
        $card_image_tmp = $_FILES['design_card_image']['tmp_name'];
        $card_image_name = uniqid() . "_" . $_FILES['design_card_image']['name'];
        $card_image_dest = '../assets/images/addportfoliodesign/' . $card_image_name; // Directory to save the image
        move_uploaded_file($card_image_tmp, $card_image_dest);
        $design_card_image = $card_image_name;
    }

    // Handle detailed images upload (Multiple Images)
    $design_detailed_images = [];
    if (isset($_FILES['design_detail_images']) && !empty($_FILES['design_detail_images']['name'][0])) {
        foreach ($_FILES['design_detail_images']['tmp_name'] as $key => $tmp_name) {
            if ($_FILES['design_detail_images']['error'][$key] == 0) {
                $detailed_image_name = uniqid() . "_" . $_FILES['design_detail_images']['name'][$key];
                $detailed_image_dest = '../assets/images/addportfoliodesign/' . $detailed_image_name; // Directory to save the image
                move_uploaded_file($tmp_name, $detailed_image_dest);
                $design_detailed_images[] = $card_image_name; // Store each file path
            }
        }
    }

    // Convert detailed images array to a JSON string for storage in a single field
    $design_detailed_images_json = json_encode($design_detailed_images);

    // Prepare SQL query
    $sql = "INSERT INTO saveddesigns (user_id, design_name, design_description, design_card_image, design_detailed_images, created_at, c_id) 
            VALUES (:user_id, :design_name, :design_description, :design_card_image, :design_detailed_images, NOW(), :c_id)";
    $stmt = $pdo->prepare($sql);
    
    // Bind values to the query
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':c_id', $c_id);
    $stmt->bindParam(':design_name', $design_name);
    $stmt->bindParam(':design_description', $design_description);
    $stmt->bindParam(':design_card_image', $design_card_image);
    $stmt->bindParam(':design_detailed_images', $design_detailed_images_json);

    // Execute the query
    if ($stmt->execute()) {
      echo "<script>alert('Design added successfully!'); location.assign('view_portfolio_designs.php');</script>";
    } else {
          echo "<script>alert('Failed to add design.');</script>";
    }
}

?>





