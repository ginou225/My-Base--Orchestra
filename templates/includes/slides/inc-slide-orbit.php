<?php // WP_Query arguments
	$slide_args = array (
		'post_type'              => 'slide',
		'posts_per_page'         => '5',
    'orderby'                => 'post_title',
		'order'                  => 'ASC',
	); 

	// The Query
	$slide = new WP_Query( $slide_args );
?>

<ul id="featured_slider" class="main_orbit" data-orbit>
  <?php while ( $slide->have_posts() ) : $slide->the_post(); ?> 
    <li class="slide">
      <div class="slide_content full_width p_absolute">
        <article class="row">
          <section class="columns large-8">
            <header>
              <h2><?php the_title(); ?></h2>
            </header>
            <div class="excerpt">
              <?php the_excerpt(); ?>
            </div>
            <footer><a href="" class="cta">Read More</a></footer>
          </section>
        </article>
      </div>
      <figure class="featured_image">
        <?php get_the_image( array( 
          'default_size' => 'full' 
          )); 
        ?>
      </figure>
    </li>
  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
</ul>