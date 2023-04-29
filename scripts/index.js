let gameName;
let currentUser;
let games;

function loadOwnedGames() {
  // Make an AJAX request to retrieve the list of games owned by the logged in user
  $.ajax({
    type: 'GET',
    url: './indexActions/ownedGames.php',
    success: function(data) {
      // Iterate over the list of games and create a game card for each one
      $.each(data, function(index, game) {
        var cardHtml = '<div class="Gamecard"><div class="Gamecard-body">' +
                       '<h5 class="Gamecard-title">' + game + '</h5>' +
                       '</div></div>';
        var $card = $(cardHtml);
        $card.click(function() {
          // Handle the click event for the game card
          $('<div>').html('Do you want to remove ' + game)
            .dialog({
              title: game,
              modal: true,
              buttons: {
                "Remove": function() {
                  $(this).dialog("close");
                  // Remove the game from the UI
                  $card.remove();
                  // Make an AJAX request to remove the game from the database
                  $.ajax({
                    type: 'POST',
                    url: './indexActions/removeGames.php',
                    data: {
                      game: game
                    },
                    success: function(data) {
                      console.log('Game removed from database: ' + game);
                    },
                    error: function(xhr, status, error) {
                      console.log('Error removing game from database: ' + error);
                      console.log(game);
                    }
                  });
                },
                "Cancel": function() {
                  $(this).dialog("close");
                }
              }
            });
        });
        $('#loadedGames').append($card);
      });
    },
    error: function(xhr, status, error) {
      console.log('Error retrieving owned games: ' + error);
    }
  });
};






$(document).ready(function() {
    
    loadOwnedGames();
    

    $.ajax({
        url: "get_session.php",
        type: "GET",
        success: function(data) {
            currentUser = data;
            console.log("Current user: " + currentUser);
            // Do something with the currentUser value here
        }
    });
    



    $.ajax({
        url: "get_games.php",
        type: "GET",
        success: function(data) {
            games = JSON.parse(data);
            for(let i = 0; i < games.length; i++) {
                let game = new Game(games[i].name, games[i].price, games[i].rating, games[i].description);
                let card = game.createCard();
                $("#main").append(card);
            }
        },
        error: function() {
            alert("Error getting games data");
        }
    });


    // Function to display cards for all games
    function displayCards(sortProperty) {
        // Clear the main div
        $("#main").empty();
    
        // Sort games by selected property
        games.sort(function(a, b) {
            if (a[sortProperty] < b[sortProperty]) {
                return -1;
            } else if (a[sortProperty] > b[sortProperty]) {
                return 1;
            } else {
                return 0;
            }
        });
    
        // Loop through games and create a card for each one
        for(let i = 0; i < games.length; i++) {
            let game = new Game(games[i].name, games[i].price, games[i].rating, games[i].description);
            let card = game.createCard();
            $("#main").append(card);
        }
    }
    

    // Event listener for sortName button
    $("#sortName").on("click", function() {
        displayCards("name");
    });

    // Event listener for sortPrice button
    $("#sortPrice").on("click", function() {
        displayCards("price");
    });

    // Event listener for sortRating button
    $("#sortrRating").on("click", function() {
        displayCards("rating");
    });



    $("#search-input").on("keyup", function() {
        let value = $(this).val().toLowerCase();
        $("#main .col-md-2").filter(function() {
            $(this).toggle($(this).find(".card-title").text().toLowerCase().indexOf(value) > -1)
        });
    });


    $("#sortName").hide();
    $("#sortPrice").hide();
    $("#sortrRating").hide();
 

    $('#sortBtn').on('click', function() {
        $('#sortName').slideToggle();
        $('#sortPrice').slideToggle();
        $('#sortrRating').slideToggle();
      });

    


});




class Game {
  constructor(name, price, rating, description) {
    this.name = name;
    this.price = price;
    this.rating = rating;
    this.description = description;
    this.image = "images/catalog/gameImage3.jpg";
  }



  createCard() {
    let card = $("<div>").addClass("col-md-3 mb-3");
  
    let cardContainer = $("<div>").addClass("card h-100");
    let cardImage = $("<img>").addClass("card-img-top").attr("src", this.image);
  
    let cardBody = $("<div>").addClass("card-body");
    let cardTitle = $("<h6>").addClass("card-title").text(this.name);
    let cardSubtitle = $("<h7>").addClass("card-subtitle mb-2 text-muted").text("$" + this.price);
    let cardDescription = $("<p>").addClass("card-text description").text(this.description);
    let cardRating = $("<small>").addClass("text-muted rating").html("<strong>Rating:</strong> " + this.rating);
    let addButton = $("<button>").addClass("btn btn-primary add-game-button").text("Add game");
        
    

  
    cardBody.append(cardTitle, cardSubtitle, cardDescription, cardRating, addButton);

    cardBody.on("click", ".add-game-button", function() {
        gameName = $(this).closest(".card-body").find(".card-title").text();

            $.ajax({
              url: "./indexActions/gameToUser.php",
              type: "POST",
              data: {
                gameName: gameName
                
              },
              success: function(response) {
                $('#loadedGames').empty();
                loadOwnedGames();
                console.log("Game added to user: " + currentUser);
              },
              error: function() {
                alert("Error adding game to user");
              }
            });
         
          


    });

    cardContainer.append(cardImage, cardBody);
    card.append(cardContainer);
  
    cardImage.on("click", function () {
      if (card.hasClass("active")) {
        card.removeClass("active");
        card.find(".description, .rating").slideUp();
      } else {
        $(".card.active").removeClass("active");
        $(".card .description, .card .rating").slideUp();
        card.addClass("active");
        card.find(".description, .rating").slideDown();
      }
    });
  
    return card;
  }
  


  matchesSearchTerm(searchTerm) {
    return this.name.toLowerCase().includes(searchTerm.toLowerCase());
  }
}