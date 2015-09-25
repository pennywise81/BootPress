<footer class="main">
  <div class="container">
    <div class="row">
<?php

if (is_active_sidebar('footer-widgets')) {
  dynamic_sidebar('footer-widgets');
} else {
  get_template_part('tpl.defaultfooter');
}

?>
    </div>
  </div>
</footer>

  <?php wp_footer(); ?>

</body>
</html>