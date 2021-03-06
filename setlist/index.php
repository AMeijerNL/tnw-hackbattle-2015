<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body>

        <div class="wrap">
            <header>
                <div class="header">
                    <h1 class="header__title">Deelist</h1>
                </div>
            </header>

            <section class="content">
                
                <form class="search js-search" action="setlist.php" method="POST" >
                    <label class="search__label" for="search">Create playlists from concert sets</label>
                    <div class="search__wrap">
                        <input id="search" class="search__input" name="search" type="search" placeholder="Search for an artist..." />
                        <input id="submit" class="search__submit fa-search" type="submit" value="" />
                        <label for="submit" class="search__icon fa fa-search"></i>
                    </div>
                </form>

            </section>
        </div>

        <section id="results" class="results"></section>

        <section class="popular">
            <h1 class="popular__title">Popular playlists this week</h1>
            <h2 class="popular__subtitle">Searched by music lovers just like you</h2>
            <ul class="popular__list">
                <li class="popular__item">
                    <img class="popular__item__img" src="assets/img/maroon5.png" alt="">
                    <div class="popular__item__caption">
                        <span class="popular__item__title">Maroon 5</span>
                        <span class="popular__item__subtitle">European Tour, Amsterdam</span>
                    </div>
                </li>
                <li class="popular__item">
                    <img class="popular__item__img" src="assets/img/hardwell.png" alt="">
                    <div class="popular__item__caption">
                        <span class="popular__item__title">Hardwell</span>
                        <span class="popular__item__subtitle">Ultra Music Festival, Miami</span>
                    </div>
                </li>
                <li class="popular__item">
                    <img class="popular__item__img" src="assets/img/rihanna.png" alt="">
                    <div class="popular__item__caption">
                        <span class="popular__item__title">Rihanna</span>
                        <span class="popular__item__subtitle">Splendid Tour, Chicago</span>
                    </div>
                </li>
            </ul>
        </section>

        <section >
            <div class="result result--single">
                <div class="result__wrapper">
                    <img src="assets/img/bieber1.png" class="result__img" alt="">
                    <div class="result__wrap">
                        <h2 class="result__title">Justin Bieber, Perth, Believe Tour</h2>
                        <div class="results__meta">
                            <span class="results__meta__item">
                                <i class="fa fa-user"></i>
                                Justin Bieber
                            </span>
                            <span class="results__meta__item">
                                <i class="fa fa-calendar"></i>
                                Apr 1, 2015
                            </span>
                            <span class="results__meta__item">
                                <i class="fa fa-music"></i>
                                Believe Tour
                            </span>
                            <span class="results__meta__item">
                                <i class="fa fa-map-marker"></i>
                                Toronto, Canada
                            </span>
                        </div>
                        <p class="result__description">
                            Tracklist: content here...
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="setlist">
                    <div class="setlist__item--head">
                        <span class="setlist__item__index">#</span>
                        <span class="setlist__item__title">Song title</span>
                    </div>
                    <ol class="setlist__list">
                        <li class="setlist__item">
                            <span class="setlist__item__title">
                                All around the world
                                <i class="setlist__item__artist">Mr. Blake</i>
                            </span>
                            <div class="setlist__item__suggestion suggestion">
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
                            </div>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">Take you</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">Catching feelings</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">One Time / Eenie Meenie / Somebody to love</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">Take you</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">Catching feelings</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">One Time / Eenie Meenie / Somebody to love</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">One Time / Eenie Meenie / Somebody to love</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">Take you</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">Catching feelings</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">One Time / Eenie Meenie / Somebody to love</span>
                        </li>
                        <li class="setlist__item">
                            <span class="setlist__item__title">One Time / Eenie Meenie / Somebody to love</span>
                        </li>
                    </ol>
                </div>
            </div>

        </section>

        <div class="deezer">
            <button class="deezer__btn">Create Deezer Playlist</button>
        </div>  

        <footer class="footer">
            Carefully crafted by Jenny, Sil and Alex
        </footer>


        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
    </body>
</html>
