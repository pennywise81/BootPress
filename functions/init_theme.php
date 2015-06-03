<?php

function init_scripts() {
  wp_enqueue_style(
    'twitter-bootstrap',
    get_template_directory_uri() . '/bootstrap/dist/css/bootstrap.min.css'
  );
  wp_register_style('bootstrap', get_stylesheet_uri(), array('twitter-bootstrap'));
  wp_enqueue_style( 'bootstrap' );

  wp_enqueue_script(
    'twitter-bootstrap',
    get_template_directory_uri() . '/bootstrap/dist/js/bootstrap.min.js',
    array('jquery'),
    '3.3.4',
    true
  );
}

add_action('wp_enqueue_scripts', 'init_scripts');

?>