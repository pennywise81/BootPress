<?php

include 'thememod.php';

?>
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="row">
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
  </div>
</nav>