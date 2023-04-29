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
    <script src="scripts\userlist.js"></script>
    <script src = "scripts\gamelist.js"></script>
    <script src = "scripts\gameinsert.js"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
          rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
          crossorigin="anonymous">
    <link rel="stylesheet" href="styles\user_card.css">
    <link rel="stylesheet" href="styles\user_list.css">
    <link rel="stylesheet" href="styles\nav.css">


</head>
<body>

<script>
    getGames();
</script>

<header>
        <div class = "container">
            <nav>
                <h1 class = "brand"><a href="home.php">Hox<span>3</span>n Gaming</a></h1>
                <ul>
                    <li> <a href="signup.php">Sign Up</a></li>
                    <li> <a href="login.php">Log In</a></li>
                    <li> <a href="about.php">About</a></li>
                    <li> <a href="locations.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>



<section class="vh-100" class="bg-image" style="background-image: url('images/background.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
  <div class="container h-100" >
    <div class="row d-flex justify-content-center align-items-center h-100 p-md-2" >
      <div class="col-lg-5 col-xl-5" style = " margin-right: 10%;" id = "scrollable">
        <div class="card text-black" style="border-radius: 50px; background-color: rgba(255, 255, 255, 0.9);">
          <div class="card-body p-md-2">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Games</p>


                <form class="mx-0.1 mx-md-6" action="insert_game.php" method="POST" id="form" style="text-align: center;">
                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="name">Game Name</label>  
                            <input type="text" id="name" class="form-control" name = "name" />
                      
                        </div>
                    </div>

                     <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                            <label class="form-label" for="price">Price</label>
                            <input type="text" id="price" class="form-control"  name = "price"/>
                      
                         </div>
                    </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="rating">Rating</label>
                      <input type="text" id="rating" class="form-control"  name = "rating"/>
                      
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill mb-0">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" rows="3" name = "description"></textarea>
                      
                    </div>
                  </div>

                  <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                    <button type="submit" class="btn btn-primary btn-lg" name = "add_game">Add Game</button>
                  </div>

                  
                </form>

                <div class="row mb-3">
                    <div class="col-md-8 offset-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search-input1" placeholder="game" >
                            <button class="btn btn-primary" id="search-button1" style="display: none;">Search</button>
                        </div>
                    </div>
                </div>

                <div id = "game_list">
                      <?php include('game_list.php'); ?>
                </div>



                
              </div>
            </div>    
          </div>
        </div>
      </div>


      <div class="col-lg-5 col-xl-5" id = "scrollable" style = "padding-top: 1vh">
        <div class="card text-black" style="border-radius: 50px; background-color: rgba(255, 255, 255, 0.9);" >
            <div class="card-body p-md-2" >

          


            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-7 order-2 order-lg-1" >

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Users</p>

                <div class="row mb-3">
                    <div class="col-md-8 offset-md-2">
                        <div class="input-group">
                            <input type="text" class="form-control" id="search-input" placeholder="Username" >
                            <button class="btn btn-primary" id="search-button" style="display: none;">Search</button>
                        </div>
                    </div>
                </div>

                <div id = "user_list" >
                    <?php include('user_list.php'); ?>
                </div>
              </div>

            </div>
      
          </div>
        </div>
      </div>   
    </div>
  </div>
</section>


<script>
    function deleteGame(id) {
        // Send an AJAX request to the PHP script to delete the game record
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'delete_game.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Refresh the game list after the game record has been deleted
                getGames();
                
            }
        };
        xhr.send('id=' + encodeURIComponent(id));
    }
</script>
</body>
</html>
