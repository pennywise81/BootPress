<?php

include 'thememod.php';

?>

<?php if ($bs_show_sidebar_right == 1) { ?>
    <aside class="sidebar sidebar-right <?php echo $right_sidebar_classes; ?>">
    <?php if (is_active_sidebar('sidebar-right')) { ?>
      <?php dynamic_sidebar('sidebar-right'); ?>
    <?php
      } else {
        // default widgets
        the_widget(
          'WP_Widget_Search',
          array(
            'title' => ''
          ),
          array(
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
          )
        );


        the_widget(
          'WP_Widget_Recent_Posts',
          array(
            'title' => __('Recent Posts'),
            'number' => 10
          ),
          array(
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
          )
        );

        the_widget(
          'WP_Widget_Recent_Comments',
          array(
            'title' => __('Recent Comments'),
            'number' => 5
          ),
          array(
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h3>',
            'after_title' => '</h3>'
          )
        );
      }
    ?>
    </aside>
<?php } ?>