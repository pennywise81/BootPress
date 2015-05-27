<?php

function init_widgets() {
  register_sidebar(array(
  'name' => 'Sidebar links',
    'id' => 'sidebar-left',
    'description' => 'Sidebar auf der linken Seite',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
  'name' => 'Sidebar rechts',
    'id' => 'sidebar-right',
    'description' => 'Sidebar auf der rechten Seite',
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));

  register_sidebar(array(
  'name' => 'Footer Widgets',
    'id' => 'footer-widgets',
    'description' => 'Widgets im Footer',
    'before_widget' => '<div class="widget col-md-3">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  ));
}
add_action('widgets_init', 'init_widgets');

?>