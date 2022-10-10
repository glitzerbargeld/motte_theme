<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php

    wp_head();
    ?>
</head>

<body>
        <div id="overlay"></div>
        <header>
            <div id="nav" class="navbar-wrapper">
                <div class="icon-bar">
                    <a href="https://www.facebook.com/bahnhofmotte/" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/bahnhofmotte/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCcJPW26R-OmQ-5xbIECt_gQ" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                    <a href="https://bahnhofmotte.bandcamp.com/releases" class="bandcamp" target="_blank"><i class="fa fa-bandcamp"></i></a>
                </div>


                <!--img class="band-logo" src="<?php echo get_stylesheet_directory_uri() ?>/src/media/BahnhofMotteLogokleinnegativ.png" style="display: flex;" alt="Bahnhof Motte Band" /-->
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo = wp_get_attachment_image_src($custom_logo_id, 'full');

                if (has_custom_logo()) {
                    echo '<img class="band-logo" src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '">';
                } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                } ?>

                <div class="menu">
                    <div class="menu-line menu-line-1"></div>
                    <div class="menu-line menu-line-2"></div>
                    <div class="menu-line menu-line-3"></div>
                </div>
            </div>
            <nav class="navbar">
                <div class="nav-list">
                    <a class="nav-point" href="#videos">Recent Videos</a>
                    <a class="nav-point" href="#tourdates">Tourdates</a>
                    <a class="nav-point" href="#contact">Contact</a>

                </div>
            </nav>
        </header>
    </div>