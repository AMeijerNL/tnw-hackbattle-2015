<?php
include_once "head.php";
include_once "header.php";
?>

<section id="set">
<?php

    if ( isset($_GET['id']) ) {

        $id = $_GET['id'];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.setlist.fm/rest/0.1/setlist/'. $id .'.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        $respBody = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $body = substr($respBody, $headerSize);

        $data = json_decode($body, true);
        $setlist = $data['setlist'];

        $artist_raw = $setlist['artist']['@name'];

        switch (strtolower($artist_raw)) {
            case 'justin bieber':
                $img = 'assets/img/bieber1.png';
                break;
            case 'hardwell':
                $img = 'assets/img/hardwell1.png';
                break;
            
            default:
                $img = 'assets/img/placeholder.png';
                break;
        }


        ?>  
            <div class="result result--single">
                <div class="result__wrapper">
                    <img src="<?= $img ?>" class="result__img" alt="<?= $setlist['artist']['@name'] ?>">
                    <div class="result__wrap">
                        <h2 class="result__title"><?= $setlist['artist']['@name'] ?>, <?= $setlist['venue']['@name'] ?><?php if( isset($setlist['@tour'])) { echo ', '.$setlist['@tour']; } ?></h2>
                        <div class="results__meta">
                            <span class="results__meta__item">
                                <i class="fa fa-user"></i>
                                <?= $setlist['artist']['@name'] ?>
                            </span>
                            <span class="results__meta__item">
                                <i class="fa fa-calendar"></i>
                                <?= $setlist['@eventDate'] ?>
                            </span>
                            <?php if( isset($setlist['@tour'])) { ?>
                                <span class="results__meta__item">
                                    <i class="fa fa-music"></i>
                                    <?= $setlist['@tour'] ?>
                                </span>
                            <?php } ?>
                            <span class="results__meta__item">
                                <i class="fa fa-map-marker"></i>
                                <?= $setlist['venue']['city']['country']['@name'] ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="setlist">
                    <div class="setlist__item--head">
                        <span class="setlist__item__index">#</span>
                        <span class="setlist__item__title">Song title</span>
                    </div>
                    <ol class="setlist__list js-setlist" data-artist="<?= $setlist['artist']['@name'] ?>">
        <?php

        $i = 0;

        switch (strtolower($artist_raw)) {
            case 'justin bieber':
                $img = 'assets/img/bieber1.png';
                break;
            case 'hardwell':
                $img = 'assets/img/hardwell1.png';
                break;
            
            default:
                $img = 'assets/img/placeholder.png';
                break;
        }

        foreach( $data['setlist']['sets']['set']['song'] as $song ) {

            ?>
                
                <li class="setlist__item" data-title="<?= $song['@name'] ?>">
                    <span class="setlist__item__title">
                        <?= $song['@name'] ?>
                        <!-- <i class="setlist__item__artist">Mr. Blake</i> -->
                    </span>
<!--                     <div class="setlist__item__suggestion suggestion">
                        <div class="suggestion__wrap">
                            <p class="suggestion__text">We couldn't find a song with this title, but we found some matches from these artists:</p>
                            <ul class="suggestion__list">
                                <li class="suggestion__list__item suggestion__list__item--selected">Mr. Blake</li>
                                <li class="suggestion__list__item">Frank Sinatra</li>
                                <li class="suggestion__list__item">Martin Dean</li>
                                <li class="suggestion__list__item">Drake</li>
                                <li class="suggestion__list__item">Daft Punk</li>
                            </ul>
                        </div>
                    </div> -->
                </li>


            <?php
        }

        ?>
                    </ol>
                </div>
            </div>
        <?php 
        
    }else {
        ?>
            <div class="row">
                <h1>No setlist found...</h1>
            </div>
        <?php
    }
?>

</section>



<div class="deezer">
    <button class="deezer__btn">Create Deezer Playlist</button>
</div>  

<?php
include_once "footer.php";
?>