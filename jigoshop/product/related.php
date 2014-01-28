<?php global $_product; ?>

<?php
	$related = $_product->get_related();
	if (sizeof($related)>0) :
		echo '<div class="related products"><h2>'.__('You also may like:', 'jigoshop').'</h2>';
		$args = array(
			'post_type'	=> 'product',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => 4,
			'orderby' => 'rand',
			'post__in' => $related
		);
		query_posts($args);
		//jigoshop_get_template_part( 'loop', 'shop' ); 
		echo '</div>';
	endif;
	wp_reset_query();
?>

<?php $related_products = new WP_Query( $args ); ?>
<?php while ( $related_products->have_posts() ) : $related_products->the_post(); ?> 
	<div class="related_products row">
		<!-- thumb -->
		<div class="column four">	
		<?php 
			$thumb_id = 0;
			if (has_post_thumbnail()) :
				$thumb_id = get_post_thumbnail_id();
				echo '<figure class="th"><a href="'.wp_get_attachment_url($thumb_id).'" class="zoom" rel="thumbnails">';
				the_post_thumbnail('shop_large img_full'); 	
				echo '</a></figure>';
			else : 
				echo '<figure class="img_full th"><img src="'.jigoshop::plugin_url().'/assets/images/placeholder.png" alt="Placeholder" /></figure>'; 
			endif; 
		?>
		</div>
		<!-- /thumb -->
		<section class="column eight">
			<h4 class="related">
				<?php the_title(); ?>
				<span class="price"><?php echo $_product->get_price_html(); ?></span>
			</h4>
			<div class="entry">
				<?php echo excerpt(10); ?>
			</div>
		</section>
	</div>
<?php endwhile; ?>