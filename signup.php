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

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>


                <?php
                    // Connect to database
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "project_db";

                    $conn = mysqli_connect($servername, $username, $password, $dbname);

                    // Check connection
                    if (!$conn) {
                      die("Connection failed: " . mysqli_connect_error());
                    }

                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                      // Get form data
                      $name = $_POST['name'];
                      $lastname = $_POST['lastname'];
                      $username = $_POST['username'];
                      $password = $_POST['password'];

                      // Check if user already exists
                      $sql = "SELECT * FROM users WHERE username = '$username'";

                      $result = $conn->query($sql);

                      if ($result->num_rows > 0) {
                          echo '<div class="alert alert-danger" role="alert">
                                      User already exists. Please choose a different name.
                                  </div>';
                      } else {
                          // Insert data into user table
                          $sql = "INSERT INTO users (name,lastname, username, password) VALUES ('$name','$lastname','$username', '$password')";

                          if ($conn->query($sql) === TRUE) {
                              header("Location: login.php");
                              exit();
                          } else {
                              echo '<div class="alert alert-danger" role="alert">
                                          Error: ' . $conn->error . '
                                      </div>';
                          }
                      }
                  }

                  $conn->close();
              ?>


                <form class="mx-0.1 mx-md-6" action = "" method = "POST" id = "form" style= "text-align: center;">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="name">Your Name</label>  
                      <input type="text" id="name" class="form-control" name = "name" />
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="lastname">Last Name</label>
                      <input type="text" id="lastname" class="form-control"  name = "lastname"/>
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="username">Username</label>
                      <input type="text" id="username" class="form-control"  name = "username"/>
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="password">Password</label>  
                      <input type="password" id="password" class="form-control"  name = "password"/>
                      
                    </div>
                  </div>

                  <!-- <div class="form-check d-flex justify-content-center mb-5">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                    <label class="form-check-label" for="form2Example3">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div> -->

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                  <p class = "row justify-content-center">
                    Existing account: <a href="login.php"  class = "row justify-content-center">log in</a>
                  </p>

                </form>

              </div>
              <!-- <div class="col-md-7 col-lg-5 col-xl-4 d-flex align-items-center order-1 order-lg-1 justify-content-center" >

                <img src="images\singup_img.png"
                  class="img-fluid" alt="Sample image">

              </div> -->
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>
