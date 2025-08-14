<?php
get_header();
$term = get_queried_object();
?>

<div class="container">
  <header class="archive-header">
    <h1><?php echo esc_html($term->name); ?> Talent *</h1>
    <p><?php echo esc_html($term->description); ?></p>
  </header>

  <div class="talent-grid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="talent-card">
          <?php if ($image = get_field('profile_image')) : ?>
            <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php the_title(); ?>">
          <?php endif; ?>
          <h3><?php the_title(); ?></h3>
          <a href="<?php the_permalink(); ?>" class="btn">View Profile</a>
        </div>
      <?php endwhile;
    else : ?>
      <p>No talent found in this category.</p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>