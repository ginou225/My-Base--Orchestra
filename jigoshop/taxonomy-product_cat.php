<?php
/**
 * Product Categor template
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

	<!-- content -->
	<div id="content_container" class="product_content">
		category
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