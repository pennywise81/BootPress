<?php

// logo/brand image
$bs_option_brand_image = get_theme_mod('bs_brand_image', get_template_directory_uri() . '/img/brandimage-default.png');

// responsiveness
$bs_responsivness = get_theme_mod('bs_responsivness', 'responsive');

// sidebars
$bs_show_sidebar_left = get_theme_mod('bs_show_sidebar_left', 0);
$bs_show_sidebar_right = get_theme_mod('bs_show_sidebar_right', 1);

// init content widths
$content_classes = 'col-md-12';

if ($bs_show_sidebar_left == 1 && $bs_show_sidebar_right == 1) $content_classes = 'col-md-7';
elseif ($bs_show_sidebar_left == 1) $content_classes = 'col-md-10';
elseif ($bs_show_sidebar_right == 1) $content_classes = 'col-md-9';

get_header();
get_sidebar('left');

?>

    <div class="content content-main <?php echo $content_classes; ?>">
      <?php

      get_template_part('loop', 'title_content');

      ?>
    </div>

<?php get_sidebar('right'); ?>

    </div><?php // end header.php:.row ?>
  </div><?php // end header.php:.container ?>

<?php get_footer(); ?>