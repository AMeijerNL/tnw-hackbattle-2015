<?php

    if ( isset($_POST['search']) ) {

        $artist_raw = $_POST['search'];
        $artist = urlencode($artist_raw);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://api.setlist.fm/rest/0.1/search/setlists.json?artistName='.$artist);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);

        $respBody = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $body = substr($respBody, $headerSize);

        $data = json_decode($body, true);

        ?>  
            <div class="results__titlewrap">
                <h1 class="results__title">Search results for '<?= $artist_raw ?>'</h1>
                <a href="#search" class="results__search">Search again</a>    
            </div>
            <ul class="results__list">
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

        foreach( $data['setlists']['setlist'] as $setlist ) {

            $hasTracklist = isset($setlist['sets']['set']['song']);

            ?>

                <li class="result">
                    <a class="results__link <?php if(!$hasTracklist){ echo 'results__link--nolink'; } ?>" href="set.php?id=<?= $setlist['@id'] ?>#set">
                        <img src="<?= $img ?>" class="result__img" alt="<?= $setlist['artist']['@name'] ?>">
                        <div class="result__wrap">
                            <h2 class="result__title"><?= $setlist['artist']['@name'] ?>, <?= $setlist['venue']['@name'] ?>, <?php if( isset($setlist['@tour'])) { echo $setlist['@tour']; } ?></h2>
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
                            <p class="result__description">
                                Tracklist:
                                <?php 
                                    if( $hasTracklist ){
                                        $j = 0;
                                        foreach ($setlist['sets']['set']['song'] as $song) {
                                            if($j > 2){
                                                echo " and more...";    
                                                break;
                                            }else {
                                                if(isset($song['@name'])){
                                                    echo $song['@name']. ', ';    
                                                }else {
                                                    echo 'Song, ';
                                                }
                                                
                                            }
                                            $j++;
                                        }
                                    }else {
                                        echo "- no tracklist available -";
                                    }
                                ?>
                            </p>
                        </div>
                    </a>
                </li>


            <?php
        }

        ?>
            </ul>
        <?php 
        
    }else {
        throw new Exception('No search value.');
    }
?>