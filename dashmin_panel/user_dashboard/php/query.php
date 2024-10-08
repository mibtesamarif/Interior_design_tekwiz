<?php
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
        
                echo "<script>alert('Design added successfully'); location.assign('index.php');</script>";
            } 
        }


        
        // Initialize variables
        $desData = $desName = '';
        $dNameErr = $dDataErr = '';
        
        // Handling form submission for updating design
        if (isset($_POST['updateDesign'])) {
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
                $query->bindParam(':id', $actid);
                $query->execute();
        
                echo "<script>alert('Design updated successfully'); location.assign('index.php');</script>";
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
        
                echo "<script>alert('Activity added successfully'); location.assign('index.php');</script>";
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
         
                 echo "<script>alert('Activities updated successfully'); location.assign('index.php');</script>";
             }
         }

//design category admin dashboard

$catName = $catDes = $catImg = "";
$catNameErr = $catDesErr = $catImgErr = "";

if (isset($_POST['addDesignctg'])) {
    $catName = $_POST['ctgName'];
    $catDes = $_POST['ctgdes'];
    $catImg = $_FILES['ctgimg']['name'];
    $cImageTmpName = $_FILES['ctgimg']['tmp_name'];
    $extension = strtolower(pathinfo($catImg, PATHINFO_EXTENSION));
    $destination = "img/" . $catImg;

    // Validate required fields
    if (empty($catName)) {
        $catNameErr = "Category name is required";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $catName)) {
            $catNameErr = "Enter a valid name";
        }
    }

    if (empty($catDes)) {
        $catDesErr = "Description is required";
    }

    if (empty($catImg)) {
        $catImgErr = "Image is required";
    } else {
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
            $query = $pdo->prepare("INSERT INTO design_category (category_name, des, image) VALUES (:cName, :cDes, :cImage)");
            $query->bindParam(':cName', $catName);
            $query->bindParam(':cDes', $catDes);
            $query->bindParam(':cImage', $catImg);
            $query->execute();

            echo "<script>alert('Design Category added successfully'); location.assign('index.php');</script>";
        } else {
            $catImgErr = "Failed to upload image.";
        }
    }
}


        // search work view Category designer addmin adminpanel
if(isset($_POST['designcat'])){
    $val = $_POST['designcat'];
    $query = $pdo->prepare("select * from design_category Where category_name LIKE :val");
    $val ="%$val%";
    $query->bindParam('val',$val);
    $query->execute();
    $alldesignCategories =$query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($alldesignCategories as $ctge) {
        ?>         

<tr>
                       <!-- <td>1</td> -->
                        <td>
                          <div class="d-flex align-items-center gap-3 cursor-pointer">
                             <!-- <img src="assets/images/avatars/01.png" class="rounded-circle" width="44" height="44" alt=""> -->
                             <div class="">
                               <p class="mb-0"><?php echo $ctg['category_name']?></p>
                             </div>
                          </div>
                        </td>
                        <td><a href="editdesignctg.php?cid=<?php echo $ctg['c_id']?>" class="btn btn-info">Edit</a></td>
                        <td><a href="?cdid=<?php echo $ctg['c_id']?>" class="btn btn-danger">Delete</a></td>
                        </tr>
                     <?php
                       }
                    }




// Handle form submission for updating category
if (isset($_POST['updateDesignctg'])) {
    $id = $_GET['dgcid'];
    $catName = $_POST['ctgName'];
    $catDes = $_POST['ctgdes'];
    $catImg = $_POST['ctgimg'];
    
    // Validate required fields
    if (empty($catName)) {
        $catNameErr = "Category name is required";
    }
    if (empty($catDes)) {
        $catDesErr = "Description is required";
    }
    if (empty($catImg)) {
        $catImgErr = "Image name is required";
    }

    // Proceed if there are no errors
    if (empty($catNameErr) && empty($catDesErr) && empty($catImgErr)) {
        // Prepare the update query
        $updateQuery = $pdo->prepare("UPDATE design_category SET category_name = :cName, des = :cDes, image = :cImage WHERE c_id = :cid");
        $updateQuery->bindParam(':cName', $catName);
        $updateQuery->bindParam(':cDes', $catDes);
        $updateQuery->bindParam(':cImage', $catImg);
        $updateQuery->bindParam(':cid', $id);
        
        // Execute the update query
        if ($updateQuery->execute()) {
            echo "<script>alert('Design Category updated successfully'); location.assign('index.php');</script>";
            exit; // Add exit to stop further execution
        } else {
            echo "<script>alert('Failed to update the category');</script>";
        }
    }
}
// delete Design Category

