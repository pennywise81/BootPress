<?php

// get post meta
$post_meta = get_post_meta(get_the_ID());

// show menu option
$bs_option_show_menu = true;
if (!empty($post_meta['bs_option_show_menu']) && $post_meta['bs_option_show_menu'][0] == 'no') {
  $bs_option_show_menu = false;
}

// logo/brand image
$bs_option_brand_image = get_theme_mod('bs_brand_image', '');
if ($bs_option_brand_image == '') {
  $bs_option_brand_image = 'data:image/png;base64,' . base64_encode(file_get_contents(get_template_directory() . '/img/brandimage-default.png'));
}

// responsive settings
$bs_responsivness = get_theme_mod('bs_responsivness', 'responsive');

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

  <style>
  <?php include_once 'css/abovethefold.css'; ?>
  </style>

  <?php wp_enqueue_script('comment-reply'); ?>

  <?php wp_head(); ?>

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
  get_template_part('tpl.navbar');
}

?>
      </header>
    </div>
  </div>

  <div class="container">
    <div class="row">