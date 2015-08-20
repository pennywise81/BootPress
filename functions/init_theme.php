<?php

function init_scripts() {
  // Basic Stylesheet
  // wp_register_style(
  //   'basic-style',
  //   get_template_directory_uri() . '/style.css',
  //   array(),
  //   '1.0.0',
  //   'screen'
  // );
  // wp_enqueue_style('basic-style');

  // jQuery
  wp_deregister_script('jquery');
  wp_register_script(
    'jquery',
    get_template_directory_uri() . '/vendor/jquery/dist/jquery.min.js',
    array(),
    '2.1.4',
    true
  );
  wp_enqueue_script('jquery');

  // Bootstrap
  wp_register_script(
    'bootstrap',
    get_template_directory_uri() . '/vendor/bootstrap-sass/assets/javascripts/bootstrap.min.js',
    array('jquery'),
    '3.3.5',
    true
  );
  wp_enqueue_script('bootstrap');

  // enquire
  wp_register_script(
    'enquire.js',
    get_template_directory_uri() . '/vendor/enquire/dist/enquire.min.js',
    array(),
    '2.1.2',
    true
  );

  // sticky footer functionality
  wp_enqueue_script(
    'sticky-footer',
    get_template_directory_uri() . '/js/min/sticky_footer.min.js',
    array('enquire.js'),
    '1.0.0',
    true
  );

  // deferred CSS
  wp_enqueue_script(
    'defer-css',
    get_template_directory_uri() . '/js/min/defer-css.min.js',
    array(),
    '1.0.0',
    true
  );

  $translation_array = array('templateUrl' => get_stylesheet_directory_uri());
  wp_localize_script('defer-css', 'config', $translation_array);
}


add_action('wp_enqueue_scripts', 'init_scripts');

?>