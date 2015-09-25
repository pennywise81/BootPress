<?php

include 'thememod.php';

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