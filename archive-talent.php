<?php
get_header();
?>

<div class="container">
  <header class="archive-header">
    <h1>Our Talent</h1>
    <p>Browse by specialty and growth stage</p>
  </header>

  <!-- Hardcoded Filters -->
  <div class="filters">
    <div class="filter-group">
      <h4>Growth Stage</h4>
      <ul>
        <?php
        $stages = get_terms([
          'taxonomy' => 'growth_stage',
          'hide_empty' => true
        ]);
        if (!empty($stages)) :
          foreach ($stages as $stage) :
            echo '<li><a href="' . esc_url(get_term_link($stage)) . '">' . esc_html($stage->name) . '</a></li>';
          endforeach;
        endif;
        ?>
      </ul>
    </div>

    <div class="filter-group">
      <h4>Specialty</h4>
      <ul>
        <?php
        $specialties = get_terms([
          'taxonomy' => 'specialty',
          'hide_empty' => true
        ]);
        if (!empty($specialties)) :
          foreach ($specialties as $specialty) :
            echo '<li><a href="' . esc_url(get_term_link($specialty)) . '">' . esc_html($specialty->name) . '</a></li>';
          endforeach;
        endif;
        ?>
      </ul>
    </div>
  </div>

  <!-- Talent Grid -->
  <div class="talent-grid">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="talent-card">
          <?php if ($image = get_field('profile_image')) : ?>
            <img src="<?php echo esc_url($image['sizes']['medium']); ?>" alt="<?php the_title(); ?>">
          <?php endif; ?>
          <h3><?php the_title(); ?></h3>
          <?php if ($stage = get_the_terms(get_the_ID(), 'growth_stage')) : ?>
            <p class="talent-stage"><?php echo esc_html($stage[0]->name); ?></p>
          <?php endif; ?>
          <a href="<?php the_permalink(); ?>" class="btn">View Profile</a>
        </div>
      <?php endwhile;
    else : ?>
      <p>No talent found.</p>
    <?php endif; ?>
  </div>
</div>

<?php
get_footer();
?>