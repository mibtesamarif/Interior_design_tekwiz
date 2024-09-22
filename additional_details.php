<?php
include('php\query.php');
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration Form</title>
  <!---Custom CSS File--->
  <style>

  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
  }

  body {
    min-height: 100vh;
    width: 100%;
    background: #111;
  }

  .container {
    margin: 50px auto;
    max-width: 600px;
    width: 100%;
    background: #fff;
    border-radius: 7px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    padding: 2rem;
  }

  .form header {
    font-size: 2rem;
    font-weight: 500;
    text-align: center;
    margin-bottom: 1.5rem;
  }

  /* Adjusting layout for signup form fields */
  .row {
    display: flex;
    justify-content: space-between;
    gap: 10px; /* Space between the input fields */
    margin-top: 20px;
  }

  .row input {
    width: calc(50% - 5px); /* Each input field takes 50% of the row minus a little gap */
  }

  .form input {
    height: 60px;
    padding: 0 15px;
    font-size: 17px;
    margin-bottom: 1.3rem;
    border: 1px solid #ddd;
    border-radius: 6px;
    outline: none;
    width: 100%;
  }

  .form input:focus {
    box-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
  }

  .form a {
    font-size: 16px;
    color: #ff4f4f;
    text-decoration: none;
  }

  .form a:hover {
    text-decoration: underline;
  }

  .form .button {
    margin-top: 10px;
    color: #fff;
    background: #101b19;
    width: 100%;
    font-size: large;
    padding: 10px 0;
    border-radius: 10px;
    cursor: pointer;
    margin-bottom: 10px;
    border: none;
    transition: 0.6s ease-out;
  }

  .form .button:hover {
    background: #000000;
  }

  small {
    display: block;
    margin-top: -20px;
    color: red;
  }

  /* Styling the radio buttons and labels */
  .user-type {
    display: flex;
    justify-content: space-around;
    margin-bottom: 1.5rem;
  }

  .user-type label {
    font-size: 17px;
    color: #333;
    display: flex;
    align-items: center;
  }

  .user-type input[type="radio"] {
    margin-right: 8px;
    accent-color: #101b19; /* Changes the color of the radio button */
  }

  .signup {
    text-align: center;
  }
  .textarea1{
    width: 100%;
  }

  /* Enhanced responsiveness for different screen sizes */
  @media (max-width: 768px) {
    .container {
      padding: 1rem;
    }

    .row {
      flex-direction: column;
    }

    .row input {
      width: 100%; /* Full width for smaller screens */
      margin-bottom: 1rem;
    }
  }


  @media (max-width: 480px) {
    .form header {
      font-size: 1.5rem; /* Smaller font size for headers */
    }

    .form input {
      height: 50px; /* Slightly smaller input field height */
    }

    .form .button {
      font-size: medium;
    }

    .user-type {
      flex-direction: column;
      align-items: flex-start;
    }

    .user-type label {
      margin-bottom: 10px;
    }
  }

  @media (max-width: 400px) {
    .form header {
      font-size: 1.2rem;
    }

    .form input {
      height: 45px;
      font-size: 14px;
    }

    .form .button {
      font-size: small;
      padding: 8px 0;
    }

    .user-type label {
      font-size: 15px;
    }

    small {
      font-size: 12px;
    }
  }
   

</style>

</head>
<body>
  <div class="container">
    <div class="registration form">
  <header>Signup</header>
  <form action="" method="post">
  <div class="row">
  <div>
    <input name="userName"  type="text" placeholder="Enter your name">
    <small class="text-danger"><?php echo $nameErr?></small></div>
<div>    <input name="userEmail" value="<?php echo $userEmail?>" type="email" placeholder="Enter your email">
    <small class="text-danger"><?php echo $emailErr?></small></div>


  </div>
  <div class="row">

                                <div class="textarea1" >
                                    <textarea id="bio" name="bio"  placeholder="Your Bio (max 250 characters)" maxlength="250" rows="4"></textarea>
                                    <small id="charCount" class="form-text text-muted">250 characters remaining</small>
                                </div>

    <div>
    <input name="userPhone" value="<?php echo $userPhone?>"  type="number" placeholder="Enter your number">
    

    <div>
    <input name="useruName"  value="<?php echo $useruName?>"  type="text" placeholder="Enter your username">
   

  </div>
  <div class="row">
    <div>
    <input name="userPassword" value="<?php echo $userPassword?>" type="password" placeholder="Create a password">
    
     
    <div>
    <input  name="userConfirmPassword" value="<?php echo $userConfirmPassword?>" type="password" placeholder="Confirm your password">
    

  </div>



  

  <button type="submit" name="add_detail" class="button">Submit</button>

</form>



</div>

  </div>
  <script>
        const bio = document.getElementById('bio');
        const charCount = document.getElementById('charCount');
        const maxChars = 250;

        bio.addEventListener('input', function() {
            const remaining = maxChars - bio.value.length;
            charCount.textContent = `${remaining} characters remaining`;

            // If the limit is reached, prevent further typing
            if (remaining <= 0) {
                charCount.textContent = 'You have reached the 250 character limit';
            }
        });
    </script>
</body>

</html>


