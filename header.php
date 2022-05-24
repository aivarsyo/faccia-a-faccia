<!DOCTYPE html>
<html lang="en">

<head>
    <?php wp_head(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:image" content="screenshot.png">
</head>

<body data-title="<?php the_title(); ?>" style="background-color:<?php the_field("background_color", "option")?>;">

    <header class="mobile_menu_visible_part">

        <a href="<?php echo home_url(); ?>">FACCIA Á FACCIA</a>

        <div class="burger_menu">

            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 22.4 12.7" style="enable-background:new 0 0 22.4 12.7;" xml:space="preserve">
                <style type="text/css">
                    .st0 {
                        fill: none;
                        stroke: #FFFFFF;
                        stroke-width: 1;
                        stroke-miterlimit: 10;
                    }
                </style>
                <line class="st0" x1="0" y1="0.4" x2="22.4" y2="0.4" />
                <line class="st0" x1="0" y1="6.7" x2="22.4" y2="6.7" />
                <line class="st0" x1="0" y1="12.4" x2="22.4" y2="12.4" />
            </svg>

        </div>

    </header>

    <header class="mobile_menu">

        <span class="close">&times;</span>

        <!-- <a href="/">WORK</a>
        <a href="about">ABOUT</a> -->

        <?php
        wp_nav_menu(array(
            'theme_location' => 'my-custom-menu',
            'container_class' => 'menu-wrapper'
        ));
        ?>


    </header>

    <header class="desktop_menu">

        <!-- <a href="/">FACCIA Á FACCIA</a>
        <a href="about">ABOUT</a>
        <a href="/">WORK</a> -->

        <?php
        wp_nav_menu(array(
            'theme_location' => 'my-custom-menu',
            'container_class' => 'menu-wrapper'
        ));
        ?>

    </header>