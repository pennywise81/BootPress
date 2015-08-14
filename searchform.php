<form method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
  <div class="form-group">
    <label for="s"><?php _e('Search'); ?></label>
    <div class="input-group">
      <input type="text" class="form-control" id="s" name="s" placeholder="<?php esc_attr_e('Search'); ?>">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-primary" name="submit" id="searchsubmit">
          <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
          <span class="hidden-xs hidden-md"><?php esc_attr_e('Search'); ?></span>
        </button>
      </span>
    </div>
  </div>




</form>