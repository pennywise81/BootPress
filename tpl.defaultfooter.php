<?php

// default widgets
the_widget(
  'WP_Widget_Text',
  array(
    'title' => __('Title'),
    'text' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.' .
      'Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'
  ),
  array(
    'before_widget' => '<div class="widget col-md-3">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  )
);

the_widget(
  'WP_Widget_Pages',
  array(
    'title' => __('Pages'),
    'sortby' => 'menu_order'
  ),
  array(
    'before_widget' => '<div class="widget col-md-3">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  )
);

the_widget(
  'WP_Widget_Meta',
  array(
    'title' => __('Meta')
  ),
  array(
    'before_widget' => '<div class="widget col-md-3">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  )
);

the_widget(
  'WP_Widget_Text',
  array(
    'title' => get_bloginfo('name'),
    'text' => get_bloginfo('description')
  ),
  array(
    'before_widget' => '<div class="widget col-md-3">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>'
  )
);

?>