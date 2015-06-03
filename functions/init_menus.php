<?php

function init_menus() {
  register_nav_menu('navigation-main', 'Hauptnavigation');
}
add_action('init', 'init_menus');

function bs_default_menu() {
  $class = is_home() ? 'active' : '';

  $html = '<ul class="nav navbar-nav">
  <li class="' . $class . '"><a href="' . home_url() . '">Home</a></li>
</ul>';
  echo $html;
}

?>