$(function() {

    init();

    function init(){
      var $form = $(".js-search"); 

      if(  $('#search').val().length != 0  ){
        search($form);
      }

      $(".js-search").on( "submit", function( ev ) {
        ev.preventDefault();
        search($form);

      });
    };

    function search($form){
        $('#results').html('<div class="spinner"><img src="assets/img/spinner.gif"></div>');

        var formData = {
            'search': $('#search').val()
        };

        $.ajax({
          type: "POST",
          url: $form.attr('action'),
          data: formData,
          success: function(data){
            console.log(data);
            $('#results').html(data);
          }
        });
    }

    console.log( "ready!" );
});