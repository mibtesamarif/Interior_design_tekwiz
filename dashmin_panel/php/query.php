<?php
session_start();
include('dbcon.php');
$catNameErr = '';
$catDesErr = '';
$catImgErr = '';
$catName = $catDes = $catImg = '';

// Add category
if (isset($_POST['addCategory'])) {
    $catName = $_POST['cName'];
    $catDes = $_POST['cDes'];
    $catImg = $_FILES['cImg']['name'];
    $cImageTmpName = $_FILES['cImg']['tmp_name'];
    $extension = strtolower(pathinfo($catImg, PATHINFO_EXTENSION));
    $destination = "img/".$catImg;

    // Validate required fields
    if (empty($catName)) {
        $catNameErr = "Category name is required";
    }
    else{
        if (!preg_match("/^[a-zA-Z ]*$/",$catName)) {
            $catNameErr = "Enter correct name";
        }
       }
    if (empty($catDes)) {
        $catDesErr = "Description is required";
    }
    if (empty($catImg)) {
        $catImgErr = "Image is required";
    }
    else{

    // Validate file type
    if (!in_array($extension, ['jpg', 'png', 'jpeg'])) {
        $catImgErr = "Invalid image format. Only JPG, PNG, and JPEG are allowed.";
    }
}
    
    // Proceed if there are no errors
    if (empty($catNameErr) && empty($catDesErr) && empty($catImgErr)) {
        // Check if the directory exists
        if (!is_dir('img')) {
            mkdir('img', 0755, true);
        }

        // Move uploaded file
        if (move_uploaded_file($cImageTmpName, $destination)) {
            // Prepare and execute query
            $query = $pdo->prepare("INSERT INTO category (name, des, image) VALUES (:cName, :cDes, :cImage)");
            $query->bindParam(':cName',$catName);
            $query->bindParam(':cDes', $catDes);
            $query->bindParam(':cImage',$catImg);
            $query->execute();

            echo "<script>alert('Category added successfully'); location.assign('index.php');</script>";
        } 
        else {
            $catImgErr = "Failed to upload image.";
        }
    }
}

$cName = $cDes = $cImageName = '';
$destination = '';

// Initialize error variables
$cNameErr = $cDesErr = $cImgErr = '';

// Update category
if (isset($_POST['updateCategory'])) {
    $id = $_GET['cid'];
    $cName = $_POST['cName'];
    $cDes = $_POST['cDes'];

    // Validate Category Name
    if (empty($cName)) {
        $cNameErr = "Category name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $cName)) {
        $cNameErr = "Enter a valid category name (only letters and spaces)";
    }

    // Validate Description
    if (empty($cDes)) {
        $cDesErr = "Category description is required";
    }

    // Validate Image
    if (isset($_FILES['cImg']) && !empty($_FILES['cImg']['name'])) {
        $cImageName = $_FILES['cImg']['name'];
        $cImageTmpName = $_FILES['cImg']['tmp_name'];
        $extension = pathinfo($cImageName, PATHINFO_EXTENSION);
        $destination = "img/" . $cImageName;

        if (!in_array($extension, ['jpg', 'jpeg', 'png'])) {
            $cImgErr = "Invalid image format. Only JPG, JPEG, and PNG are allowed.";
        } else {
            if (!is_dir('img')) {
                mkdir('img', 0755, true);
            }
            move_uploaded_file($cImageTmpName, $destination);
        }
    }

    // Proceed only if there are no validation errors
    if (empty($cNameErr) && empty($cDesErr) && empty($cImgErr)) {
        // Prepare update query
        if (!empty($cImageName)) {
            $query = $pdo->prepare("UPDATE category SET name=:uName, des=:uDes, image=:uImage WHERE id=:cid");
            $query->bindParam('uImage', $cImageName);
        } else {
            $query = $pdo->prepare("UPDATE category SET name=:uName, des=:uDes WHERE id=:cid");
        }
        
        $query->bindParam('cid', $id);
        $query->bindParam('uName', $cName);
        $query->bindParam('uDes', $cDes);

        // Execute the query
        if ($query->execute()) {
            echo "<script>alert('Category updated successfully');
            location.assign('viewCategory.php');</script>";
        } else {
            echo "<script>alert('Failed to update category. Please try again.');</script>";
        }
    }
}


    //delete catgeory
