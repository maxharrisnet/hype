<?php
get_header();

while (have_posts()) : the_post();
  $image = get_field('profile_image');
  $instagram = get_field('instagram_handle');
  $gallery = get_field('portfolio_gallery');
?>

  <div class="container talent-profile">
    <div class="talent-profile__header">
      <?php if ($image) : ?>
        <img class="talent-profile__image" src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php the_title(); ?>">
      <?php endif; ?>
      <h1 class="talent-profile__name"><?php the_title(); ?></h1>
      <?php if ($stage = get_the_terms(get_the_ID(), 'growth_stage')) : ?>
        <p class="talent-profile__level"><?php echo esc_html($stage[0]->name); ?></p>
      <?php endif; ?>
    </div>

    <div class="talent-profile__bio">
      <?php the_content(); ?>
    </div>

    <div class="talent-profile__services">
      <?php
      $services = get_the_terms(get_the_ID(), 'specialty');
      if ($services) :
        foreach ($services as $service) {
          echo '<span class="talent-profile__service">' . esc_html($service->name) . '</span>';
        }
      endif;
      ?>
    </div>

    <?php if ($instagram) : ?>
      <div class="talent-profile__instagram">
        <h3>Instagram</h3>
        <?php echo do_shortcode('[instagram-feed user="' . esc_attr($instagram) . '"]'); ?>
      </div>
    <?php endif; ?>

    <?php if ($gallery) : ?>
      <div class="talent-profile__gallery">
        <?php foreach ($gallery as $img) : ?>
          <img src="<?php echo esc_url($img['sizes']['medium']); ?>" alt="">
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="talent-profile__booking">
      <a href="<?php echo site_url('/booking'); ?>">Book This Artist</a>
    </div>
  </div>

<?php
endwhile;
get_footer();
?>