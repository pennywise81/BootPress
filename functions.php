<?php

// Customizer add ons
include_once 'functions/init_customizer.php';

// additional metaboxes
include_once 'functions/init_metaboxes.php';

// registering widget sections
include_once 'functions/init_widget_sections.php';

// Theme menus
include_once 'functions/init_menus.php';

// Walker for navigation-main
include_once 'functions/init_main_navigation_walker.php';

// enable thumbnails for posts
add_theme_support('post-thumbnails');

?>