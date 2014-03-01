<?php global $_product; ?>

<?php
	$related = $_product->get_related();

	if (sizeof($related)>0) :
		$args = array(
			'post_type'	=> 'product',
			'ignore_sticky_posts'	=> 1,
			'posts_per_page' => 3,
			'orderby' => 'rand',
			'post__in' => $related
		);
		//query_posts($args);
		//jigoshop_get_template_part( 'loop', 'shop' ); 
	endif;
	wp_reset_query();
?>
<?php $related_products = new WP_Query($args); ?>
<div class="related_products show-for-medium-up">
	<dl>
		<dt class="title">
			<?php printf(__('You also may like:', 'jigoshop') ) ?>
		</dt>
		<?php while ( $related_products->have_posts() ) : $related_products->the_post(); ?> 
			<dd class="row">	
				<!-- thumb -->
				<div class="columns small-4 large-4">
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
				<section class="columns small-8 large-8">
					<h4 class="title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<span class="price"><?php echo $_product->get_price_html(); ?></span>
					</h4>
				</section>
			</dd>
		<?php endwhile; ?>
	</dl>
</div>