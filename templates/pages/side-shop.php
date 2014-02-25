<?php dynamic_sidebar( 'Shop' ); ?>

<?php 
	// WP_Query arguments
	$args = array (
		'post_type'              => 'product',
		'post_status'            => 'published',
		'posts_per_page'         => '3',
		'ignore_sticky_posts'    => true,
		'order'                  => 'ASC',
		'orderby'                => 'date',
		'meta_query' => array(
			array('key' => '_thumbnail_id')
			),
	); 

	// The Query
	$recent_products = new WP_Query( $args );
?>
<section class="aside_posts recent_products">
	<ul class="side-nav">
		<li class="heading">
          Recent Products
        </li>
		<?php while ( $recent_products->have_posts() ) : $recent_products->the_post(); ?> 
		<!-- post -->
        <li class="product">
	        <div class="row collapse">
	          	<div class="columns small-3 large-3">
	          		<figure class="featured_thumb th">
	          	  		<?php the_post_thumbnail(); ?>
	          		</figure>
	          	</div>
	          	<div class="columns small-9 large-9">
		          	<header class="post_title">
		          	    <h6 class="title">
		          	      <a href="<?php the_permalink(); ?>" title="title="<?php the_title_attribute(); ?>""><?php the_title(); ?></a>
		          	    </h6>
		          	    <div class="cta">
		          	    	<a href="<?php the_permalink(); ?>" class="button tiny">View Product</a>
		          	    </div>
		          	</header> 
	          	</div> 
	        </div>
        </li>
        <!-- /posts -->
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
</section>