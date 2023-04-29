<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="styles\nav.css">
    <link rel="stylesheet" href="styles\locations.css">
</head>
<body style = "color = black;">
<section class="vh-100" class="bg-image" style="background-image: url('images/background.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <header style = "background-color: black">
        <div class="container" style="height: 7vh; ">
            <nav>
                <h1 class="brand"><a href="locations.php">Hox<span>3</span>n Gaming</a></h1>
                <ul>
                    <li> <a href="signup.php">Sign UP</a></li>
                    <li> <a href="login.php">Log In</a></li>
                    <li> <a href="about.php">About</a></li>
                    <li> <a href="locations.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <div class="right">

            <h1>Our Locations</h1>

            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d20067.921689019346!2d23.722242962010924!3d37.987248886687134!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sgr!4v1670778408974!5m2!1sen!2sgr"
                 width="400" height="680"  allowfullscreen="" loading="" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="left">

            <h2> We Encourage you to find us</h2>

            <div class="text" style = "color: black; font-weight:bold; font-size: 16px; background-color: rgba(250, 225, 200, 0.65); ">
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cupiditate dicta
                    voluptate assumenda non earum repellat nam quasi,
                    amet eaque itaque quo iure. Magnam dolorum, aliquid quibusdam
                    deserunea voluptates possimus?
                   
                </p>

                <hr>

                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                     Perspiciatis, molestiae odit quaerat aperiam libero id 
                     deserunt quia quo corrupti nam facilis cumque voluptatem quisquam 
                     veritatis perferendis suscipit quae, deleniti sed?
                     Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                     
                </p>
            </div>

            <div class="contacts">
                <div class="contactCard">
                    <i class="iconCard fas fa-envelope"></i>
                    <p><a href=""></a>20200039@student.act.edu</p>
                </div>
    
                <div class="contactCard">
                    <i class="iconCard fas fa-phone"></i>
                    <p> +699999999</p>
                </div>
    
                <div class="contactCard">
                    <i class="iconCard fas fa-truck"></i>
                    <p>Thessaloniki, Greece</p>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <h6> @2022 CS206, Final Course Project, Made by: Enklid Hoxha</h6>
    </footer>
</section>
</body>
</html>