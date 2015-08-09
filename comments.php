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
  echo '<h3>Kommentare</h3>';
  echo '<div class="col-xs-12 comments" id="comments-container">';

  wp_list_comments(array('walker' => new comments_walker));

  echo '</div> <!-- end .comments -->';
} else {
  echo "No comments yet";
}

if (comments_open()) {
  echo '<div class="comments-reply">';

  // Login required
  if (get_option('comment_registration') && !$user_ID) {}

  ?>
    <h3>
      <?php comment_form_title('Hinterlasse eine Antwort', 'Hinterlasse eine Antwort an %s'); ?>
    </h3>

    <?php

    if ($user_ID) {
      // User is logged in
      ?>
      <p class="comments-logged-in-as">
        Angemeldet als <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>
        <a class="btn btn-primary btn-xs" href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout">Abmelden</a>
      </p>
      <?php
    }

    ?>

    <div id="cancel-comment-reply">
      <?php cancel_comment_reply_link(); ?>
    </div>

    <div id="respond">
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

        <div class="form-group">
          <label for="author">Name <?php if($req) echo '<span class="mandatory">*</span>'; ?></label>
          <input type="text" class="form-control" placeholder="Name" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1">
        </div>

        <div class="form-group">
          <label for="email">E-Mail (wird nicht veröffentlicht) <?php if($req) echo '<span class="mandatory">*</span>'; ?></label>
          <input type="text" class="form-control" placeholder="E-Mail" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2">
        </div>

        <div class="form-group">
          <label for="url">Webseite</label>
          <input type="text" class="form-control" placeholder="Webseite" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3">
        </div>

        <div class="form-group">
          <label for="comment">Dein Kommentar</label>
          <p class="help-block">Erlaubte HTML-Tags:
            <?php
            $allowed_tags = explode('&gt; &lt;', allowed_tags());
            $allowed_tags = implode('&gt;</code> <code>&lt;', $allowed_tags);
            $allowed_tags = '<code>' . $allowed_tags . '</code>';

            echo $allowed_tags;
            ?>
          </p>
          <textarea class="form-control" name="comment" id="comment" cols="100%" rows="10" tabindex="4"></textarea>
        </div>

        <input name="submit"  class="btn btn-primary" type="submit" id="submit" tabindex="5" value="Kommentar abschicken">
        <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>">

        <?php do_action('comment_form', $post->ID); ?>
        <?php comment_id_fields(); ?>
      </form>
    </div>
    </div><!-- end .comments-reply -->
  <?php
} else {
  // comments are closed
}