<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/nav.css">
    <link rel="stylesheet" href="styles/about.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="overflow-y: hidden;">

<section class="vh-100" class="bg-image" style="background-image: url('images/background.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <header>
        <div class="container" style="height: 7vh;">
            <nav>
                <h1 class="brand"><a href="about.php">Hox<span>3</span>n Gaming</a></h1>
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
        <div class="about">
            <div class="imageHolder">
                <img src="images/me.png" alt="" id = "myImage">
            </div>
            <div class="textHolder">
                <h1>About Me</h1>

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                     Sunt ad tempore voluptatem cupiditate non. Dignissimos 
                     veritatis a soluta veniam molestiae nulla fugit numquam animi consectetur.
                      Beatae cum in fuga veritatis?
                      Lorem ipsum dolor sit amet consectetur adipisicing elit.
                      Sunt ad tempore voluptatem cupiditate non. Dignissimos 
                      veritatis a soluta veniam molestiae nulla fugit numquam animi consectetur.
                       Beatae cum in fuga veritatis?
                </p>

                <!-- Add a button to toggle the text -->
                <h6 id = "toggle-text">Toggle Text<h6> 
            </div>
        </div>
    </main>

    <!-- Add a jQuery script to handle the button click event and add a fade effect -->
    <script>
        $(document).ready(function() {
            // Toggle the text when the button is clicked
                $('#toggle-text').click(function() {
                    $('.textHolder p').fadeToggle();
                });


            $("nav ul li a").hover(
                function () {
                    $(this).css("color", "violet");
                    $(this).css("border-radius", "20px");
                },
                function () {
                    $(this).css("background-color", "transparent");
                }
            );

            $("#myImage").mouseenter(function() {
                $(this).animate({rotate: "+45deg"});
            });

            $("#myImage").mouseleave(function() {
                $(this).animate({rotate: "-45deg"});
                $(this).animate({rotate: "0deg"});
            });


            $("#myImage").click(function(){
                $("#myImage").animate({height: "100px"});
                $(this).animate({rotate: "-360deg"});
                $("#myImage").animate({height: "200px"});
                $(this).animate({rotate: "+360deg"});
                $("#myImage").animate({height: "300px"});
                $(this).animate({rotate: "-360deg"});
                $("#myImage").animate({height: "400px"});
             });
             







        });

    </script>

</section>
</body>
</html>
