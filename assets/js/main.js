$(function() {

    init();

    function init(){

      $(".js-search").on( "submit", function( ev ) {
        ev.preventDefault();

        $('#results').html('<div class="spinner"><img src="assets/img/spinner.gif"></div>');

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