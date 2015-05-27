<?php

function bootstrap_customize_register($wp_customize) {
  // load css for customizer
  wp_register_style('custom_wp_admin_css', get_template_directory_uri() . '/css/admin/customizer.css');
  wp_enqueue_style('custom_wp_admin_css');

  // remove default sections and panels
  // $wp_customize->remove_section('title_tagline');
  $wp_customize->remove_section('colors');
  $wp_customize->remove_section('header_image');
  $wp_customize->remove_section('background_image');
  $wp_customize->remove_section('nav');
  $wp_customize->remove_section('static_front_page');
  // $wp_customize->remove_panel('widgets');

  $wp_customize->add_section('bs_options' , array(
      'title' => __('Basic options', 'bootstrap'),
  ));

  $wp_customize->add_section('bs_sidebars' , array(
      'title' => __('Sidebars', 'bootstrap'),
  ));

  /* START brand image */
  $wp_customize->add_setting(
    'bs_brand_image',
    array(
      'default' => get_template_directory_uri() . '/img/brandimage-default.png'
    )
  );
  $wp_customize->add_control(
    new WP_Customize_Image_Control($wp_customize, 'bs_brand_image', array(
      'label'    => __('Logo', 'bootstrap'),
      'section'  => 'bs_options',
      'settings' => 'bs_brand_image',
    )
  ));
  /* END brand image */

  /* START responsiveness */
  $wp_customize->add_setting(
    'bs_responsivness',
    array(
      'default' => 'responsive'
    )
  );
  $wp_customize->add_control(
    'bs_responsivness', array(
      'label' => __('Layout', 'bootstrap'),
      'section' => 'bs_options',
      'settings' => 'bs_responsivness',
      'type' => 'radio',
      'choices' => array(
        'responsive' => __('responsive', 'bootstrap'),
        'fixed_width' => __('fixed at 980px', 'bootstrap'),
      ),
  ));
  /* END responsiveness */

  /* START sidebar left */
  $wp_customize->add_setting(
    'bs_show_sidebar_left'
  );
  $wp_customize->add_control(
    'bs_show_sidebar_left',
    array(
      'type' => 'checkbox',
      'label' => __('enable left sidebar', 'bootstrap'),
      'section' => 'bs_sidebars',
    )
  );
  /* END sidebar left */

  /* START sidebar right */
  $wp_customize->add_setting(
    'bs_show_sidebar_right',
    array(
      'default' => 1
    )
  );
  $wp_customize->add_control(
    'bs_show_sidebar_right',
    array(
      'type' => 'checkbox',
      'label' => __('enable right sidebar', 'bootstrap'),
      'section' => 'bs_sidebars',
    )
  );
  /* END sidebar right */

}
add_action('customize_register', 'bootstrap_customize_register');

?>