if(isset($_GET['ctgid'])){
    $catid=$_GET['ctgid'];
    $query=$pdo->prepare("delete from design_category where c_id=:catid");
    $query->bindParam('catid',$catid);
    $query->execute();
    echo "<script>alert('delete category successfully');
    location.assign('viewdesignctg.php');
    </script>";

}
    


 
    

        
        








 // add post

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['addblog'])) {
    // Get form data
    $heading = $_POST['heading'];
    $intro_1 = $_POST['intro_1'];
    $intro_2 = $_POST['intro_2'];
    $intro_3 = $_POST['intro_3'];
    $main_1 = $_POST['cont_1'];  // Main Content
    $conclusion = $_POST['conclusion'];
    $meta_des = $_POST['meta_des'];
    $meta_keywords = $_POST['meta_key'];
    $date = $_POST['post_date'];

    // echo "<script>alert('$heading');</script>";

    // File upload handling for blogs_page_img
    $blogsPageImgName = '';
    if (isset($_FILES['blogs_page_img']) && $_FILES['blogs_page_img']['error'] == UPLOAD_ERR_OK) {
        $blogsPageImgName = basename($_FILES['blogs_page_img']['name']);
        $blogsPageImgTmpName = $_FILES['blogs_page_img']['tmp_name'];
        $blogsPageImgDestination = "assets/images/blog_images/". $blogsPageImgName;

        if (!move_uploaded_file($blogsPageImgTmpName, $blogsPageImgDestination)) {
            echo "<script>alert('Failed to move uploaded file for blogs_page_img');</script>";
            exit;
        }
    }

    // File upload handling for blog_img
    $blogImgName = '';
    if (isset($_FILES['blog_img']) && $_FILES['blog_img']['error'] == UPLOAD_ERR_OK) {
        $blogImgName = basename($_FILES['blog_img']['name']);
        $blogImgTmpName = $_FILES['blog_img']['tmp_name'];
        $blogImgDestination = "assets/images/blog_images/" . $blogImgName;

        if (!move_uploaded_file($blogImgTmpName, $blogImgDestination)) {
            echo "<script>alert('Failed to move uploaded file for blog_img');</script>";
            exit;
        }
    }

    // Proceed with database insertion
    try {
        // Insert into blogs table
        $query = $pdo->prepare("INSERT INTO blogs (heading, intro_1, intro_2, intro_3, main_1, conclusion, meta_des, meta_keywords, date, blogs_page_img, blog_img) VALUES (:heading, :intro_1, :intro_2, :intro_3, :main_1, :conclusion, :meta_des, :meta_keywords, :date, :blogs_page_img, :blog_img)");
        $query->bindParam(':heading', $heading);
        $query->bindParam(':intro_1', $intro_1);
        $query->bindParam(':intro_2', $intro_2);
        $query->bindParam(':intro_3', $intro_3);
        $query->bindParam(':main_1', $main_1);
        $query->bindParam(':conclusion', $conclusion);
        $query->bindParam(':meta_des', $meta_des);
        $query->bindParam(':meta_keywords', $meta_keywords);
        $query->bindParam(':date', $date);
        $query->bindParam(':blogs_page_img', $blogsPageImgName);
        $query->bindParam(':blog_img', $blogImgName);

        if ($query->execute()) {
            // Get the ID of the newly inserted blog
            $newBlogId = $pdo->lastInsertId();

            $status = "unpost";

            // Insert into blogs_status table
            $statusQuery = $pdo->prepare("INSERT INTO blogs_status (b_id, b_status) VALUES (:b_id ,:b_status)");
            $statusQuery->bindParam(':b_id', $newBlogId);
            $statusQuery->bindParam(':b_status', $status);

            if ($statusQuery->execute()) {
                // Redirect back to admin.php after successfully adding the blog
                echo "<script>alert('Blog added successfully'); </script>";
            } else {
                echo "<script>alert('Failed to add blog status');</script>";
            }
        } else {
            echo "<script>alert('Failed to add blog');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Failed to add blog: " . $e->getMessage() . "');</script>";
    }
}

//edit blog

if(isset($_GET['id_1'])) {
    $id = $_GET['id_1'];
    $query = $pdo->prepare("SELECT * FROM blogs WHERE id = :id");
    $query->bindParam(':id', $id);
    $query->execute();
    $blog = $query->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['update_blog'])) {
        // Get form data
        $heading = $_POST['heading'];
        $intro_1 = $_POST['intro_1'];
        $intro_2 = $_POST['intro_2'];
        $intro_3 = $_POST['intro_3'];
        $main_1 = $_POST['cont_1'];
        $conclusion = $_POST['conclusion'];
        $meta_des = $_POST['meta_des'];
        $meta_keywords = $_POST['meta_key'];
        $post_date = $_POST['post_date'];

        // File upload handling for blogs_page_img if a new image is uploaded
        $blogsPageImgName = $blog['blogs_page_img']; // current image name
        if(isset($_FILES['blogs_page_img']) && $_FILES['blogs_page_img']['error'] == UPLOAD_ERR_OK) {
            $blogsPageImgName = basename($_FILES['blogs_page_img']['name']);
            $blogsPageImgTmpName = $_FILES['blogs_page_img']['tmp_name'];
            $blogsPageImgDestination = "assets/images/blog_images/" . $blogsPageImgName;

            if(!move_uploaded_file($blogsPageImgTmpName, $blogsPageImgDestination)) {
                echo "<script>alert('Failed to move uploaded file for blogs_page_img');</script>";
                exit;
            }
        }

        // File upload handling for blog_img if a new image is uploaded
        $blogImgName = $blog['blog_img']; // current image name
        if(isset($_FILES['blog_img']) && $_FILES['blog_img']['error'] == UPLOAD_ERR_OK) {
            $blogImgName = basename($_FILES['blog_img']['name']);
            $blogImgTmpName = $_FILES['blog_img']['tmp_name'];
            $blogImgDestination = "assets/images/blog_images/" . $blogImgName;

            if(!move_uploaded_file($blogImgTmpName, $blogImgDestination)) {
                echo "<script>alert('Failed to move uploaded file for blog_img');</script>";
                exit;
            }
        }

        try {
            // Update blogs table
            $updateQuery = $pdo->prepare("UPDATE blogs SET heading = :heading, intro_1 = :intro_1, intro_2 = :intro_2, intro_3 = :intro_3, main_1 = :main_1, conclusion = :conclusion, meta_des = :meta_des, meta_keywords = :meta_keywords, date = :post_date, blogs_page_img = :blogs_page_img, blog_img = :blog_img WHERE id = :id");

            $updateQuery->bindParam(':heading', $heading);
            $updateQuery->bindParam(':intro_1', $intro_1);
            $updateQuery->bindParam(':intro_2', $intro_2);
            $updateQuery->bindParam(':intro_3', $intro_3);
            $updateQuery->bindParam(':main_1', $main_1);
            $updateQuery->bindParam(':conclusion', $conclusion);
            $updateQuery->bindParam(':meta_des', $meta_des);
            $updateQuery->bindParam(':meta_keywords', $meta_keywords);
            $updateQuery->bindParam(':post_date', $post_date);
            $updateQuery->bindParam(':blogs_page_img', $blogsPageImgName);
            $updateQuery->bindParam(':blog_img', $blogImgName);
            $updateQuery->bindParam(':id', $id);

            if($updateQuery->execute()) {
                echo "<script>alert('Blog updated successfully'); location.assign('view_blogs.php');</script>";
            } else {
                echo "<script>alert('Failed to update blog');</script>";
            }
        } catch(PDOException $e) {
            echo "<script>alert('Failed to update blog: " . $e->getMessage() . "');</script>";
        }
    }
}


