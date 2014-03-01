<!-- shop right sidebar -->
<div class="row shop_right_sidebar">
	<div class="columns large-9">
		
		<?php if (is_search()) : ?>
			<div class="sub_title_container row">
				<section class="large-6 columns">
					<h2 class="page-title"><?php _e('Search Results:', 'jigoshop'); ?> &ldquo;<?php the_search_query(); ?>&rdquo; <?php if (get_query_var('paged')) echo ' &mdash; Page '.get_query_var('paged'); ?></h2>
				</section>
				<section class="large-6 columns">222</section>
			</div>
		<?php endif; ?>

		<?php
			$shop_page_id = jigoshop_get_page_id('shop');
			$shop_page = get_post($shop_page_id);
			echo apply_filters('the_content', $shop_page->post_content);
		?>

		<!-- content -->
		<div id="content_container" class="product_content">
			<?php 
				jigoshop_get_template_part( 'loop', 'shop' ); 
			?>
		</div>
		<!-- /content -->

	</div>
	<aside class="columns large-3">
		<?php get_sidebar('shop'); ?>
	</aside>
</div>
<!-- /shop right sidebar -->