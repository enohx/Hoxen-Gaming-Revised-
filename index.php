<?php
    session_start();
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
    <script src = "scripts/index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.0/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="styles\nav.css">
    <style>

        #main{
            overflow-y: scroll;
        }

        #main::-webkit-scrollbar {
            display: none;
        }

        .card{
            height: 60vh;
            border: 1px solid black;
            border-radius: 10px;
            box-shadow: 0 1px 2px 0 rgba(0,0,0,0.14), 0 1px 3px 0 rgba(0,0,0,0.12), 0 2px 1px -1px rgba(0,0,0,0.2);
            padding: 1vh;
            background-color:#ddd;
            font-family: 'Times New Roman', serif;
        }

        .card .name{
            font-weight: bold;
        }

        .card .description {
        height: 50px;
        width: 100px;
        overflow-y: scroll;
        text-overflow: ellipsis;
        
        }



        .card .description::-webkit-scrollbar {
            display: none;
        }

        .card .btn{
            background-color: crimson;
            width:90%;
        }

        #loadedGames{
            display:flex;
            justify-content: center;
            align-items: end;
        }

        .Gamecard{
            width: 20vh;
            height = 8vh;
            background-color: crimson;
            color: black;
            border: 3px solid balck;
            border-radius: 20px;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.28), 0 1px 3px 0 rgba(0,0,0,0.24), 0 2px 1px -1px rgba(0,0,0,0.4);
            text-align: center;
            margin-top: 2vh;


        }


    </style>
</head>
<body style = "overflow-y: hidden;">

<header>
    <div class="container">
        <nav>
            <h1 class="brand"><a href="home.php">Hox<span>3</span>n Gaming</a></h1>
            
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
<div class="container">
    <div id = "header" style = "display: flex; justify-content: space-between; padding-top: 0.5vh; max-height: 10vh">
        <h1 style = "width: 20vh; border: 2px solid crimson; border-radius: 20px; padding: 0.4vh; font-size: 30px; justify-content: center; text-align: center; display:flex;" id = "C_user">
            <?php echo $_SESSION['CurrentUser'];?>
        </h1>

        <form class="d-flex">
            <input id="search-input" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" 
                                     style = " border: 3px solid black; border-radius: 20px; font-weight: bold;; ">
            <button class="btn btn-outline-success" type="submit" style = "display: none;">Search</button>
        </form>
    </div>

    <div id = "userview" style  = "display:  flex; justify-content: space-between; padding: 1vh;">
        <div id="main" class="row"></div>

        <div id = "sidecontrol" style = "width: 17%; border-radius: 40px; display: flex; flex-direction: column; padding: 2vh; z-index:1;" >
            <button class="btn btn-outline-success" type="submit" style = " border: 3px solid green; font-weight: bold; border-radius: 10px; margin-bottom: 1vh; color: black;" id = "sortBtn">Sort</button>
                <button class="btn btn-outline-success" type="submit" style = " border: 3px solid green; font-weight: bold;border-radius: 10px; margin-bottom: 1vh; color: black;" id = "sortName">Name</button>
                <button class="btn btn-outline-success" type="submit" style = " border: 3px solid green; font-weight: bold;border-radius: 10px; margin-bottom: 1vh; color: black;" id = "sortPrice">Price</button>
                <button class="btn btn-outline-success" type="submit" style = " border: 3px solid green; font-weight: bold;border-radius: 10px; margin-bottom: 1vh; color: black;" id = "sortrRating">Rating</button> 
                
            <!-- <button class="btn btn-outline-success" type="submit" style = " border: 3px solid green; font-weight: bold; border-radius: 10px; margin-bottom: 1vh; color: black;" id = "deals">Deals</button>
            <button class="btn btn-outline-success" type="submit" style = " border: 3px solid green; font-weight: bold; border-radius: 10px; margin-bottom: 1vh; color: black;" id = "All_deals">No Deals :/</button>  -->


            <div id  = "loadedGames" style = "display: flex; flex-direction: column;">

            </div>


            
        </div>       

    </div>
</div>
</section>

<script>

</script>

<script>

</script>

</body>
</html>

