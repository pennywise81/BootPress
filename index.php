<?php

include 'thememod.php';

get_header();
get_sidebar('left');

?>

<div class="content content-main <?php echo $content_classes; ?>">
  <?php get_template_part('tpl.beforeloop'); ?>
  <?php get_template_part('loop'); ?>
</div>

<?php get_sidebar('right'); ?>

</div><?php // end header.php:.row ?>
</div><?php // end header.php:.container ?>

<?php get_footer(); ?>