<?php

// init the theme
include_once 'functions/init_theme.php';

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

// Walker for comments
include_once 'functions/init_comments_walker.php';

include_once 'functions/init_comment_reply_link.php';

// enable thumbnails for posts
add_theme_support('post-thumbnails');

// disable admin bar
add_filter('show_admin_bar', '__return_false');

?>