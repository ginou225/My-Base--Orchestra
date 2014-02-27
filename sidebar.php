<?php
/**
 * The template used for displaying sidebar blocks
 */

	$sidebar = get_post_meta($post->ID, "_cmb_sidebar", true); 
?>
<aside class="sidebar columns large-4">

	<?php 
		// WP_Query arguments
		$args = array (
			'post_type'              => 'post',
			'post_status'            => 'published',
			'cat'                    => 'featured',
			'posts_per_page'         => '1',
			'ignore_sticky_posts'    => true,
			'order'                  => 'ASC',
			'orderby'                => 'date',
			'meta_query' => array(
				array('key' => '_thumbnail_id')
				),
		); 

		// The Query
		$featured = new WP_Query( $args );
	?>

	<?php while ( $featured->have_posts() ) : $featured->the_post(); ?> 
		<section id="post-<?php the_ID(); ?>" <?php post_class('featured_aside_post blog_post') ?>>
			<figure class="featured post_thumb post-image ImageWrapper ContentWrapperHe clip th">
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
	                        <a href="<?php the_permalink(); ?>">Read More</a>
	                    </div>
	                </div>
	            </div>

				<!-- title -->
				<header class="visible_title p_absolute">
					<h3 class="title"><?php the_title(); ?></h3>
				</header>
				<!-- /title -->
			</figure>
		</section>	
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

	<?php 
		if($sidebar == "shop") {
			get_template_part('templates/pages/side', 'shop');
		} elseif ($sidebar == "event") {
			get_template_part('templates/pages/side', 'events');
		} else {
			dynamic_sidebar( 'Main Sidebar' );
		}
	?>

</aside> 
<!-- /#sidebar -->
