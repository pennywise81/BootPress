<?php

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
  <h1><?php _e('Oops!', 'bootstrap') ?></h1>

  <p>
    <?php _e('The content you request could not be found.', 'bootstrap') ?>
  </p>

  <a href="<?php echo home_url(); ?>" class="btn btn-primary">
    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
    <?php _e('Back to homepage', 'bootstrap') ?>
  </a>
</div>

<?php get_sidebar('right'); ?>

</div><?php // end header.php:.row ?>
</div><?php // end header.php:.container ?>

<?php get_footer(); ?>