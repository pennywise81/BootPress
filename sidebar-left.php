<?php

$left_sidebar_classes = 'col-md-2';
$bs_show_sidebar_left = get_theme_mod('bs_show_sidebar_left', 0);

?>
<?php if ($bs_show_sidebar_left == 1) { ?>
    <?php if (is_active_sidebar('sidebar-left')) { ?>
    <aside class="sidebar sidebar-left <?php echo $left_sidebar_classes; ?>">
      <?php dynamic_sidebar('sidebar-left'); ?>
    </aside>
    <?php } ?>
<?php } ?>