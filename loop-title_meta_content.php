<?php

if (have_posts()) {
  while (have_posts()) {
    the_post();

    the_title('<h1>', '</h1>');

    echo '<div class="meta">';
    get_template_part('tpl.datetime');
    echo '<br>';
    get_template_part('tpl.author', 'written_by');
    echo '</div>';

    the_content();
  }
}
else {
  echo _e('Nothing found.', 'bootstrap');
}

?>