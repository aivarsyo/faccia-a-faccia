<?php

function getStyle()
{
    wp_enqueue_script('main-js', get_theme_file_uri('./dist/js/main.1.0.0.js'), NULL, '1.0', true);
    wp_enqueue_style('theme_main_styles', get_stylesheet_uri('./style.css'));
    wp_enqueue_style('baskervville_font', '//fonts.googleapis.com/css2?family=Baskervville:ital@0;1&display=swap');
    wp_enqueue_style('helvetica_font', get_stylesheet_directory_uri() . '/fonts.css');
}

add_action('wp_enqueue_scripts', 'getStyle');

function features()
{
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'features');

function comicpress_copyright()
{
    global $wpdb;
    $copyright_dates = $wpdb->get_results("
    SELECT
    YEAR(min(post_date_gmt)) AS firstdate,
    YEAR(max(post_date_gmt)) AS lastdate
    FROM
    $wpdb->posts
    WHERE
    post_status = 'publish'
    ");
    $output = '';
    if ($copyright_dates) {
        $copyright = "&copy; " . $copyright_dates[0]->firstdate;
        if ($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
            $copyright .= '-' . $copyright_dates[0]->lastdate;
        }
        $output = $copyright;
    }
    return $output;
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Faccia General Settings',
        'menu_title'    => 'Faccia Settings',
        'menu_slug'     => 'faccia-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'    => 'faccia-general-settings',
    ));
}

// create menu

function wpb_custom_new_menu()
{
    register_nav_menu('my-custom-menu', __('My Custom Menu'));
}
add_action('init', 'wpb_custom_new_menu');

// enables featured image on posts

add_theme_support('post-thumbnails');
