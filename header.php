<?php

include 'thememod.php';

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

get_template_part('tpl.beforenavbar');

if ($bs_option_show_menu === true) {
  get_template_part('tpl.navbar');
}

?>
      </header>
    </div>
  </div>

  <div class="container main">
    <div class="row">