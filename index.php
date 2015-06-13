<?php

// get post meta
$post_meta = get_post_meta(get_the_ID());

// show menu option
$bs_option_show_menu = true;
if (!empty($post_meta['bs_option_show_menu']) && $post_meta['bs_option_show_menu'][0] == 'no') {
  $bs_option_show_menu = false;
}

// init content widths
$left_sidebar_classes = 'col-md-2';
$right_sidebar_classes = 'col-md-3';
$content_classes = 'col-md-12';

if (get_theme_mod('bs_show_sidebar_left') == 1 && get_theme_mod('bs_show_sidebar_right') == 1) $content_classes = 'col-md-7';
elseif (get_theme_mod('bs_show_sidebar_left') == 1) $content_classes = 'col-md-10';
elseif (get_theme_mod('bs_show_sidebar_right') == 1) $content_classes = 'col-md-9';

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <?php if (get_theme_mod('bs_responsivness') == 'responsive') { ?>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php } ?>

  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

  <?php wp_head(); ?>

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php if (get_theme_mod('bs_responsivness') == 'fixed_width') { ?>
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
  <nav class="navbar navbar-default">
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
          if (get_theme_mod('bs_brand_image') != '') {
            ?>
            <img src="<?php echo get_theme_mod('bs_brand_image'); ?>" alt="Brand">
            <?php
          }

          echo get_bloginfo('name');
          ?>
        </a>
        <p class="navbar-text"><?php echo get_bloginfo('description'); ?></p>

      </div>

      <div <?php
      if (get_theme_mod('bs_responsivness') == 'responsive') {
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
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
  <?php
}
?>
      </header>
    </div>
  </div>

  <div class="container">
    <div class="row">

<?php if (get_theme_mod('bs_show_sidebar_left') == 1) { ?>
    <?php if (is_active_sidebar('sidebar-left')) { ?>
    <aside class="sidebar sidebar-left <?php echo $left_sidebar_classes; ?>">
      <?php dynamic_sidebar('sidebar-left'); ?>
    </aside>
    <?php } ?>
<?php } ?>

    <div class="content content-main <?php echo $content_classes; ?>">
      <?php

      if (have_posts()) {
        while (have_posts()) {
          the_post();

          echo '<a href="' . get_permalink() . '">';
          the_title( '<h1>', '</h1>' );
          echo '</a>';

          the_content();

        }
      }
      else {
        // nichts gefunden
      }

      ?>
    </div>

<?php if (get_theme_mod('bs_show_sidebar_right') == 1) { ?>
    <aside class="sidebar sidebar-right <?php echo $right_sidebar_classes; ?>">
    <?php if (is_active_sidebar('sidebar-right')) { ?>
      <?php dynamic_sidebar('sidebar-right'); ?>
    <?php
      } else {
        the_widget('WP_Widget_Recent_Posts');
        the_widget('WP_Widget_Recent_Comments');
        the_widget('WP_Widget_Meta');
      }
    ?>
    </aside>
<?php } ?>

    </div>
  </div>

<?php if (is_active_sidebar('footer-widgets')) { ?>
<footer class="main">
  <div class="container">
    <div class="row">
      <?php dynamic_sidebar('footer-widgets'); ?>
    </div>
  </div>
</footer>
<?php } ?>

  <?php wp_footer(); ?>

</body>
</html>