$(document).ready(function(){
    $('#form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'insert_game.php',
            data: {
                "add_game": "hghjk",
                "name": $("#name").val(),
                "price": $("#price").val(),
                "rating": $("#rating").val(),
                "description": $("#description").val()
            },
            success: (response)=>{
                console.log($('#form').serialize())
                // handle success response
                alert(response);
            },
            error: function(){
                // handle error
                alert('Error submitting form');
            }
        });

        getGames();


        $("#name").val('');
        $("#price").val('');
        $("#rating").val('');
        $("#description").val('');


    });
});