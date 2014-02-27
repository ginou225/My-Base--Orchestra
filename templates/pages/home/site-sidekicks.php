<?php
/**
 * Display SideKick Post Type
 *
 */
?>

<!-- sidekicks -->
<section class="sidekicks_container full_width">
  <div class="row sidekicks">
    <?php 
      // WP_Query arguments
      $args = array (
        'post_type'              => 'sidekick',
        'post_status'            => 'published',
        'posts_per_page'         => '3',
        'ignore_sticky_posts'    => true,
        'order'                  => 'ASC',
        'orderby'                => 'date',
        // 'meta_query' => array(
        //   array('key' => '_thumbnail_id')
        //   ),
        // 'tax_query' => array(
        //     array(
        //       'taxonomy' => 'post_format',
        //       'field' => 'slug',
        //       'terms' => array('post-format-video')
        // ))
      ); 

      // The Query
      $sidekick = new WP_Query( $args );
    ?>
    <?php while ( $sidekick->have_posts() ) : $sidekick->the_post(); ?>
    <div class="columns large-4">
      <article <?php post_class('sk_post post_img_block') ?>>
        <figure class="featured post_thumb post-image ImageWrapper ContentWrapperHe clip">
          <?php 
            if ( has_post_thumbnail() ) {
              get_the_image( array(
                  'size' => 'full',
                )
              );
            } 
          ?>
          <div class="ContentHe">
            <div class="content">
                <header>
                  <h3><?php the_title(); ?></h3>
                </header>
                 <div class="excerpt"><?php the_excerpt(); ?></div>

                <div class="ReadMore">
                    <?php
                      $cta_link = get_post_meta($post->ID, '_cmb_side_cta', true);

                      echo '<a href=" ' . $cta_link . ' " class="cta wht button tiny">Read More</a>'; 
                    ?>
                </div>
            </div>
          </div>

          <!-- title -->
          <header class="visible_title p_absolute textright">
            <h3 class="title">
              <?php 
                $cta_name = get_post_meta($post->ID, '_cmb_side_cta_name', true); 

                if ($cta_name) {
                  echo $cta_name;
                } else {
                  echo "View More..";
                } ?>
              <span class="small_ind img-circle"><i class="dashicons dashicons-arrow-right"></i></span>
            </h3>
          </header>
          <!-- /title -->
        </figure>
      </article>
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  
  </div>
</section>
<!-- /sidekicks  -->