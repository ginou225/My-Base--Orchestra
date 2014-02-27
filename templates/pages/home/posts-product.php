<?php
  global $mb_base;
  $title = $mb_base['product_title'];
  $bg = $mb_base['product_img']['url'];
?>      

<div class="block fixed_bg full_width" style="background-image: url(<?php echo $bg; ?>);"></div>
<!-- section title -->
<div class="row">
  <header class="columns small-centered small-8 textcenter">
    <h3>
      <?php if($title) {
        echo $title; 
      } else {
        echo "Recent Products";
      } ?>
    </h3>
  </header>
</div>
<!-- /section title -->

<!-- section posts -->
<div class="row home_row_product">
  <div class="large-12 columns">
    <div class="row">

      <?php 
        // WP_Query arguments
        $args = array (
          'post_type'              => 'product',
          'post_status'            => 'published',
          'posts_per_page'         => '4',
          'order'                  => 'ASC',
          'orderby'                => 'date',
          'meta_query' => array(
            array('key' => '_thumbnail_id')
            )
        ); 

        // The Query
        $recent_products = new WP_Query( $args );

      ?>
      <?php while ( $recent_products->have_posts() ) : $recent_products->the_post(); ?>
      <div class="columns large-3">
        <article class="post_img_block">
          <figure class="featured post_thumb post-image ImageWrapper ContentWrapperHe">
            <?php 
              if ( has_post_thumbnail() ) {
                get_the_image( array(
                    'size' => 'full',
                  )
                );
              } 
            ?>
            <div class="ContentHe">
            <div class="content textcenter">
                <header class="post_title">
                  <h3 class="title"><?php the_title(); ?></h3>
                </header>
                <a href="<?php the_permalink(); ?>" class="cta wht button small">View Product</a>
            </div>
          </div>
          </figure>
        </article>  
      </div>
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>
      
    </div>
  </div>
</div>
<!-- /section posts -->

<!-- section footer -->
<div class="row">
  <footer class="columns small-centered small-8 textcenter">
    <a href="#" class="button small">View All</a>
  </footer>
</div>
<!-- section footer -->