if(isset($_GET['cdid'])){
    $did=$_GET['cdid'];
    $query=$pdo->prepare("delete from category where id=:did");
    $query->bindParam('did',$did);
    $query->execute();
    echo "<script>alert('delete category successfully');
    location.assign('viewCategory.php');
    </script>";

}


// Initialize error variables
$prNameErr = $prDesErr = $pPriceErr = $pQtyErr = $pCidErr = $prBarcodeErr = $prImgErr = '';
$prName = $prDes = $pPrice = $pQty = $pCid = $prBarcode = '';
$prImageName = '';
$destination = '';

// Add product
if (isset($_POST['addProduct'])) {
    // Retrieve form data
    $prName = $_POST['pName'];
    $prDes = $_POST['pDes'];
    $pPrice = $_POST['pPrice'];
    $pQty = $_POST['pQty'];
    $pCid = $_POST['cId'];
    $prBarcode = $_POST['pBar'];
    $prImageName= $_FILES['pImg']['name'];
    $pImageTmpName = $_FILES['pImg']['tmp_name'];
    $extension = strtolower(pathinfo($prImageName, PATHINFO_EXTENSION));
    $destination = "img/" . $prImageName;

    // Validate Product Name
    if (empty($prName)) {
        $prNameErr = "Product name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $prName)) {
        $prNameErr = "Enter a valid product name (only letters and spaces)";
    }

    // Validate Description
    if (empty($prDes)) {
        $prDesErr = "Product description is required";
    }

    // Validate Price
    if (empty($pPrice)) {
        $pPriceErr = "Price is required";
    } elseif (!is_numeric($pPrice) || $pPrice <= 0) {
        $pPriceErr = "Enter a valid price";
    }

    // Validate Quantity
    if (empty($pQty)) {
        $pQtyErr = "Quantity is required";
    } elseif (!is_numeric($pQty) || $pQty < 0) {
        $pQtyErr = "Enter a valid quantity";
    }

    // Validate Category ID
    if (empty($pCid)) {
        $pCidErr = "Category is required";
    }

    // Validate Barcode
    if (empty($prBarcode)) {
        $prBarcodeErr = "Barcode is required";
    }

    // Validate Image
    if (empty($prImageName)) {
        $prImgErr = "Product image is required";
    } elseif (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
        $prImgErr = "Invalid image format. Only JPG, PNG, JPEG, and WEBP are allowed.";
    }

    // Proceed if there are no errors
    if (empty($prNameErr) && empty($prDesErr) && empty($pPriceErr) && empty($pQtyErr) && empty($pCidErr) && empty($prBarcodeErr) && empty($prImgErr)) {
        // Check if the 'img' directory exists
        if (!is_dir('img')) {
            mkdir('img', 0755, true);
        }

        // Move the uploaded file
        if (move_uploaded_file($pImageTmpName, $destination)) {
            // Prepare the query
            $query = $pdo->prepare("INSERT INTO products (name, des, price, qty, image, pr_barcode, c_id) 
                                    VALUES (:pName, :pDes, :pPrz, :pQty, :pImage, :pBarcode, :cid)");
            
            // Bind the parameters
            $query->bindParam(':pName', $prName);
            $query->bindParam(':pDes', $prDes);
            $query->bindParam(':pPrz', $pPrice);
            $query->bindParam(':pQty', $pQty);
            $query->bindParam(':pImage', $prImageName);
            $query->bindParam(':pBarcode', $prBarcode);
            $query->bindParam(':cid', $pCid);
            
            // Execute the query
            if ($query->execute()) {
                // Success message
                echo "<script>alert('Product added successfully'); location.assign('index.php');</script>";
            } else {
                // Database error
                echo "<script>alert('Failed to add product. Please try again.');</script>";
            }
        } else {
            $prImgErr = "Failed to upload the image.";
        }
    }
}


$Name = $Des = $Price = $Qty = $pBarcode = $cId = $pImageName = '';
$destination = '';

// Initialize error variables
$pNameErr = $pDesErr = $priceErr = $qtyErr = $cidErr = $pBarcodeErr = $pImgErr = '';

// Update product
if (isset($_POST['updateProduct'])) {
    $id = $_GET['pid'];
    $Name = $_POST['pName'];
    $Des = $_POST['pDes'];
    $Price = $_POST['pPrice'];
    $Qty = $_POST['pQty'];
    $pBarcode = $_POST['pBar'];
    $cId = $_POST['cId'];

    // Validate Product Name
    if (empty($Name)) {
        $pNameErr = "Product name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $Name)) {
        $pNameErr = "Enter a valid product name (only letters and spaces)";
    }

    // Validate Description
    if (empty($Des)) {
        $pDesErr = "Product description is required";
    }

    // Validate Price
    if (empty($Price)) {
        $priceErr = "Price is required";
    } elseif (!is_numeric($Price) || $Price <= 0) {
        $priceErr = "Enter a valid price";
    }

    // Validate Quantity
    if (empty($Qty)) {
        $qtyErr = "Quantity is required";
    } elseif (!is_numeric($Qty) || $Qty < 0) {
        $qtyErr = "Enter a valid quantity";
    }

    // Validate Category ID
    if (empty($cId)) {
        $cidErr = "Category is required";
    }

    // Validate Barcode
    if (empty($pBarcode)) {
        $pBarcodeErr = "Barcode is required";
    }

    // Proceed if there are no validation errors
    if (empty($pNameErr) && empty($pDesErr) && empty($priceErr) && empty($qtyErr) && empty($cidErr) && empty($pBarcodeErr)) {

        // Handle image upload if file is present
        if (isset($_FILES['pImage']) && !empty($_FILES['pImage']['name'])) {
            $pImageName = $_FILES['pImage']['name'];
            $pImageTmpName = $_FILES['pImage']['tmp_name'];
            $extension = pathinfo($pImageName, PATHINFO_EXTENSION);
            $destination = "img/" . $pImageName;

            // Validate Image
            if (!in_array($extension, ['jpg', 'jpeg', 'png', 'webp'])) {
                $pImgErr = "Invalid image format. Only JPG, PNG, JPEG, and WEBP are allowed.";
            }

            if (empty($pImgErr)) {
                // Create img directory if not exists
                if (!is_dir('img')) {
                    mkdir('img', 0755, true);
                }

                // Move uploaded file to destination
                if (move_uploaded_file($pImageTmpName, $destination)) {
                    $query = $pdo->prepare("UPDATE products SET name=:uName, des=:uDes, price=:uPrice, qty=:uQty, pr_barcode=:pBar, c_id=:cId, image=:uImage WHERE id=:pid");
                    $query->bindParam('uImage', $pImageName);
                } else {
                    $pImgErr = "Failed to upload the image.";
                }
            }
        } else {
            // Update query without image
            $query = $pdo->prepare("UPDATE products SET name=:uName, des=:uDes, price=:uPrice, qty=:uQty, pr_barcode=:pBar, c_id=:cId WHERE id=:pid");
        }

        if (empty($pImgErr)) {
            // Bind common parameters
            $query->bindParam('pid', $id);
            $query->bindParam('uName', $Name);
            $query->bindParam('uDes', $Des);
            $query->bindParam('uPrice', $Price);
            $query->bindParam('uQty', $Qty);
            $query->bindParam('pBar', $pBarcode);
            $query->bindParam('cId', $cId);

            // Execute the query
            if ($query->execute()) {
                // Success message
                echo "<script>alert('Product updated successfully'); location.assign('index.php');</script>";
            } else {
                // Database error
                echo "<script>alert('Failed to update product. Please try again.');</script>";
            }
        }
    }
}

    

     //delete catgeory
if(isset($_GET['pdid'])){
    $pdid=$_GET['pdid'];
    $query=$pdo->prepare("delete from products where id=:pdid");
    $query->bindParam('pdid',$pdid);
    $query->execute();
    echo "<script>alert('delete product successfully');
    location.assign('viewProduct.php');
    </script>";

}

// search work view category adminpanel
if(isset($_POST['cat'])){
    $val = $_POST['cat'];
    $query = $pdo->prepare("select * from category Where name LIKE :val");
    $val ="%$val%";
    $query->bindParam('val',$val);
    $query->execute();
    $allCategories =$query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($allCategories as $cat) {
        ?>         

                         <tr>
                            <td><?php echo $cat['name']?></td>
                            <td><?php echo $cat['des']?></td>
                            <td><img height="50px" src="../assets/img/<?php echo $cat['image']?>" alt=""></td>
                            <td><a href="editCategory.php?cid=<?php echo $cat['id']?>" class="btn btn-info">Edit</a></td>
                            <td><a href="?cdid=<?php echo $cat['id']?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                  <?php  
                   }
                   exit();
  
             }


 // search work view products adminpanel
if(isset($_POST['pdt'])){
    $val = $_POST['pdt'];

    $query = $pdo->prepare("select products .*,category.name as cName,c_id as catId from products inner join category on products.c_id=category.id where products.name LIKE :val");
    $val ="%$val%";
    $query->bindParam('val',$val);
    $query->execute();
    $allProducts =$query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($allProducts as $pdt) {
        ?>         

                         <tr>
                            <td><?php echo $pdt['name']?></td>
                            <td><?php echo $pdt['des']?></td>
                            <td><?php echo $pdt['price']?></td>
                            <td><?php echo $pdt['qty']?></td>
                            <td><?php echo $pdt['pr_barcode']?></td>
                            <td><?php echo $pdt['cName']?></td>
                            <td><img height="50px" src="../assets/img/<?php echo $pdt['image']?>" alt=""></td>
                            <td><a href="editProduct.php?pid=<?php echo $pdt['id']?>" class="btn btn-info">Edit</a></td>
                            <td><a href="?pdid=<?php echo $pdt['id']?>" class="btn btn-danger">Delete</a></td>
                                </tr>
                  <?php  
                   }
                   exit();
  
             }

             
  
             //add design
         $designName = $designData='';
         $designNameErr=$designDataErr="";
 
        
        // Add DESIGN
        if (isset($_POST['addDesign'])) {
            $designName = $_POST['design_name'];
            $designData = $_POST['design_data'];
            $user_id = $_SESSION['user_id'];
        
            // Validate required fields
            if (empty($designName)) {
                $designNameErr = "Design name is required";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $designName)) {
                    $designNameErr = "Enter a valid design name";
                }
            }
            
            if (empty($designData)) {
                $designDataErr = "Design data is required";
            }
        
            // Check for errors
            if (empty($designNameErr) && empty($designDataErr)) {
                $query = $pdo->prepare("INSERT INTO designs (design_name, design_data,user_id) VALUES (:dName, :dData,:user_id)");
                $query->bindParam(':dName', $designName);
                $query->bindParam(':dData', $designData);
                $query->bindParam(':user_id', $user_id);
                $query->execute();
        
                echo "<script>alert('Design added successfully'); location.assign('user.php');</script>";
            } 
        }


        //Update Design
        // Initialize variables
        $desData = $desName = '';
        $dNameErr = $dDataErr = '';
        
        // Handling form submission for updating design
        if (isset($_POST['updateDesign'])) {
            $desid = $_GET['desid'];
            $desName = $_POST['desName'];
            $desData = $_POST['desData'];
        
            // Validate required fields
            if (empty($desName)) {
                $dNameErr = "Design name is required";
            } else {
                if (!preg_match("/^[a-zA-Z ]*$/", $desName)) {
                    $dNameErr = "Enter a valid design name";
                }
            }
        
            if (empty($desData)) {
                $dDataErr = "Design description is required";
            }
        
            // Check for errors and perform the update if no errors
            if (empty($dNameErr) && empty($dDataErr)) {
                $query = $pdo->prepare("UPDATE designs SET design_name = :dName, design_data = :dData WHERE id = :id");
                $query->bindParam(':dName', $desName);
                $query->bindParam(':dData', $desData);
                $query->bindParam(':id', $desid);
                $query->execute();
        
                echo "<script>alert('Design updated successfully'); location.assign('user.php');</script>";
            }
        }


        //deleting design

        if (isset($_GET['id'])) {
            $design_id = $_GET['id'];
            $query = $pdo->prepare('DELETE FROM designs WHERE id = :id');
            $query->bindParam(':id',$design_id);
            $query->execute();
        
            echo "<script>alert('deleted design successfully');
            location.assign('view_design.php');</script>";
        }
        //add ACTIVITY
        $activity_type=$activity_data='';
        $activityTypeErr=$activity_dataErr='';
        if (isset($_POST['addActivity'])) {
            $activity_type = $_POST['activity_type'];
            $activity_data = $_POST['activity_data'];
            $user_id = $_SESSION['user_id']; // Assuming user_id is stored in session
        
            // Validate the activity type
            if (empty($activity_type)) {
                $activityTypeErr = "Activity type is required";
            }

            if (empty($activity_data)) {
                $activity_dataErr = "Activity data is required";
            }
        
            if (empty($activityTypeErr)&& empty($activity_dataErr) ) {
                // Insert into activities table
                $query = $pdo->prepare("INSERT INTO activities (activity_type, activity_data, user_id, created_at) VALUES (:activity_type, :activity_data, :user_id, NOW())");
                $query->bindParam(':activity_type', $activity_type);
                $query->bindParam(':activity_data', $activity_data);
                $query->bindParam(':user_id', $user_id);
                $query->execute();
        
                echo "<script>alert('Activity added successfully'); location.assign('user.php');</script>";
            }
        }
        
        //delete activity
        if (isset($_GET['id'])) {
            $delete_id = $_GET['id'];
        
            // Delete the activity from the database
            $query = $pdo->prepare("DELETE FROM activities WHERE id = :id");
            $query->bindParam(':id', $delete_id);
            $query->execute();
        
            echo "<script>alert('Activity deleted successfully'); location.assign('viewActiviities.php');</script>";
        }
