<?php

add_filter('comment_reply_link', 'replace_reply_link_class');

function replace_reply_link_class($class) {
  $class = str_replace("class='comment-reply-link", "class='comment-reply-link btn btn-primary btn-xs", $class);
  return $class;
}

?>