<?php
if (!defined('ABSPATH')) {
  exit;
}
get_header();
?>

<main>
  <div class="container">
    <div>
      <?php the_title('<h1>', '</h1>'); ?>
      <?php the_content() ?>
    </div>
  </div>
</main>
<?php get_footer(); ?>