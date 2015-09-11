<?php

// logo/brand image
$bs_option_brand_image = get_theme_mod('bs_brand_image', '');
if ($bs_option_brand_image == '') {
  $bs_option_brand_image = 'data:image/png;base64,' . base64_encode(file_get_contents(get_template_directory() . '/img/brandimage-default.png'));
}

// responsive settings
$bs_responsivness = get_theme_mod('bs_responsivness', 'responsive');

?>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header">

      <?php get_template_part('tpl.navbartoggle'); ?>

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