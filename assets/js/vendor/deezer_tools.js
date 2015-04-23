var userToken;
var userID;

function login() {
    DZ.login(function (response) {
        if (response.authResponse) {
            //console.log('Welcome!  Fetching your information.... ');
            DZ.api('/user/me', function (response) {
                console.log('Good to see you, ' + response.name + '.');
                userID = response.id;
            });
            userToken = response.authResponse.accessToken;
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    }, { perms: 'email, manage_library' });
};

//SEARCH
function search(term){
    DZ.api('/search?q=' + term, function(response){
        console.log(response.data);
    });
}

//EDITORIAL
function getEditoSelection(genreId){
    DZ.api('/editorial/' + genreId + '/selection', function(response){
        console.log(response);

        //plays the first album of the retrieved selection
        DZ.player.playAlbum(response.data[0].id);
    });
}

//ALBUMS
function getAlbumInfo(albumId){
    DZ.api('/album/' + albumId, function(response){
        console.log(response);
    });
}

function getAlbumCover(albumId) {
    DZ.api('/album/' + albumId, function (response) {
        console.log(response);
        var bckgd = response.cover + '&size=small';
        $('#preview').attr('src', bckgd);
    });
}

function createPlaylist(title, playlist) {
    //add an album to my favorites
    DZ.api('/user/me/playlists', 'POST',
        {
            title : title,
            access_token: userToken
        }, 
        function (response) {
            playlistId = response.id;
            tracks = playlist.join();

            DZ.api('playlist/'+playlistId+'/tracks', 'POST',
                {
                    songs : tracks,
                    access_token: userToken
                }, 
                function (response) {

                    window.location = 'http://deezer.com/playlist/'+playlistId;
                    console.log(response);
                }
            );

        }
    );
}

function favoriteAlbum(albumId) {
    //add an album to my favorites
    DZ.api('/user/me/albums', 'POST',
        {
            album_id : albumId, 
            access_token: userToken}, 
            function (response) {
        console.log(response);
    });
}

function isLoggedIn(){
    DZ.getLoginStatus(function(response) {
        if (response.authResponse) {
            console.log(true);
        } else {
            console.log(false);
        }
    });
}