///update activities
         // Initialize variables
         $activity_Type = $activity_Data = '';
         $activity_typeErr = $activity_DataErr = '';
         
         // Handling form submission for updating ACtivities
         if (isset($_POST['updateActivities'])) {
            $actid=$_GET['actid'];
             $activity_Type = $_POST['activity_type'];
             $activity_Data = $_POST['activity_data'];
         
             // Validate required fields
             if (empty($activity_Type)) {
                 $activity_typeErr = "Activity type is required";
             } else {
                 if (!preg_match("/^[a-zA-Z ]*$/", $activity_Type)) {
                     $activity_typeErr = "Enter a valid activity type";
                 }
                }
         
             if (empty($activity_Data)) {
                 $activity_DataErr = "Activity Data is required";
             }
         
             // Check for errors and perform the update if no errors
             if (empty($activity_typeErr) && empty($activity_DataErr)) {
                 $query = $pdo->prepare("UPDATE activities SET activity_type = :acName, activity_Data = :acData WHERE id = :id");
                 $query->bindParam(':acName', $activity_Type);
                 $query->bindParam(':acData', $activity_Data);
                 $query->bindParam(':id', $actid);
                 $query->execute();
         
                 echo "<script>alert('Activities updated successfully'); location.assign('user.php');</script>";
             }
         }
         //searching work view design ajax
         if (isset($_POST['design'])) {
            $val = $_POST['design'];
            $query = $pdo->prepare("SELECT * FROM designs WHERE design_name LIKE :val");
            $val = "%$val%";
            $query->bindParam(':val', $val);
            $query->execute();
            $allDesigns = $query->fetchAll(PDO::FETCH_ASSOC);
        
            if (!empty($allDesigns)) {
                foreach ($allDesigns as $desg) {
                    ?>
                    <tr>
                        <td><?php echo $desg['design_name']; ?></td>
                        <td><?php echo $desg['design_data']; ?></td>
                        <td><?php echo $desg['created_at']; ?></td>
                        <td><a class="btn btn-primary" href="editDesign.php?desid=<?php echo $desg['id']; ?>">Edit</a></td>
                      <!-- <input type="hidden" name="design_id" value="<?php //echo $design_id; ?>">
                        <td><a class="btn btn-primary" name="design_id" value="<?php //echo $design_id; ?> ">Save Design</a></td> -->

                        <td><a class="btn btn-danger" href="?id=<?php echo $desg['id']; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
            } else {
                // If no results, show a message
                echo "<tr><td colspan='5'>No designs found</td></tr>";
            }
            exit();
        }
        
// searching for adminpanel activities
        if (isset($_POST['activity'])) {
            $val = $_POST['activity'];
            $user_id = $_SESSION['user_id']; // Fetch the user ID from session
        
            $query = $pdo->prepare("SELECT * FROM activities WHERE activity_type LIKE :val AND user_id = :user_id ORDER BY created_at DESC");
            $val = "%$val%";
            $query->bindParam(':val', $val);
            $query->bindParam(':user_id', $user_id);  // Filter by the logged-in user
            $query->execute();
            
            $allActivities = $query->fetchAll(PDO::FETCH_ASSOC);
        
            if (!empty($allActivities)) {
                foreach ($allActivities as $activity) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($activity['activity_type']); ?></td>
                        <td><?php echo htmlspecialchars($activity['activity_data']); ?></td>
                        <td><?php echo htmlspecialchars($activity['created_at']); ?></td>
                        <td><a class="btn btn-primary" href="editActivities.php?actid=<?php echo $activity['id']; ?>">Edit</a></td>
                        <td><a class="btn btn-danger" href="?id=<?php echo $activity['id']; ?>">Delete</a></td>
                    </tr>
                    <?php
                }
            } else {
                echo "<tr><td colspan='5'>No activities found</td></tr>";
            }
            exit();
        }



