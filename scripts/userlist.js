
  fetch('user_list.php')
    .then(response => response.json())
    .then(users => {
      let cardViews = '';

      // Filter the users based on the search input
      const filterUsers = () => {
        const searchInput = document.getElementById('search-input').value.toLowerCase();
        return users.filter(user => user.username.toLowerCase().includes(searchInput));
      }

      // Render the card views for the filtered users
      const renderCardViews = () => {
        const filteredUsers = filterUsers();
        cardViews = '';
        for (let i = 0; i < filteredUsers.length; i++) {
          cardViews += '<div class="card">';
          cardViews += '<div class="card-header">' + filteredUsers[i].name + ' ' + filteredUsers[i].lastname + '</div>';
          cardViews += '<div class="card-body">';
          cardViews += '<p><strong>Username:</strong> ' + filteredUsers[i].username + '</p>';
          cardViews += '<p><strong>Password:</strong> ' + filteredUsers[i].password + '</p>';
          cardViews += '<form method="POST"><button type="submit" name="delete_user" value="' + filteredUsers[i].id + '">Delete</button></form>';
          cardViews += '</div>';
          cardViews += '</div>';
        }
        document.getElementById('user_list').innerHTML = cardViews;
      }

      // Render the initial card views
      renderCardViews();

      // Add an event listener to the search button
      document.getElementById('search-button').addEventListener('click', event => {
        event.preventDefault();
        renderCardViews();
      });

      // Add an event listener to the search input to update the results as the user types
      document.getElementById('search-input').addEventListener('input', event => {
        event.preventDefault();
        renderCardViews();
      });
    });
