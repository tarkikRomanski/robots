$('#exploreSite').click(function () {
    $('#result').html("Loading...");
    $.get(
        'model.php',
        {
            url: $('#search-url').val()
        },
        function(data){
            $('#result').html(data);
        }
    );
})
