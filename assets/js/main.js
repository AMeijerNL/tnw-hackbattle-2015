var playlist = [],
    artist = '',
    venue = '',
    date = '';

$(function() {

    init();
    deezer();

    function init(){
      var $form = $(".js-search"); 

      if(  $('#search').val().length != 0  ){
        search($form);
      }

      $(".js-search").on( "submit", function( ev ) {
        ev.preventDefault();
        searchSetlist($form);

      });

      $(".js-albumplay").on("click", function(){
        playAlbum( $(this).data('albumid') );
      });

      checkSetlist();
      bindPlay();
    };

    function bindPlay(){
      $('body').on('click', '.js-play', function(){
        console.log('test');
        id = $(this).data('track');
        var tracks = [id];
        DZ.player.playTracks(tracks, true);
      })
    }

    function checkSetlist(){
      if( $('#set').length > 0 ){
        artist = $('.js-setlist').data('artist');
        venue = $('.js-setlist').data('venue');
        date = $('.js-setlist').data('date');

        $('.js-setlist li').each( function(){
          var $self = $(this);
          var title = $(this).data('title');
          DZ.api('/search?q=' + artist + ' ' + title, function(response){
              if( response.data[0] !== undefined ){
                insertDeezerTrack(response.data[0], $self);
              }
          });
        })
      }

      bindPlaylistCreation();
    };

    function insertDeezerTrack(deezerObj, $context){
      $context.append('<span class="setlist__item__preview js-play" data-track="'+deezerObj['id']+'">preview</span>');
      playlist.push(deezerObj['id']);
    };

    function loginAndCreate(){
      DZ.login(function (response) {
          if (response.authResponse) {
              //console.log('Welcome!  Fetching your information.... ');
              DZ.api('/user/me', function (response) {
                  //console.log('Good to see you, ' + response.name + '.');
                  userID = response.id;

                  var playlistName = artist + ' @ ' + venue + ' on ' + date;
                  createPlaylist(playlistName, playlist);
              });
              userToken = response.authResponse.accessToken;
          } else {
              //console.log('User cancelled login or did not fully authorize.');
          }
      }, { perms: 'email, manage_library' });
    }

    function searchSetlist($form){
        $('#results').html('<div class="spinner"><img src="assets/img/spinner.gif"></div>');

        var formData = {
            'search': $('#search').val()
        };

        $.ajax({
          type: "POST",
          url: $form.attr('action'),
          data: formData,
          success: function(data){
            //console.log(data);
            $('#results').html(data);
          }
        });
    };

    function deezer(){
        DZ.init({
            appId: '156061',
            channelUrl: 'http://tnw.ameijer.nl/channel.html',
            player: {
                onload: function () { 
                    DZ.player.playAlbum(2962681, false);
                }
            }
        });
    };

    function playAlbum(id){
        DZ.getLoginStatus(function(response) {
            if (response.authResponse) {
                DZ.player.playAlbum(id, true);
                DZ.player.play();
            } else {
                login();
            }
        });
    };

    // hardwell 8856973
    // maroon5 8470649
    // rihanna 10017266
});