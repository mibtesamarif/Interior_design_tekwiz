<?php
include('php/query.php');
?>

<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form</title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
      <header>Login</header>
      <form action="" method="post">
        <div>
        <input name="userEmail" value="<?php echo $userEmail?>" type="text" placeholder="Enter your email">
        <small class="text-danger"><?php echo $emailErr?></small>
      </div>
      <div>
        <input type="text" name="userPassword" value="<?php echo $userPassword?>" placeholder="Enter your password">
        <small class="text-danger"><?php echo $passErr?></small>
      </div>
<br>
        <a href="#">Forgot password?</a>
        <input name="signIn" type="submit" class="button" value="Login">
      </form>
      <div class="signup">
        <span class="signup">Don't have an account?
         <label for=""><a href="signup.php">Signup</a></label>
        </span>
      </div>
    </div>

  </div>
</body>
</html>