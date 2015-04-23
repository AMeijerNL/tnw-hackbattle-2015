$(function() {

    init();

    function init(){

      $(".js-search").on( "submit", function( ev ) {
        ev.preventDefault();

        var formData = {
            'search': $('#search').val()
        };

        $.ajax({
          type: "POST",
          url: $(this).attr('action'),
          data: formData,
          success: function(data){
            console.log(data);
            $('#results').html(data);
          }
        });


      });
    };

    console.log( "ready!" );
});