<?php

class navigation_main_walker extends Walker_Nav_Menu {
  function display_element($element, &$children_elements, $max_depth, $depth=0, $args, &$output) {
      $id_field = $this->db_fields['id'];

      if (is_object($args[0])) {
        $args[0]->has_children = !empty($children_elements[$element->$id_field]);
      }

      return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
  }

  function start_lvl(&$output, $depth, $args) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
  }

  function start_el(&$output, $item, $depth, $args, $id = 0) {
    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $classes = array();
    if ($args->has_children) $classes[] = 'dropdown';
    if (in_array('current_page_item', (array) $item->classes)) $classes[] = 'active';
    $class_tag = count($classes) > 0 ? ' class="' . implode(' ', $classes) . '"' : '';
    $output .= $indent . '<li' . $class_tag .'>';

    $item_output .= '<a href="' . $item->url . '"';
    if ($args->has_children) {
      $item_output .= ' class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"';
    }
    $item_output .= '>';
    $item_output .= $item->title;
    if ($args->has_children) {
      $item_output .= ' <span class="caret">';
    }
    $item_output .= '</a>';

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}

?>