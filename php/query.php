<?php
include('adminPanel/php/dbcon.php');
$nameErr = "";
$emailErr = "";
$PhoneErr="";
$userErr="";
$passErr = "";
$cpassErr ="";
$userName = $userEmail = $userPhone= $useruName= $userPassword = $userConfirmPassword =  '';
if(isset($_POST['signUp'])){
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPhone = $_POST['userPhone'];
    $useruName = $_POST['useruName'];
    $userPassword = $_POST['userPassword'];
    $userConfirmPassword = $_POST['userConfirmPassword'];
    if(empty($_POST['userName'])){
        $nameErr = "name is required";
    }
    else{
        if (!preg_match("/^[a-zA-Z ]*$/",$userName)) {
            $nameErr = "Enter correct name";
        }
       }
    if(empty($_POST['userEmail'])){
        $emailErr = "Email is required";
    }
    else{
        $query = $pdo->prepare("select id from users where email = :email");
        $query->bindParam('email',   $userEmail );
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        if($user){
            $emailErr = 'email is already exist';
        }
        unset($user);
    }
    if(empty($_POST['userPhone'])){
        $PhoneErr = "phone pattern is required";
    }
    if(empty($_POST['useruName'])){
        $userErr = "username is required";
    }
    if(empty($_POST['userPassword'])){
        $passErr = "password is required";
    }
    if(empty($_POST['userConfirmPassword'])){
        $cpassErr = "confirm password is required";
    }
    else{
        if($userPassword !== $userConfirmPassword){
            $cpassErr = "password do not matched";
        }
    }
   
    if(empty($nameErr) && empty($emailErr) && empty($PhoneErr) && empty($userErr)  && empty($passErr) && empty($cpassErr)){
    $passwordHash = sha1($userPassword);
    $query = $pdo->prepare("insert into users(name ,email,password) values (:name,:email,:password)");
    $query->bindParam('name',$userName);
    $query->bindParam('email',$userEmail);
    $query->bindParam('password',$passwordHash);
    $query->execute();
    echo "<script>alert('user added successfully');
    location.assign('signin.php');
    </script>";
    unset($user);
}
// unset($user);
}
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
   if(sha1($userPassword) == $user['password']){
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

?>