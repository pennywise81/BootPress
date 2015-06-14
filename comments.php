<?php

if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
  die ('Please do not load this page directly. Thanks!');
}

if (!empty($post->post_password)) {
  if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
    //
  }
}

if ($comments) {
  foreach ($comments as $comment) {
    if ($comment->comment_approved == '0') {
      echo "comment is awaiting approval";
    }

    comment_text();
    echo "<br>";
    comment_type();
    echo "<br>";
    comment_author_link();
    echo "<br>";
    echo get_avatar($author_email, $size, $default_avatar );
    echo "<br>";
    comment_reply_link( array('reply_text' => 'Reply this comment'), get_comment_ID());
    echo "<br>";

    echo "<hr>";
  }
} else {
  echo "No comments yet";
}

if (comments_open()) {
  if (get_option('comment_registration') && !$user_ID) {
    // Login required
    echo 'You must be <a href="' . get_option('siteurl') .'/wp-login.php?redirect_to=' . urlencode(get_permalink()) . '">logged in</a> to post a comment.';
  }

  if ($user_ID) {
    // User is logged in
    ?>
    Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Log out &raquo;</a>
    <?php
  }

  ?>
  <h3><?php comment_form_title('Leave a Reply', 'Leave a Reply to %s'); ?></h3>
  <div id="cancel-comment-reply"><small><?php cancel_comment_reply_link() ?></small></div>

  <div id="respond">
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
      <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
      <label for="author"><small>Name <?php if($req) echo "(required)"; ?></small></label>
      <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" />
      <label for="email"><small>Mail (will not be published) <?php if($req) echo "(required)"; ?></small></label>
      <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
      <label for="url"><small>Website</small></label>
      Allowed tags: <?php echo allowed_tags(); ?>
      <textarea name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
      <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      <?php do_action('comment_form', $post->ID); ?>
      <?php comment_id_fields(); ?>
    </form>
  </div>
  <?php
} else {
  echo "The comments are closed.";
}