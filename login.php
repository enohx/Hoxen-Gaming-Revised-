<?php   
    require_once("databaseconfig.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
      
    </style>
</head>
<body>
<section class="vh-100" class="bg-image" style="background-image: url('images/background.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
  <div class="container h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100" >
      <div class="col-lg-7 col-xl-5" >
        <div class="card text-black" style="border-radius: 50px; background-color: rgba(255, 255, 255, 0.9);">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log in</p>


                <?php

// // Retrieve username and password values from form
// $username = $_POST['username'];
// $password = $_POST['password'];

// // Connect to database
// $mysqli = mysqli_connect('localhost', 'username', 'password', 'project_db');

// // Check for database connection errors
// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
// }

// // Query database for user with matching username
// $query = "SELECT * FROM users WHERE username='$username'";
// $result = mysqli_query($mysqli, $query);

// // Check if query returned any rows
// if (mysqli_num_rows($result) == 0) {
//     echo "Invalid username or password.";
//     exit();
// }

// // Retrieve user's data from database
// $user = mysqli_fetch_assoc($result);

// // Check if password is correct
// if (!password_verify($password, $user['password'])) {
//     echo "Invalid username or password.";
//     exit();
// }

// // Check if user is an admin
// if ($user['is_admin']) {
//     header("Location: admin.php");
//     exit();
// } else {
//     header("Location: index.php");
//     exit();
// }
?>


              <form class="mx-0.1 mx-md-6" action="loginCheck.php" method="POST" id="form" style="text-align: center;">

              <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label class="form-label" for="username">Username</label>
                  <input type="text" id="username" class="form-control" name="username"/>
                </div>
              </div>

              <div class="d-flex flex-row align-items-center mb-4">
                <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                <div class="form-outline flex-fill mb-0">
                  <label class="form-label" for="password">Password</label>
                  <input type="password" id="password" class="form-control" name="password"/>
                </div>
              </div>

              <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <button type="submit" class="btn btn-primary btn-lg">Log In</button>
              </div>

              <p class="row justify-content-center">
                New Account: <a href="signup.php" class="row justify-content-center">Sign Up</a>
              </p>

              </form>


              </div>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>
