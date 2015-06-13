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

?>