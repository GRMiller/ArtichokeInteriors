<?php
function my_theme_enqueue_styles() {

    $parent_style = 'fotografo-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $gumby_style = 'gumby-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( get_template_directory_uri().'./css/gumby.css');
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style, $gumby_style),
        wp_get_theme()->get('Version')
    );
}

add_action ('wp_enqueue_scripts', 'my_theme_enqueue_styles');
?>
