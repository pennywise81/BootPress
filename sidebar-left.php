<?php

include 'thememod.php';

?>
<?php if ($bs_show_sidebar_left == 1) { ?>
    <?php if (is_active_sidebar('sidebar-left')) { ?>
    <aside class="sidebar sidebar-left <?php echo $left_sidebar_classes; ?>">
      <?php dynamic_sidebar('sidebar-left'); ?>
    </aside>
    <?php } ?>
<?php } ?>