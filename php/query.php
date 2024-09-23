<?php
<<<<<<< HEAD

=======
>>>>>>> 5fb8ff3bcd89b7a3c524ea54ec4c4b55d5f69083
include('dashmin_panel/php/dbcon.php');

$nameErr = "";
$emailErr = "";
$PhoneErr = "";
$userErr = "";
$passErr = "";
$cpassErr = "";
$userName = $userEmail = $userPhone = $useruName = $userPassword = $userConfirmPassword = $role = '';

if(isset($_POST['signUp'])){
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $useruName = $_POST['useruName'];
    $userPassword = $_POST['userPassword'];
    $userConfirmPassword = $_POST['userConfirmPassword'];
    $role = isset($_POST['role']) ? $_POST['role'] : 'user'; // Default to 'user' if not set
    
    // Validation
    if(empty($_POST['userName'])){
        $nameErr = "Name is required";
    } else {
        if (!preg_match("/^[a-zA-Z ]*$/", $userName)) {
            $nameErr = "Enter a valid name";
        }
    }

    if(empty($_POST['userEmail'])){
        $emailErr = "Email is required";
    } else {
        $query = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $query->bindParam('email', $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
            $emailErr = 'Email already exists';
        }
    }

    if(empty($_POST['userPhone'])){
        $PhoneErr = "Phone number is required";
    }

    if(empty($_POST['useruName'])){
        $userErr = "Username is required";
    }

    if(empty($_POST['userPassword'])){
        $passErr = "Password is required";
    }

    if(empty($_POST['userConfirmPassword'])){
        $cpassErr = "Confirm password is required";
    } else {
        if($userPassword !== $userConfirmPassword){
            $cpassErr = "Passwords do not match";
        }
    }

    // If no errors, proceed with registration
    if(empty($nameErr) && empty($emailErr) && empty($PhoneErr) && empty($userErr) && empty($passErr) && empty($cpassErr)){
        $passwordHash = sha1($userPassword);
        
        // Determine role_id based on selected role
        $role_id = ($role == 'designer') ? 2 : 3; // Assuming 2 for designer and 3 for user
        
        $query = $pdo->prepare("INSERT INTO users (name, email, password, role_id) VALUES (:name, :email, :password, :role_id)");
        $query->bindParam('name', $userName);
        $query->bindParam('email', $userEmail);
        $query->bindParam('password', $passwordHash);
        $query->bindParam('role_id', $role_id);
        $query->execute();
        
        echo "<script>alert('User registered successfully'); location.assign('login.php');</script>";
    }
}






// unset($user);

//login

if(isset($_POST['signIn'])){
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];
    if(empty($_POST['userEmail'])){
        $emailErr = "Enter your email";

    }
    if(empty($_POST['userPassword'])){
        $passErr = "Enter your password";
    }
    if(empty($emailErr) && empty($passErr)){
    $query = $pdo->prepare("select * from users where email = :email");
    $query->bindParam('email',$userEmail);
    $query->execute();
   $user =  $query->fetch(PDO::FETCH_ASSOC);
   if($user){
//    print_r($user);
if (sha1($userPassword) == $user['password']){
    if($user['role_id'] == 1 ){
        $_SESSION['adminId']=$user['id'];
        $_SESSION['adminName']=$user['name'];
        $_SESSION['adminEmail']=$user['email'];
        echo "<script>location.assign('dashmin_panel/index.php')
        </script>";
    }

<<<<<<< HEAD
      if($user['role_id'] == 2 ) {
        $_SESSION['designerId']=$user['id'];
=======
     else if($user['role_id'] == 2 ) {
        $_SESSION['designer_id']=$user['id'];
>>>>>>> 5fb8ff3bcd89b7a3c524ea54ec4c4b55d5f69083
        $_SESSION['designerName']=$user['name'];
        $_SESSION['designerEmail']=$user['email'];
        echo "<script>location.assign('index.php')
        </script>";
    }
     if ($user['role_id'] == 3 ) {
    $_SESSION['user_id']=$user['id'];
    $_SESSION['userName']=$user['name'];
    $_SESSION['userEmail']=$user['email'];
    // $_SESSION['userCont']=$user['phone'];
    echo "<script>location.assign('index.php')
    </script>";
    } 
  
        echo "<script>alert('login successfully')</script>";
       }
    
   else{
   
    echo "<script>location.assign('login.php?error=invalid credentials')</script>";
}
}
else{
    echo "<script>location.assign('login.php?error=user not found')</script>";
}
}
unset($user);
}



    
    // Check if the consultation book flag is set
    if (isset($_POST['consultationBookweb'])) {
       

        // Check if user and designer IDs are set in the session
        if (isset($_SESSION['user_id']) && isset($_SESSION['designer_id'])) {
            $user_id = $_SESSION['user_id'];
            $designer_id = $_SESSION['designer_id'];
            $designs_id = htmlspecialchars($_POST['designs_id']);
            $consultation_date = htmlspecialchars($_POST['consultation_date']);
            $status = 'scheduled';

            // Prepare the SQL statement
            $sql = "INSERT INTO consultations (user_id, designs_id, consultation_id, consultation_date, status) 
                    VALUES (:user_id, :designs_id, :consultation_id, :consultation_date, :status)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':designs_id', $designs_id);
            $stmt->bindParam(':consultation_id', $designer_id);
            $stmt->bindParam(':consultation_date', $consultation_date);
            $stmt->bindParam(':status', $status);

            // Execute the statement and check for success
            if ($stmt->execute()) {
                echo "Consultation booked successfully!";
            } else {
                $errorInfo = $stmt->errorInfo();
                echo "Error booking the consultation: " . $errorInfo[2];
            }
        } else {
            echo "Error: User or Designer ID is not set.<br>";
        }
    } else {
        echo "Error: Consultation Book Flag is not set.<br>";
    }






?>