// delete blog
if(isset($_GET['b_d_id_1'])){
    $bid =$_GET['b_d_id_1'];
    $query=$pdo->prepare("DELETE FROM blogs WHERE id = :bid");
    $query->bindparam('bid',$bid);
    $query->execute();
    }

// post blog
if (isset($_GET['b_p_id_1'])) {
    $bid = $_GET['b_p_id_1'];
    $currentDate = date('Y-m-d H:i:s'); // Get the current date

    try {
        // Update the blog status and post date
        $query = $pdo->prepare("UPDATE blogs_status SET post_date = :postDate, b_status = :status WHERE b_id = :bid");
        $query->bindParam(':bid', $bid);
        $query->bindParam(':postDate', $currentDate);
        $query->bindParam(':status', $status);
        $status = 'post'; // Set the status to 'post'

        if ($query->execute()) {
            echo "<script>alert('Blog has been posted successfully'); location.assign('view_blogs.php');</script>";
        } else {
            echo "<script>alert('Failed to post blog');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Failed to post blog: " . $e->getMessage() . "');</script>";
    }
}

// unpost blog
if (isset($_GET['b_u_p_id_1'])) {
    $bid = $_GET['b_u_p_id_1'];
    $date = NULL; // Get the current date

    try {
        // Update the blog status and post date
        $query = $pdo->prepare("UPDATE blogs_status SET post_date = :postDate, b_status = :status WHERE b_id = :bid");
        $query->bindParam(':bid', $bid);
        $query->bindParam(':postDate', $date);
        $query->bindParam(':status', $status);
        $status = 'unpost'; // Set the status to 'post'

        if ($query->execute()) {
            echo "<script>alert('Blog has been unposted successfully'); location.assign('view_blogs.php');</script>";
        } else {
            echo "<script>alert('Failed to unpost blog');</script>";
        }
    } catch (PDOException $e) {
        echo "<script>alert('Failed to unpost blog: " . $e->getMessage() . "');</script>";
    }
}


// $nameErr = "";
// $emailErr = "";
// $PhoneErr = "";
// $userErr = "";
// $passErr = "";
// $cpassErr = "";
// $userName = $userEmail = $userPhone = $useruName = $userPassword = $userConfirmPassword = $role = '';

// if(isset($_POST['signUp'])){
//     $userName = $_POST['userName'];
//     $userEmail = $_POST['userEmail'];
//     $userPhone = $_POST['userPhone'];
//     $useruName = $_POST['useruName'];
//     $userPassword = $_POST['userPassword'];
//     $userConfirmPassword = $_POST['userConfirmPassword'];
//     $role = isset($_POST['role']) ? $_POST['role'] : 'user'; // Default to 'user' if not set
    
//     // Validation
//     if(empty($_POST['userName'])){
//         $nameErr = "Name is required";
//     } else {
//         if (!preg_match("/^[a-zA-Z ]*$/", $userName)) {
//             $nameErr = "Enter a valid name";
//         }
//     }

//     if(empty($_POST['userEmail'])){
//         $emailErr = "Email is required";
//     } else {
//         $query = $pdo->prepare("SELECT id FROM users WHERE email = :email");
//         $query->bindParam('email', $userEmail);
//         $query->execute();
//         $user = $query->fetch(PDO::FETCH_ASSOC);
//         if($user){
//             $emailErr = 'Email already exists';
//         }
//     }

//     if(empty($_POST['userPhone'])){
//         $PhoneErr = "Phone number is required";
//     }

//     if(empty($_POST['useruName'])){
//         $userErr = "Username is required";
//     }

//     if(empty($_POST['userPassword'])){
//         $passErr = "Password is required";
//     }

//     if(empty($_POST['userConfirmPassword'])){
//         $cpassErr = "Confirm password is required";
//     } else {
//         if($userPassword !== $userConfirmPassword){
//             $cpassErr = "Passwords do not match";
//         }
//     }

//     // If no errors, proceed with registration
//     if(empty($nameErr) && empty($emailErr) && empty($PhoneErr) && empty($userErr) && empty($passErr) && empty($cpassErr)){
//         $passwordHash = sha1($userPassword);
        
//         // Determine role_id based on selected role
//         $role_id = ($role == 'designer') ? 2 : 3; // Assuming 2 for designer and 3 for user
        
//         $query = $pdo->prepare("INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)");
//         $query->bindParam('name', $userName);
//         $query->bindParam('email', $userEmail);
//         $query->bindParam('password', $passwordHash);
//         $query->bindParam('role_id', $role_id);
//         $query->execute();
        
//         echo "<script>alert('User registered successfully'); location.assign('../login.php');</script>";
//     }
// }






// // unset($user);

// //login

// if(isset($_POST['signIn'])){
//     $userEmail = $_POST['userEmail'];
//     $userPassword = $_POST['userPassword'];
//     if(empty($_POST['userEmail'])){
//         $emailErr = "Enter your email";

//     }
//     if(empty($_POST['userPassword'])){
//         $passErr = "Enter your password";
//     }
//     if(empty($emailErr) && empty($passErr)){
//     $query = $pdo->prepare("select * from users where email = :email");
//     $query->bindParam('email',$userEmail);
//     $query->execute();
//    $user =  $query->fetch(PDO::FETCH_ASSOC);
//    if($user){
// // print_r($user);
// if (sha1($userPassword) == $user['password']){
//     if($user['role_id'] == 1 ){
//         $_SESSION['adminId']=$user['id'];
//         $_SESSION['adminName']=$user['name'];
//         $_SESSION['adminEmail']=$user['email'];
//         echo "<script>location.assign('index.php')
//         </script>";
//     }

//      if($user['role_id'] == 2 ) {
//         $_SESSION['designerId']=$user['id'];
//         $_SESSION['designerName']=$user['name'];
//         $_SESSION['designerEmail']=$user['email'];
//         echo "<script>location.assign('../index.php')
//         </script>";
//     }
//     else if ($user['role_id'] == 3 ) {
//     $_SESSION['user_id']=$user['id'];
//     $_SESSION['userName']=$user['name'];
//     $_SESSION['userEmail']=$user['email'];
//     // $_SESSION['userCont']=$user['phone'];

//     echo "<script>location.assign('../index.php')

//     </script>";
//     } 
  
//         echo "<script>alert('login successfully')</script>";
//        }
    
//    else{
   
//     echo "<script>location.assign('login.php?error=invalid credentials')</script>";
// }
// }
// else{
//     echo "<script>location.assign('login.php?error=user not found')</script>";
// }
// }
// unset($user);
// }


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





