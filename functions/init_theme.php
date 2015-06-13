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

  // enquire
  wp_register_script(
    'enquire.js',
    get_template_directory_uri() . '/javascript/enquire.min.js',
    array(),
    '2.1.2',
    true
  );

  // sticky footer functionality
  wp_enqueue_script(
    'sticky-footer',
    get_template_directory_uri() . '/javascript/sticky_footer.js',
    array('enquire.js'),
    '1.0.0',
    true
  );
}

add_action('wp_enqueue_scripts', 'init_scripts');

?>