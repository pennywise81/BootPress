<?php

// get post meta
$post_meta = get_post_meta(get_the_ID());

// show menu option
$bs_option_show_menu = true;
if (!empty($post_meta['bs_option_show_menu']) && $post_meta['bs_option_show_menu'][0] == 'no') {
  $bs_option_show_menu = false;
}

// logo/brand image
$bs_option_brand_image = get_theme_mod('bs_brand_image', get_template_directory_uri() . '/img/brandimage-default.png');

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php if ($bs_responsivness == 'responsive') { ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php } ?>

  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

  <?php wp_head(); ?>

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php if ($bs_responsivness == 'fixed_width') { ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/non-responsive.css" type="text/css" media="screen">
  <style>
  .container {
    width: 980px !important;
  }
  </style>
  <?php } ?>

  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body <?php body_class(); ?>>

  <div class="container-fluid">
    <div class="row">
      <header>

  <?php
  if ($bs_option_show_menu === true) {
  ?>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-collapsible">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="<?php echo home_url(); ?>">
          <?php
          if ($bs_option_brand_image != '') {
            ?>
            <img src="<?php echo $bs_option_brand_image; ?>" alt="<?php echo get_bloginfo('name'); ?>" title="<?php echo get_bloginfo('name'); ?>">
            <?php
          }

          echo get_bloginfo('name');
          ?>
        </a>
        <p class="navbar-text"><?php echo get_bloginfo('description'); ?></p>

      </div>

      <div <?php
      if ($bs_responsivness == 'responsive') {
        ?> class="collapse navbar-collapse" id="menu-collapsible"<?php
      }
      else {
        ?> class="clearfix" id="navbar"<?php
      }?>>
  <?php
  wp_nav_menu(array(
    'container' => false,
    'fallback_cb' => 'bs_default_menu',
    'menu_class' => 'nav navbar-nav',
    'menu_id' => 'navigation-main',
    'theme_location' => 'navigation-main',
    'walker' => new navigation_main_walker()
  ));
  ?>
      </div>
    </div>
  </nav>
  <?php
}
?>
      </header>
    </div>
  </div>

  <div class="container">
    <div class="row">