

function getGames() {
fetch('game_list.php')
    .then(response => response.json())
    .then(games => {
        let cardViews = '';

        // Filter the games based on the search input
        const filterGames = () => {
        const searchInput = document.getElementById('search-input1').value.toLowerCase();
        return games.filter(game => game.name.toLowerCase().includes(searchInput));
        }

        // Render the card views for the filtered games
        const renderCardViews = () => {
        const filteredGames = filterGames();
        cardViews = '';
        var a = 0;
        for (let i = 0; i < filteredGames.length; i++) {
            cardViews += '<div class="card">';
            cardViews += '<img src="images/catalog/gameImage' + (a+1) + '.jpg" class="card-img-top" alt="Game Image">';
            cardViews += '<div class="card-body">';
            cardViews += '<h5 class="card-title">' + filteredGames[i].name + '</h5>';
            cardViews += '<p class="card-text">' + filteredGames[i].description + '</p>';
            cardViews += '<ul class="list-group list-group-flush">';
            cardViews += '<li class="list-group-item"><strong>Price:</strong> ' + filteredGames[i].price + '</li>';
            cardViews += '<li class="list-group-item"><strong>Rating:</strong> ' + filteredGames[i].rating + '</li>';
            cardViews += '</ul>';
            cardViews += '<form><button type="button" onclick="deleteGame(' + filteredGames[i].id + ')">Delete</button></form>';
            cardViews += '</div>';
            cardViews += '</div>';

            a = a + 1;

            console.log(filteredGames[i].id)
            console.log(filteredGames[i].id)


            if(a == 4){
                a = 0;
            };
        }
        document.getElementById('game_list').innerHTML = cardViews;
        }

        // Render the initial card views
        renderCardViews();

        // Add an event listener to the search button
        document.getElementById('search-button1').addEventListener('click', event => {
        event.preventDefault();
        renderCardViews();
        });

        // Add an event listener to the search input to update the results as the user types
        document.getElementById('search-input1').addEventListener('input', event => {
        event.preventDefault();
        renderCardViews();
        });
  });
};