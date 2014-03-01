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

<?php get_header(); 

	global $mb_base;
	$store_layout = $mb_base['shop_layout'];
?>

<!-- primary container -->
<div id="primary_page_content" class="page_content">

	<?php if ($store_layout == "lt_sidebar") {
			get_template_part('templates/pages/shop/store', 'lt');
		} elseif ($store_layout == "rt_sidebar") {
			get_template_part('templates/pages/shop/store', 'rt');
		} else {
			get_template_part('templates/pages/shop/store', '');
	} ?>

	<div class="shop_pagination textcenter row">
		<?php get_template_part('templates/includes/inc', 'pagination'); ?>
	</div>
	
</div>
<!-- /primary container -->

<?php get_footer(); ?>