// Searching functionality for reviews using AJAX
if (isset($_POST['reviews'])) {
    $val = $_POST['reviews'];

    // Prepare the SQL query
    $query = $pdo->prepare("
        SELECT reviews.*, designers.name AS designer_name 
        FROM reviews 
        INNER JOIN designers ON reviews.designer_id = designers.designer_id 
        WHERE reviews.user_id = :user_id 
        AND (designers.name LIKE :val OR reviews.review_text LIKE :val) 
        ORDER BY reviews.created_at DESC
    ");

    // Bind parameters
    $val = "%$val%"; // For partial matching
    $query->bindParam(':user_id', $user_id); // Bind the user ID
    $query->bindParam(':val', $val); // Bind the search value

    // Execute the query
    $query->execute();

    // Fetch results
    $allReviews = $query->fetchAll(PDO::FETCH_ASSOC);

    // Check if there are any reviews found
    if (!empty($allReviews)) {
        foreach ($allReviews as $review): ?>
            <tr>
                <td><?php echo htmlspecialchars($review['designer_name']); ?></td>
                <td><?php echo htmlspecialchars($review['review_text']); ?></td>
                <td><?php echo htmlspecialchars($review['rating']); ?></td>
                <td><?php echo htmlspecialchars($review['created_at']); ?></td>
            </tr>
        <?php endforeach;
    } else {
        echo "<tr><td colspan='4'>No reviews found.</td></tr>"; // If no reviews match the search
    }
}




        //saved design
        
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     // Check if the user is logged in and design_id is set
//     if (isset($_SESSION['user_id'], $_POST['design_id'])) {
//         $user_id = $_SESSION['user_id'];
//         $design_id = $_POST['design_id'];

//         // Insert into the saved designs table
//         $query = $pdo->prepare("INSERT INTO saved_designs (user_id, design_id, saved_at) VALUES (:user_id, :design_id, NOW())");
//         $query->bindParam(':user_id', $user_id);
//         $query->bindParam(':design_id', $design_id);

//         if ($query->execute()) {
//             // Redirect back to the design page with a success message
//             header("Location: design_page.php?save=success");
//             exit();
//         } else {
//             // Redirect back with an error message
//             header("Location: design_page.php?save=error");
//             exit();
//         }
//     } else {
//         // Redirect back if no user or design ID is set
//         header("Location: design_page.php?save=missing");
//         exit();
//     }
// }// else {
//     // Redirect back if the request method is not POST
//     header("Location: design_page.php?save=invalid");
//     exit();
// } //else {
        //     // Redirect back if the request method is not POST
        //     header("Location: design_page.php?save=invalid");
        //     exit();
        // }




            
            
                       
             

        
        










