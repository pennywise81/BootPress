<?php

class comments_walker extends Walker_Comment {
  public $comments_count;

  function __construct() {
    $this->comments_count = 1;
  }

  function start_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1;
  }

  function end_lvl(&$output, $depth = 0, $args = array()) {
    $GLOBALS['comment_depth'] = $depth + 1;
  }

  function start_el(&$output, $comment, $depth, $args, $id = 0) {
    $depth++;

    $GLOBALS['comment_depth'] = $depth;
    $GLOBALS['comment'] = $comment;

    $comment_classes = array('comment', 'comment-level-' . $depth);

    if ($this->comments_count++%2==0) {
      $comment_classes[] = 'even';
    }
    else {
      $comment_classes[] = 'odd';
    }

    if (!empty($args['has_children'])) {
      $comment_classes[] = 'has-replies';
    }

    echo "\n";
    echo '<div class="' . implode(' ', $comment_classes) . '" id="comment-' . get_comment_ID() . '">';

    if ($args['avatar_size'] != 0) {
      echo '<div class="comment-avatar">';
      echo get_avatar($comment, $args['avatar_size']);
      echo '</div> <!-- end .comment-avatar -->';
    }

    echo '<div class="comment-author-link">';
    echo get_comment_author_link();
    echo '</div> <!-- end .comment-author-link -->';

    // comment is awaiting moderation
    if(!$comment->comment_approved) {}

    echo '<div class="comment-date">';
    comment_date('d.m.Y H:i');
    echo '</div> <!-- end .comment-date -->';

    echo '<div class="comment-text">';
    comment_text();
    echo '</div> <!-- end .comment-text -->';

    $reply_args = array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']);
    echo '<div class="comment-reply-link">';
    echo get_comment_reply_link(array_merge($args, $reply_args));
    echo '</div> <!-- end .comment-reply-link -->';

    echo '</div> <!-- end .comment -->';
    echo "\n";
  }

  function end_el(&$output, $comment, $depth = 0, $args = array()) {}

  function __destruct() {}
}
?>