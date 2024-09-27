<?php
<<<<<<< HEAD:login_php/query.php
include('Database_connection/dbcon.php');
=======

include('dashmin_panel/php/dbcon.php');
>>>>>>> c60664e13d82be9a2800fc7ee778c484e8856af9:php/query.php

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






 unset($user);

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
        echo "<script>location.assign('dashmin_panel/admin_dashboard/index.php')
        </script>";
    }


      if($user['role_id'] == 2 ) {
        $_SESSION['designerId']=$user['id'];

        $_SESSION['designerName']=$user['name'];
        $_SESSION['designerEmail']=$user['email'];
        echo "<script>location.assign('dashmin_panel/designer_dashboard/designer.php')
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


//consultation booking 
    
if (isset($_POST['consultationBookweb'])) {

    // if (isset($_SESSION['user_id']) && isset($_SESSION['designerId'])) {
        $user_id = $_SESSION['user_id'];  
        $designer_id = $_SESSION['designerId'];  
        // echo $designer_id ."hello";
        $designs_id=$_GET['dId'];
        $consultation_date = $_POST['consultation_date'];
        $status = 'pending';

        $query = $pdo->prepare("INSERT INTO consultations (user_id, design_id, designer_id, consultation_date) VALUES (:user_id, :designs_id, :consultation_id, :consultation_date)");

        $query->bindParam(':user_id', $user_id);
        $query->bindParam(':designs_id', $designs_id);
        $query->bindParam(':consultation_id', $designer_id);  
        $query->bindParam(':consultation_date', $consultation_date);
        // $query->bindParam(':stat', $status);

        // Execute the statement and check for success
        if ($query->execute()) {
            echo "Consultation booked successfully!";
        } else {
            $errorInfo = $query->errorInfo();
            echo "Error booking the consultation: " . $errorInfo[2];
        }
<<<<<<< HEAD:php/query.php
    } 
=======

    } 




>>>>>>> 67314bb7377a52259bc4c25697cfe15bf8aa6408:login_php/query.php


?>