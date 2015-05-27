<?php

function init_custom_metaboxes() {
  add_meta_box('bs_metabox_layout', __('Layout options', 'bootstrap' ), 'bs_metabox_layout_callback', 'page', 'side', 'high');
}
add_action('add_meta_boxes', 'init_custom_metaboxes');

function bs_metabox_layout_callback($page) {
  wp_nonce_field(basename(__FILE__), 'bs_nonce');

  $bs_stored_meta = get_post_meta($page->ID);

  // Set default for this value
  global $pagenow;
  if ($pagenow == 'post-new.php') {
    $bs_stored_meta['bs_option_show_menu'] = array('yes');
  }

  ?>
  <label for="bs_option_show_menu">
    <input
      type="checkbox"
      name="bs_option_show_menu"
      id="bs_option_show_menu"
      value="yes"
      <?php
      if (isset($bs_stored_meta['bs_option_show_menu']))
      {
        checked($bs_stored_meta['bs_option_show_menu'][0], 'yes');
      }
      ?>
    />
    <?php _e('Show main menu', 'bootstrap')?>
  </label>
  <?php
}

function bs_meta_save($page_id) {
  // Checks save status
  $is_autosave = wp_is_post_autosave($page_id);
  $is_revision = wp_is_post_revision($page_id);
  $is_valid_nonce = (isset($_POST['bs_nonce'] ) && wp_verify_nonce($_POST['bs_nonce'], basename(__FILE__))) ? 'true' : 'false';

  // Exits script depending on save status
  if ($is_autosave || $is_revision || !$is_valid_nonce) {
    return;
  }

  if(isset($_POST['bs_option_show_menu'])) {
    update_post_meta($page_id, 'bs_option_show_menu', 'yes');
  } else {
    update_post_meta($page_id, 'bs_option_show_menu', 'no');
  }
}
add_action('save_post', 'bs_meta_save');

?>