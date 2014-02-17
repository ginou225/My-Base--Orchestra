<?php
/**
 * Archive template
 *
 * DISCLAIMER
 *
 * Do not edit or add directly to this file if you wish to upgrade Jigoshop to newer
 * versions in the future. If you wish to customise Jigoshop core for your needs,
 * please use our GitHub repository to publish essential changes for consideration.
 *
 * @package             Jigoshop
 * @category            Catalog
 * @author              Jigoshop
 * @copyright           Copyright © 2011-2013 Jigoshop.
 * @license             http://jigoshop.com/license/commercial-edition
 */
?>

<?php get_header(); ?>

<!-- primary container -->
<div id="primary_page_content" class="page_content">

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

			get_template_part('templates/includes/inc', 'pagination');

			do_action('jigoshop_after_main_content');
		?>
	</div>
	<!-- /content -->
	
</div>
<!-- /primary container -->

<?php get_footer(); ?>