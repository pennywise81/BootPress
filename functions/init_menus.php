<?php

function init_menus() {
  register_nav_menu('navigation-main', 'Hauptnavigation');
}
add_action('init', 'init_menus');

?>