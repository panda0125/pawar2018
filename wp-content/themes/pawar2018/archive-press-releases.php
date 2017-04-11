<?php get_header(); ?>
<main>
  <section class="hero inner-page" style="background-image: url('<?php echo get_bloginfo('template_url') ?>/assets/press-releases-hero.jpg'); background-size: cover; background-position-y: 28%;">
    <div class="row align-center align-middle">
      <h1 class="page-title">Press Releases</h1>
    </div>
  </section>
  <section class="wrapper">
    <div class="main body">
      <?php

        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
        $args = array(
          'post_type' => 'press-releases',
          'posts_per_page' => 5,
          'meta_key' => 'date',
          'orderby' => 'meta_value_num',
          'paged' => $paged,
          'order' => 'DESC') ?>
      <?php $loop = new WP_Query( $args ); ?>
      <?php while ($loop->have_posts() ) : $loop->the_post(); ?>
      <div class="row align-center">
        <div class="press-release small-11 medium-11 large-11 small-order-2 medium-order-1 columns">
          <h1 class="press-release__title section-title">
            <a href="<?php the_permalink(); ?>">
              <?php the_title();?>
            </a>
          </h1>
          <h6 class="press-release__date">
            <?php $date = get_field('date');
              $day = date("jS", strtotime($date));
              $month = date("F", strtotime($date));
              $year = date("Y", strtotime($date));
            ?>
            <?php echo $month; ?> <?php echo $day; ?>, <?php echo $year; ?>
          </h6>
          <p><?php the_content( 'Continue reading ' . get_the_title() ) ?></p>
        </div>
      </div>
      <?php endwhile; ?>
      <div class="pagination-button row align-center">
        <?php echo get_next_posts_link( 'See More', $loop->max_num_pages ); ?>
      </div>
    </div>
    <aside class="sidebar" role="complementary">
      <div class="row align-center">
        <div class="small-12 medium-8 columns">
          <p><strong>Contact: Tom Elliott</strong><br/>
          773-819-0503<br/>
          <a href="mailto:media@pawar2018.com">media@pawar2018.com</a></p>
        </div>
      </div>
    </aside>
  </section>
</main>
<?php get_footer(); ?>