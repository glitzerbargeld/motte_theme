<?php

wp_head();
?>

<body>
<div class="video-container">
      <video id="BgVideo" muted loop autoplay playsinline width="1280" height="720">
        <source src="<?php echo get_theme_file_uri() . "/src/media/background.mp4" ?>" type="video/mp4">
      </video>
    </div>
    <div class="container">
        <div id="overlay"></div>
        <header>
            <div id="nav" class="navbar-wrapper">
                <div class="icon-bar">
                    <a href="https://www.facebook.com/bahnhofmotte/" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                    <a href="https://www.instagram.com/bahnhofmotte/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                    <a href="https://www.youtube.com/channel/UCcJPW26R-OmQ-5xbIECt_gQ" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                    <a href="https://bahnhofmotte.bandcamp.com/releases" class="bandcamp" target="_blank"><i class="fa fa-bandcamp"></i></a>
                </div>


                <img class="band-logo" src="src/media/BahnhofMotteLogokleinnegativ.png" style="display: flex;" alt="Bahnhof Motte Band" />


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