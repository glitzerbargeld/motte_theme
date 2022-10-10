<?php
get_header();
?>


<section>
    <div id="bm-hero" style="display: flex; justifty-content: center; align-items: center;">
        <div class="bm-flex-col">
            <img class="headline-image" src="<?php echo get_stylesheet_directory_uri() ?>/src/media/alles_tut_so_weh_schatten.png" width="200" alt="">
            <div class="logos" style="padding: 10px; width: 100%; text-align: center">
                <a target="_blank" and rel="noopener noreferrer" href="https://bahnhofmotte.bandcamp.com/album/du-kannst-eh-nix-cooles-denken-wenn-du-so-viel-zeit-hast"><img src="<?php echo get_stylesheet_directory_uri() ?>/src/media/bandcamp_gold_schatten.png" width=100px style="margin: 10px; display: inline-block" /></a>
                <a target="_blank" and rel="noopener noreferrer" href="https://open.spotify.com/album/58TZcyAulxN5YPvvnVEFuy?si=pxBpyXOtR2OojuVpTwcQiQ"><img src="<?php echo get_stylesheet_directory_uri() ?>/src/media/spotify_gold_schatten.png" width=100px style="margin: 10px; display: inline-block" /></a>
            </div>
        </div>
        <div class="bm-flex-col"></div>
    </div>
</section>

<section class="section-2" id="videos">
    <div class="video-wrapper">
    <div class="yt-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/H6AJ11RkeCE?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    </div>
    <div class="video-wrapper">
    <div class="yt-video">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/Plgat6KSYzY?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    </div>
</section>
<section class="section-3" id="tourdates">
    <h1>TOURDATES</h1>

    <div class="row">

        <?php

        //CHECK YEARS AVAILABLE
        //LOOP THROUGH ALL EVENTS
        $konzert_query = new WP_Query(array(
            'post_type' => 'konzert',
            'meta_key' => 'date_of_concert',
            'orderby' => 'meta_value_num',
            'order' => 'DESC',
        ));
        //GET YEARS
        //PRINT YEARS AS HEADING;

        //CREATE ENTRIES FOR YEARS
        $concerts = array();
        if ($konzert_query->have_posts()) : while ($konzert_query->have_posts()) : $konzert_query->the_post();

                $the_date = get_field('date_of_concert');
                $dateTime = DateTime::createFromFormat("Ymd", $the_date);
                if (is_object($dateTime)) {
                    $day_month = $dateTime->format('d.m');
                    $the_year = $dateTime->format('Y');
                    //...
                }


                if (empty($concerts[$the_year])) {
                    $concerts[$the_year] =
                        array(
                            array(
                                "date_of_concert" => $day_month,
                                "city" => get_field('city'),
                                "venue" => get_the_title(),
                                "cancelled" => get_field("cancelled"),
                                "add_info" => get_field("additional_information")
                            )
                        );
                } else {
                    $concerts[$the_year][] =  array(
                        "datum" => $day_month,
                        "city" => get_field('city'),
                        "venue" => get_the_title(),
                        "cancelled" => get_field("cancelled"),
                        "add_info" => get_field("additional_information")
                    );
                }

            endwhile;
        endif;
        ?>


        <?php

        foreach ($concerts as $key_year => $year) {
            if ($key_year > date("Y") - 3) { ?>
                <div class="column">
                    <h2><?php echo $key_year; ?></h2>
                    <ul><?php
                        foreach ($year as $key_konzert => $konzert) {
                            echo '<li';
                            if ($konzert["cancelled"]) {
                                echo ' class="cancelled"';
                            }
                            echo '>';
                            echo $konzert["date_of_concert"] . ' ' .  $konzert["city"] . ', ' . $konzert["venue"];
                            if (!empty($konzert["add_info"])) {
                                echo ' / ' . $konzert["add_info"];
                            }
                            echo '</li>';
                        } ?>
                    </ul>
                </div>
        <?php
            }
        }
        ?>



        <div class="column">
            <h2>2021</h2>
            <ul>
                <li>12.06. Dresden Open Air, Kultursommer 2021</li>
                <li>27.08. Dresden, Puschkin</li>
                <li>23.09. Dresden, Ostpol</li>
                <li>29.09. Hildesheim, Club Veb</li>
                <li>30.09. Hannover, Burg / mit Das Günther</li>
                <li>01.10. Dresden, Objekt klein a / mit Das Günther</li>
                <li>02.10. Leipzig, TxPx / mit Das Günther</li>
                <li>07.10. Halle, Algenberg / mit Ariel my Friend</li>
                <li>08.10. Chemnitz, Lokomov / mit Automatik Amore</li>
                <li>20.11. Berlin, Geheimkonzert / mit Panoramakäfig</li>
            </ul>

        </div>

        <div class="column">
            <h2>2020</h2>
            <ul>
                <li>06.03 - KvU - Berlin </li>
                <li class="cancelled">21.02 - Ostpol - Dresden</li>
                <li class="cancelled">27.03 - Café Wagner - Jena</li>
                <li class="cancelled">28.03 - Reil78 - Halle</li>
                <li class="cancelled">08.05 - Lokomov - Chemnitz</li>
                <li class="cancelled">09.05 - Frau Korte - Erfurt</li>
                <li class="cancelled">13.05 - Club VEB - Hildesheim</li>
                <li class="cancelled">14.05 - tba. - Hannover</li>
                <li class="cancelled">15.05 - Blauer Manfred - Bremen</li>
                <li class="cancelled">16.05 - Schute - Hamburg</li>
                <li class="cancelled">20.05 - Haus Meinusch - Mainz</li>
                <li class="cancelled">21.05 - Groovestation - Dresden</li>
                <li class="cancelled">22.05 - Zeitraum - Festival</li>
                <li class="cancelled">23.05 - Chemiefabrik - Dresden</li>
                <li class="cancelled">06.06 - St. Pieschen - Dresden</li>
                <li class="cancelled">25.06 - Fusion - Festival</li>
                <li>15.08 - Privat</li>
                <li>12.09 - Rösselstube - Dresden</li>
                <li>24.09 - Neues Schauspiel - Leipzig</li>
                <li>17.10 - Veränderbar - Dresden</li>
            </ul>
        </div>
        <div class="column">
            <h2>2019</h2>

            <ul>

                <li>28.06 - Rösselstube - Dresden </li>
                <li>12.07 - HfBK - Dresden</li>
                <li>24.08 - Hechtfest - Dresden</li>
                <li>31.08 - Molmersturn - Festival</li>
                <li>12.09 - DHAS Fezzt - Festival</li>
                <li>04.10 - DHF - Leipzig</li>
                <li>12.10 - Gieszerstraße - Leipzig</li>
                <li>19.10 - AZ Conni - Dresden</li>
                <li>02.11 - Café Taktlos - Glauchau </li>
                <li>05.11 - Ostpol - Dresden</li>
                <li>23.11 - AJZ - Neubrandenburg</li>
                <li>26.11 - WunderBar - Weimar</li>
                <li>27.11 - Kassablanca - Jena</li>
                <li>29.11 - Sandershaus - Kassel</li>
                <li>06.12 - Tjpj - Leipzig</li>
            </ul>
        </div>
    </div>
</section>

<section class="section-4" id="contact">
    <h1>CONTACT</h1>
    <div class="email-container">
        <ul>
            <li><a href="mailto:info@bahnhofmotte.de">info@bahnhofmotte.de</a></li>
            <li><a href="mailto:booking@bahnhofmotte.de">booking@bahnhofmotte.de</a>
    </div>
    </li>
    </ul>
</section>





<?php
get_footer();
?>