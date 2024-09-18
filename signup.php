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
    background: #101b19;
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
    color: #fff;
    background: #101b19;
    width: 100%;
    font-size: large;
    padding: 10px 0;
    border-radius: 10px;
    cursor: pointer;
    margin-bottom: 10px;
  }

  .form .button:hover {
    background: #000000;
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

  /* Media queries for responsiveness */
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

</style>

</head>
<body>
  <div class="container">
    <div class="registration form">
  <header>Signup</header>
  <form action="#">
  <div class="row">
    <input type="text" placeholder="Enter your name">
    <input type="text" placeholder="Enter your email">
  </div>
  <div class="row">
    <input type="number" placeholder="Enter your number">
    <input type="text" placeholder="Enter your username">
  </div>
  <div class="row">
    <input type="password" placeholder="Create a password">
    <input type="password" placeholder="Confirm your password">
  </div>
  
  <!-- Radio buttons for User and Designer -->
  <div class="user-type">
    <label>
      <input type="radio" name="role" value="user" checked> User
    </label>
    <label>
      <input type="radio" name="role" value="designer"> Designer
    </label>
  </div>
  
  <button class="button">Signup</button>
</form>


  <div class="signup">
    <span class="signup">Already have an account?
      <label for=""><a href="login.php">Login</a></label>
    </span>
  </div>
</div>

  </div>
</body>
</html>