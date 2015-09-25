<?php

// get post meta
$post_meta = get_post_meta(get_the_ID());

// show menu option
$bs_option_show_menu = true;
if (!empty($post_meta['bs_option_show_menu']) && $post_meta['bs_option_show_menu'][0] == 'no') {
  $bs_option_show_menu = false;
}

// logo/brand image
$bs_option_brand_image = get_theme_mod('bs_brand_image', '');
if ($bs_option_brand_image == '') {
  $bs_option_brand_image = 'data:image/png;base64,' . base64_encode(file_get_contents(get_template_directory() . '/img/brandimage-default.png'));
}

// responsive settings
$bs_responsivness = get_theme_mod('bs_responsivness', 'responsive');

// sidebars
$bs_show_sidebar_left = get_theme_mod('bs_show_sidebar_left', 0);
$bs_show_sidebar_right = get_theme_mod('bs_show_sidebar_right', 1);

// defining widths
$content_classes = 'col-xs-12 col-sm-9 col-md-10 col-lg-10';
$left_sidebar_classes = 'col-sm-3 col-md-2 col-lg-2 hidden-xs';
$right_sidebar_classes = '';

/*
echo "<pre>";
echo '$bs_option_show_menu: ';
print_r($bs_option_show_menu . "\n");
echo '$bs_option_brand_image: ';
print_r($bs_option_brand_image . "\n");
echo '$bs_responsivness: ';
print_r($bs_responsivness . "\n");
echo '$bs_show_sidebar_left: ';
print_r($bs_show_sidebar_left . "\n");
echo '$bs_show_sidebar_right: ';
print_r($bs_show_sidebar_right . "\n");
echo '$content_classes: ';
print_r($content_classes . "\n");
echo '$right_sidebar_classes: ';
print_r($right_sidebar_classes . "\n");
echo '$left_sidebar_classes: ';
print_r($left_sidebar_classes . "\n");
echo "</pre>";
*/

?>