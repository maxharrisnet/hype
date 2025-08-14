<?php
if (!defined('ABSPATH')) {
  exit;
}
?>

<footer>
  <div class="container">
    <div>
      <p>&copy; <?php echo date('Y'); ?> Hype Relations. All rights reserved.</p>
    </div>
  </div>
  <nav>
    <?php
    wp_nav_menu(array(
      'theme_location' => 'footer',
      'container'      => false,
      'menu_class'     => 'footer-menu',
    ));
    ?>
  </nav>
</footer>


<?php wp_footer(); ?>