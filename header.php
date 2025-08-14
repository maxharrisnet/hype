<?php
if (!defined('ABSPATH')) {
  exit;
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content'); ?></a>
  <header class="site-header">
    <div class="container header-container">
      <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logos/wellington-dentistry-logo.png" alt="<?php bloginfo('name'); ?>">
        </a>
      </div>
      <div class="mobile">
        <h1><?php bloginfo('name'); ?></h1>
      </div>
      <button class="hamburger-menu mobile" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <nav class="header-nav">
        <?php
        wp_nav_menu(array(
          'theme_location' => 'header-menu',
          'container' => false,
          'items_wrap' => '<ul class="nav-links">%3$s</ul>',
        ));
        ?>
      </nav>
    </div>
  </header>